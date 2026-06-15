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
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-light">
                    PHP
                </span>
               <input type="text" class="form-control border border-primary ingredient-cost with-comma">
            </div>
        </td>

        <td>
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-light">
                    PHP
                </span>
               <input type="text" class="form-control border border-secondary ingredient-amount with-comma" readonly>
            </div>
        </td>

        <td class="text-center">
            <a href="#" class="text-danger btn-remove-ingredient">
                <i class="bi bi-trash3"></i>
            </a>
        </td>
    </tr>
</template>


<!-- Template form table row for edit only -->
<template id="ingredient-template_edit">
    <tr>
        <td>
            <input type="text" class="form-control border border-primary ingredient-name_edt">
        </td>

        <td>
            <input type="number" class="form-control border border-primary ingredient-qty_edt">
        </td>

        <td>
            <select class="form-select border border-primary ingredient-unit_edt">
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
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-light">
                    PHP
                </span>
               <input type="text" class="form-control border border-primary ingredient-cost_edt with-comma">
            </div>
        </td>

        <td>
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-light">
                    PHP
                </span>
               <input type="text" class="form-control border border-secondary ingredient-amount_edt with-comma" readonly>
            </div>
        </td>

        <td class="text-center">
            <a href="#" class="text-danger btn-remove-ingredient_edt">
                <i class="bi bi-trash3"></i>
            </a>
        </td>
    </tr>
</template>