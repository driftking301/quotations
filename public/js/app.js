$(document).ready(function() {
    $('select[name="partnumber_select[]"]').select2({
        placeholder: 'Search part number',
        allowClear: true
    });
    $('select[name="weld_select[]"]').select2({
        placeholder: 'Weld type',
        allowClear: true
    });
    $('select[name="laser_select[]"]').select2({
        placeholder: 'Laser type',
        allowClear: true
    });
});

$(document).ready(function () {
    // ...

    // Función para calcular totales en todas las filas al cargar la página
    $("tbody td[contenteditable='true']").trigger("input");
    calculateGrandTotal(); // Agregar esta línea para calcular el gran total al cargar la página

    // Función para calcular totales y el gran total al agregar o eliminar filas
    $(document).on("click", ".delete-row, #add-row-btn", function () {
        $("tbody td[contenteditable='true']").trigger("input");
        calculateGrandTotal();
    });
});

$(document).ready(function () {
    // Función para agregar nueva fila
    $("#add-row-btn").on("click", function() {
        let select = $("<select></select>").attr("name", "partnumber_select[]");
        $("select[name='partnumber_select[]']:eq(0) option").each(function() {
            select.append($(this).clone());
        });
        let td = $("<td></td>").append(select);
        let tr = $("<tr></tr>").append(td)
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td class='laser' contenteditable='false'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td contenteditable='true'></td>")
            .append("<td class='total' contenteditable='false'></td>")
            .append("<td><button type='button' class='btn btn-danger delete-row'>Delete</button></td>");
        $("tbody").append(tr);
    });

    // Función para eliminar fila
    $(document).on("click", ".delete-row", function () {
        $(this).closest("tr").remove();
        calculateGrandTotal();
    });

    function cleanRow(event) {
        event.preventDefault();
        var row = $(event.target).closest('tr');
        $(row).find('input[type=text]').val('');
        $(row).find('.total').text('');
        $(row).find('select').prop('selectedIndex', -1);
    }

// Función para calcular totales en cada fila
    $(document).on("input", "tbody td[contenteditable='true']", function () {
        let row = $(this).closest("tr");
        let width = parseFloat(row.find("td:nth-child(3)").text()) || 0;
        let length = parseFloat(row.find("td:nth-child(4)").text()) || 0;
        let quantity = parseFloat(row.find("td:nth-child(5)").text()) || 0;

        let laserSelect = row.find("td:nth-child(7) select");
        let laserPrice = laserSelect.find(":selected").data("price");
        if (typeof laserPrice !== "number") {
            laserPrice = parseFloat(laserPrice.split("- $")[1]) || 0;
        }

        let laser = parseFloat(row.find("td:nth-child(6)").text()) || 0;
        laser += (width + length) * 2 * quantity * laserPrice;
        row.find(".laser").text(laser.toFixed(2));

        laser += (laser * laserPrice);

        let weldSelect = row.find("td:nth-child(9) select");
        let weldPrice = parseFloat(weldSelect.find("option:selected").data("price")) || 0;

        let weld = parseFloat(row.find("td:nth-child(8)").text()) || 0;
        weld += quantity * weldPrice;

        let press = parseFloat(row.find("td:nth-child(10)").text() * 1.06) || 0;
        let saw = parseFloat(row.find("td:nth-child(11)").text()) || 0;
        let drill = parseFloat(row.find("td:nth-child(12)").text()) || 0;
        let clean = parseFloat(row.find("td:nth-child(13)").text()) || 0;
        let paint = parseFloat(row.find("td:nth-child(14)").text()) || 0;
        let thread = parseFloat(row.find("td:nth-child(15)").text()) || 0;
        let engage = parseFloat(row.find("td:nth-child(16)").text()) || 0;
        let pressSetup = parseFloat(row.find("td:nth-child(17)").text()) || 0;

        let total = laser + weld + press + saw + drill + clean + paint + engage + pressSetup;

        row.find(".laser").text(laser.toFixed(2));
        row.find(".total").text(total.toFixed(2));

        calculateGrandTotal();
    });

// Función para calcular el gran total
    function calculateGrandTotal() {
        let grandTotal = 0;
        $("tbody tr").each(function () {
            grandTotal += parseFloat($(this).find(".total").text()) || 0;
        });
        $("#grandtotal").text(grandTotal.toFixed(2));
    }

// Calcular el gran total al cargar la página
    calculateGrandTotal();



    // Función para calcular totales en todas las filas al cargar la página
    $("tbody td[contenteditable='true']").trigger("input");
});

function calculateGrandTotal() {
    let grandTotal = 0;
    let rowCount = $("tbody tr").length;
    if (rowCount === 0) {
        $("#grand-total").text("Total $0.00");
    } else {
        $("tbody tr").each(function() {
            let total = $(this).find(".total").text();
            if (!isNaN(parseFloat(total))) {
                grandTotal += parseFloat(total);
            }
        });
        $("#grand-total").text("$" + grandTotal.toFixed(2));
    }
}

// Función para calcular totales en todas las filas al cargar la página
$("tbody td[contenteditable='true']").trigger("input");
calculateGrandTotal(); // Agregar esta línea para calcular el gran total al cargar la página

// Función para actualizar el gran total al cambiar el contenido de una celda
$(document).on("input", "tbody td[contenteditable='true']", function () {
    calculateGrandTotal();
});


// Modal de Laser Hole Calculator
$(document).on('click', '.laser-hole-btn', function(e) {
    e.preventDefault();
    var $button = $(this);
    var $modal = $('#laser-hole-modal');
    var row = $button.closest('tr').index(); // <-- obtener el índice de la fila correspondiente al botón
    var $circleDia = $modal.find('#circle-dia-' + (row + 1));
    var $qty = $modal.find('#qty-' + (row + 1));
    var $circumference = $modal.find('#circumference-' + (row + 1));
    var $totalCirc = $modal.find('#total-cir-' + (row + 1));
    $circleDia.val('');
    $qty.val('');
    $circumference.val('');
    $totalCirc.val('');
    $modal.modal('show');
    $modal.attr('data-row', row); // <-- guardar el índice de la fila en el atributo data-row del modal
});

$('.calculate-btn').click(function() {
    var row = $('#laser-hole-modal').data('row');
    var circleDia = parseFloat($('#circle-dia-' + (row + 1)).val());
    var qty = parseFloat($('#qty-' + (row + 1)).val());

    var circumference = circleDia * 3.14;
    $('#circumference-' + (row + 1)).val(circumference);

    var totalCir = qty * circumference;
    $('#total-cir-' + (row + 1)).val(totalCir);
});


