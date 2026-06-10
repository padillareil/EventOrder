<template id="ingredient-template">
    <tr>
        <td>
            <input type="text" class="form-control border border-primary">
        </td>

        <td>
            <input type="number" class="form-control border border-primary ingredient-qty">
        </td>

        <td>
            <select class="form-select border border-primary ingredient-unit">
                <option value="kg">kg</option>
                <option value="g">g</option>
                <option value="ml">ml</option>
                <option value="ltr">ltr</option>
                <option value="tbsp">tbsp</option>
                <option value="tsp">tsp</option>
                <option value="pcs">pcs</option>
            </select>
        </td>

        <td>
            <input type="text" class="form-control border border-primary ingredient-cost with-comma">
        </td>

        <td>
            <input type="text" class="form-control border border-secondary ingredient-amount with-comma" readonly>
        </td>

        <td class="text-center">
            <a href="#" class="text-danger btn-remove-ingredient">
                <i class="bi bi-trash3"></i>
            </a>
        </td>
    </tr>
</template>