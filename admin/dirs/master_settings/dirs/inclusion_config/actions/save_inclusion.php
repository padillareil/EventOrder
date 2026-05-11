<?php

require_once "../../../../../../config/connection_config.php";

$EventType       = $_POST['EventType'] ?? '';
$Tier            = $_POST['Tier'] ?? '';
$TotalCost       = $_POST['TotalCost'] ?? 0;
$Instruction      = $_POST['Instruction'] ?? '';
$TermsCondition  = $_POST['TermsCondition'] ?? '';

$Inclusion       = $_POST['Inclusion'] ?? [];
$Quantity        = $_POST['Quantity'] ?? [];

try {

    $conn->beginTransaction();

    $validate_entry = $conn->prepare("
        SELECT 
            COUNT(*) AS TotalCount,
            Tier
        FROM Inclusions_Config WITH (NOLOCK)
        WHERE EventType = ?
        AND Tier = ?
        GROUP BY Tier
    ");

    $validate_entry->execute([
        $EventType,
        $Tier
    ]);

    $validate_data = $validate_entry->fetch(PDO::FETCH_ASSOC);

    if ($validate_data && $validate_data['TotalCount'] > 0) {

        $PkgTier = $validate_data['Tier'];

        exit(
            'Inclusion configuration already exists for Tier: ' . $PkgTier
        );
    }

    $fetch_inclusioncode = $conn->prepare("
        EXEC dbo.[CustomInclusionCode]
    ");

    $fetch_inclusioncode->execute();

    $get_inclusioncode = $fetch_inclusioncode->fetch(PDO::FETCH_ASSOC);

    if (!$get_inclusioncode) {
        throw new Exception("Unable to generate inclusion code.");
    }

    $InclusionCode = $get_inclusioncode['InclusionCode'];

    $ins_inclusion = $conn->prepare("
        EXEC dbo.[CreateInclusion_Configuration]
            ?,?,?,?,?,?
    ");

    $ins_inclusion->execute([
        $InclusionCode,
        $EventType,
        $Tier,
        $TotalCost,
        $Instruction,
        $TermsCondition
    ]);

    if (!empty($Inclusion)) {

        $ins_inclusion_items = $conn->prepare("
            EXEC dbo.[EventInclusions_Items]
                ?,?,?,?
        ");

        foreach ($Inclusion as $key => $inclu) {

            $Qty = $Quantity[$key] ?? 0;

            $ins_inclusion_items->execute([
                $InclusionCode,
                $Tier,
                $inclu,
                $Qty
            ]);
        }
    }

    $conn->commit();

    echo "OK";

} catch (Exception $e) {

    if ($conn->inTransaction()) {
        $conn->rollback();
    }

    echo "<b>Warning. Please Contact System Developer.</b><br>";
    echo $e->getMessage();
}

?>