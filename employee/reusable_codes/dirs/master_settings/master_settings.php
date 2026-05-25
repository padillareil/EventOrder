<div class="container-fluid py-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="mb-0 fw-bold">Master Settings</h4>
                    <p class="text-muted small mb-0">System configuration for event logistics and hotel rates.</p>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg border-bottom bg-light px-3">
            <div class="container-fluid p-0">
                <button class="navbar-toggler w-100 mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#settingsNav">
                    <span class="navbar-toggler-icon"></span>
                    <small class="fw-bold">
                        Menu
                    </small>
                </button>
                <div class="collapse navbar-collapse" id="settingsNav">
                    <ul class="nav nav-underline gap-2 py-2" id="master-menu">
                        <li class="nav-item">
                            <a class="nav-link small py-1 px-2 active text-dark" href="#" name="master-nav" menucode="function_config">
                                Room Setup
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link small py-1 px-2 text-dark" href="#" name="master-nav" menucode="food_config">
                                Package Setup
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link small py-1 px-2 text-dark" href="#" name="master-nav" menucode="inclusion_config">
                                Inclusions Setup
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link small py-1 px-2 text-dark" href="#" name="master-nav" menucode="backdrop_config">
                                Themes & Backdrop
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            <div class="p-4" id="config-content">
            </div>
        
</div>


<script>
    $(document).ready(function () {
        $("a[name='master-nav'].active").trigger("click");
    });

    $(document).on("click", "a[name='master-nav']", function (e) {
        e.preventDefault();
        $("#master-menu")
            .find("a[name='master-nav']")
            .removeClass("active");
        $(this).addClass("active");
        let menucode = $(this).attr("menucode");
        let file = "";
        switch (menucode) {
            case "function_config":
                file = "dirs/master_settings/dirs/function_config/function_config.php";
            break;
            case "food_config":
                file = "dirs/master_settings/dirs/food_config/food_config.php";
            break;
            case "inclusion_config":
                file = "dirs/master_settings/dirs/inclusion_config/inclusion_config.php";
            break;
            case "backdrop_config":
                file = "dirs/master_settings/dirs/backdrop_config/backdrop_config.php";
            break;
            default:
            return;
        }
        $("#config-content").load(file);


    });

</script>