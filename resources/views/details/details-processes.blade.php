@extends('layouts.app')

@section('content')
    <script src="https://kit.fontawesome.com/283d08d6db.js" crossorigin="anonymous" defer="defer"></script>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h4 class="card-title">Quote: {{ $quotation->name }} / {{ $quotation->client->name }}</h4>
                    </div>
                    <div class="col-md-1 text-end">
                        <button class="btn btn-primary input-group" name="lhc" id="lhc">
                            LHC
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="partnumber">Part number</label>
                        <select name="partnumber[]" class="select2" style="width: 100%;">
                            @foreach ($partnumbers as $partnumber)
                                <option value="{{ $partnumber->partnumber }}">{{ $partnumber->partnumber }} {{ $partnumber->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="partdesc">Part description</label>
                        <input class="input-group" type="text">
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="col-md-3">
                        <label for="width">Length</label>
                        <input class="input-group" type="text" name="width">
                    </div>
                    <div class="col-md-3">
                        <label for="length">Width</label>
                        <input class="input-group" type="text" name="width">
                    </div>
                    <div class="col-md-3">
                        <label for="quantity">Quantity</label>
                        <input class="input-group" type="text" name="width">
                    </div>
                    <div class="col-md-3">
                        <label for="quantity">Factor</label>
                        <input class="input-group" type="text" name="factor">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <label for="laser">Laser</label>
                        <input class="input-group" type="text" name="laser">
                    </div>
                    <div class="col-md-3">
                        <label for="customprice">Custom Laser Price</label>
                        <input class="input-group" type="text" name="customprice">
                    </div>
                    <div class="col-md-6">
                        <script>
                            function table_hole_form_show()
                            {
                                $("#hole-form-diameter").val('');
                                $("#hole-form-quantity").val('1');
                                $('#hole-form').show();
                                return false;
                            }

                            function table_hole_form_hide()
                            {
                                $('#hole-form').hide();
                                return false;
                            }

                            function table_hole_append()
                            {
                                const diameter = $("#hole-form-diameter");
                                const diameterValue = parseFloat(diameter.val());
                                if (isNaN(diameterValue) || diameterValue < 0.01 || diameterValue > 999.99) {
                                    console.log({diameter, val: diameter.val(), diameterValue});
                                    diameter.focus();
                                    return false;
                                }

                                const quantity = $("#hole-form-quantity");
                                const quantityValue = parseInt(quantity.val(), 10);
                                if (isNaN(quantityValue) || quantityValue < 1 || quantityValue > 999) {
                                    quantity.focus();
                                    return false;
                                }

                                const holesTable = $("#holes-table tbody");
                                holesTable.append(
                                    $('<tr></tr>').append(
                                        $('<td></td>').append($('<input name="holes.diameter[]"/>').val(diameter.val())),
                                        $('<td></td>').append($('<input name="holes.quantity[]"/>').val(quantity.val())),
                                        $('<td></td>').text(3.14 * diameterValue),
                                        $('<td></td>').text(3.14 * diameterValue * quantityValue),
                                        $('<td></td>').append(
                                            $('<a href="#">-</a>').click(function (ev) {
                                                console.log(ev);
                                            })
                                        ),
                                    )
                                );

                                return table_hole_form_hide();
                            }
                        </script>
                        <table id="holes-table" class="table table-light">
                            <thead class="thead-light">
                            <tr>
                                <th>Diameter</th>
                                <th>Quantity</th>
                                <th>Circumference</th>
                                <th>Total Cir</th>
                                <th><a class="btn btn-secondary btn-sm" href="#" onclick="return table_hole_form_show()">+</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div id="hole-form" class="container">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="hole-form-diameter">Diameter</label>
                                    <input class="form-control" type="text" id="hole-form-diameter">
                                </div>
                                <div class="col-md-5">
                                    <label for="hole-form-quantity">Quantity</label>
                                    <input class="form-control" type="text" id="hole-form-quantity">
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-primary" href="#" onclick="return table_hole_append()">Append</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="weld">Weld</label>
                        <input class="input-group" type="text" name="weld">
                    </div>
                    <div class="col-md-4">
                        <label for="press">Press</label>
                        <input class="input-group" type="text" name="weld">
                    </div>
                    <div class="col-md-4">
                        <label for="saw">Saw</label>
                        <input class="input-group" type="text" name="weld">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="weld">Drilling</label>
                        <input class="input-group" type="text" name="weld">
                    </div>
                    <div class="col-md-4">
                        <label for="press">Cleaning</label>
                        <input class="input-group" type="text" name="weld">
                    </div>
                    <div class="col-md-4">
                        <label for="saw">Paint</label>
                        <input class="input-group" type="text" name="weld">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="weld">Pipe Thread</label>
                        <input class="input-group" type="text" name="weld">
                    </div>
                    <div class="col-md-4">
                        <label for="press">Pipe Engage</label>
                        <input class="input-group" type="text" name="weld">
                    </div>
                    <div class="col-md-4">
                        <label for="saw">Press Setup</label>
                        <input class="input-group" type="text" name="weld">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2 input-group">
                        <h5>Total: $0.00</h5>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="button" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <a class="btn btn-secondary" href="{{ route('quotation.details.index', $quotation) }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>


@endsection
