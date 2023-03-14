$(document).ready(function() {
    var counter = 1;
    $("#add-row-btn").click(function() {
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td>' + counter + '</td>';
        cols += '<td><div class="form-group"><select name="partnumber[]" class="select2" name="partnumber"><option value=""></option>@foreach ($partnumbers as $partnumber)<option value="{{ $partnumber->partnumber }}">{{ $partnumber->partnumber }} {{ $partnumber->description }}</option>@endforeach</select></div></td>';
        cols += '<td class="text-center"><button><i class="fas fa-ruler-combined"></i></button></td>';
        cols += '<td class="text-center"><button><i class="fa-solid fa-scissors"></i></button></td>';
        cols += '<td class="text-center"><button><i class="fa-sharp fa-solid fa-wand-sparkles"></i></button></td>';
        cols += '<td class="text-center"><button><i class="fas fa-hammer"></i></button></td>';
        cols += '<td class="text-center"><button><i class="fas fa-crop-alt"></i></button></td>';
        cols += '<td class="text-center"><button><i class="fa-solid fa-bore-hole"></i></button></td>';
        cols += '<td class="text-center"><button><i class="fas fa-tools"></i></button></td>';
        cols += '<td class="text-center"></td>';
        cols += '<td class="text-center"><button class="btn btn-danger btn-sm remove-row-btn"><i class="fa fa-trash"></i></button></td>';
        newRow.append(cols);
        $("table#partnumber-table").append(newRow);
        counter++;

        $('.select2').select2({
            placeholder: "Select a part number",
            allowClear: true
        });
    });

    $("table#partnumber-table").on("click", ".remove-row-btn", function() {
        $(this).closest("tr").remove();
    });
});

$('#partnumber-table tbody').on('click', '#add-row-btn', function () {
    var tr = $(this).closest('tr');
    var clone = tr.clone();
    clone.find('select').select2(); // inicializa los selects en la fila clonada
    clone.find('td:last').html(''); // limpia el contenido de la última columna
    clone.find('td:first').html(tr.closest('table').find('tbody tr').length + 1); // actualiza el número de fila
    tr.after(clone);
});
