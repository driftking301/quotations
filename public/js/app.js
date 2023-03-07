$(document).ready(function() {
    $('select[name="partnumber[]"]').select2({
        placeholder: 'Buscar número de parte',
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
    $("#add-row-btn").on("click", function () {
        let tr = "<tr>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td class='laser' contenteditable='false'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td contenteditable='true'></td>" +
            "<td class='total' contenteditable='false'></td>" +
            "<td><button type='button' class='btn btn-danger delete-row'>Eliminar</button></td>" +
            "</tr>";

        $("tbody").append(tr);
    });

    // Función para eliminar fila
    $(document).on("click", ".delete-row", function () {
        $(this).closest("tr").remove();
        calculateGrandTotal();
    });

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
