$(document).ready(function() {
    $('select[name="partnumber_select[]"]').select2({
        placeholder: 'Search part number',
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
        let width = parseFloat(row.find("td:nth-child(4)").text()) || 0;
        let length = parseFloat(row.find("td:nth-child(5)").text()) || 0;
        let quantity = parseFloat(row.find("td:nth-child(6)").text()) || 0;
        let laser = (width + length) * 2 * quantity;
        let weld = parseFloat(row.find("td:nth-child(9)").text()) || 0;
        let press = parseFloat(row.find("td:nth-child(10)").text() * 1.06) || 0;
        let saw = parseFloat(row.find("td:nth-child(11)").text()) || 0;
        let drill = parseFloat(row.find("td:nth-child(12)").text()) || 0;
        let clean = parseFloat(row.find("td:nth-child(13)").text()) || 0;
        let paint = parseFloat(row.find("td:nth-child(14)").text()) || 0;
        let thread = parseFloat(row.find("td:nth-child(15)").text()) || 0;
        let engage = parseFloat(row.find("td:nth-child(16)").text()) || 0;
        let pressSetup = parseFloat(row.find("td:nth-child(17)").text()) || 0;
        let total = laser + weld + press + saw + drill + clean + paint + thread + engage + pressSetup;

        row.find(".laser").text(laser.toFixed(2));
        row.find(".total").text(total.toFixed(2));

        calculateGrandTotal(); // Agregar esta línea para calcular el gran total después de actualizar todos los totales de cada fila
    });

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
        $("#grand-total").text("Total $" + grandTotal.toFixed(2));
    }
}

// Función para calcular totales en todas las filas al cargar la página
$("tbody td[contenteditable='true']").trigger("input");
calculateGrandTotal(); // Agregar esta línea para calcular el gran total al cargar la página

// Función para actualizar el gran total al cambiar el contenido de una celda
$(document).on("input", "tbody td[contenteditable='true']", function () {
    calculateGrandTotal();
});
