@extends('layouts.app')

@section('content')
    <script src="https://kit.fontawesome.com/283d08d6db.js" crossorigin="anonymous" defer="defer"></script>
    <script defer="defer">
        function quotation_update_price()
        {
            const form = document.getElementById('quotation-details-form');
            const formData = new FormData(form);

            console.log(Object.fromEntries(formData.entries()));

            $.ajax({
                type: "POST",
                url: form.action + '/calculate',
                data: Object.fromEntries(formData.entries()),
                dataType: "json",
                encode: "true"
            }).done(function (data) {
                console.log(data)
            });
        }
    </script>
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
            <form id="quotation-details-form" action="{{ route('quotation.details.store', $quotation) }}" method="post">
                @csrf
                <input type="hidden" value="{{$quotation->id}}" name="quotation_id">
                <div class="row">
                    <div class="col-md-12">
                        <label for="partnumber">Part number</label>
                        <select name="partnumber" class="select2" style="width: 100%;">
                            <option value=""></option>
                            @foreach ($partnumbers as $partnumber)
                                <option value="{{ $partnumber->partnumber }}">{{ $partnumber->partnumber }} {{ $partnumber->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="description">Part description</label>
                        <input class="input-group" type="text" name="description">
                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="col-md-3">
                        <label for="width">Width</label>
                        <input class="input-group" type="text" name="width">
                    </div>
                    <div class="col-md-3">
                        <label for="length">Length</label>
                        <input class="input-group" type="text" name="length">
                    </div>
                    <div class="col-md-3">
                        <label for="quantity">Quantity</label>
                        <input class="input-group" type="text" name="quantity">
                    </div>
                    <div class="col-md-3">
                        <label for="factor">Factor</label>
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
                        <label for="custom_price">Custom Laser Price</label>
                        <input class="input-group" type="text" name="custom_price">
                    </div>
                    <div class="col-md-6">
                        <script>
                            function table_hole_form_show()
                            {
                                $("#hole-form-diameter").val('0.00');
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
                                        $('<td></td>').append($('<input name="holes_diameter[]" readonly/>').val(diameterValue.toFixed(2))),
                                        $('<td></td>').append($('<input name="holes_quantity[]" readonly/>').val(quantityValue.toFixed(0))),
                                        $('<td></td>').text((3.14 * diameterValue).toFixed(2)),
                                        $('<td></td>').text((3.14 * diameterValue * quantityValue).toFixed(2)),
                                        $('<td></td>').append(
                                            $('<a href="#" class="btn btn-danger btn-sm">-</a>').click(function (event) {
                                                $(event.target).closest('tr').remove();
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
                                <th><a class="btn btn-secondary btn-sm" href="#" onclick="return table_hole_form_show();">+</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div id="hole-form" class="container" style="display: none">
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
                        <label for="welding">Weld</label>
                        <input class="input-group" type="text" name="welding">
                    </div>
                    <div class="col-md-4">
                        <label for="press">Press</label>
                        <input class="input-group" type="text" name="press">
                    </div>
                    <div class="col-md-4">
                        <label for="saw">Saw</label>
                        <input class="input-group" type="text" name="saw">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="drill">Drilling</label>
                        <input class="input-group" type="text" name="drill">
                    </div>
                    <div class="col-md-4">
                        <label for="clean">Cleaning</label>
                        <input class="input-group" type="text" name="clean">
                    </div>
                    <div class="col-md-4">
                        <label for="paint">Paint</label>
                        <input class="input-group" type="text" name="paint">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="pipe_thread">Pipe Thread</label>
                        <input class="input-group" type="text" name="pipe_thread">
                    </div>
                    <div class="col-md-4">
                        <label for="pipe_engage">Pipe Engage</label>
                        <input class="input-group" type="text" name="pipe_engage">
                    </div>
                    <div class="col-md-4">
                        <label for="press_setup">Press Setup</label>
                        <input class="input-group" type="text" name="press_setup">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2 input-group">
                        <h5 id="total">Total: $0.00</h5>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                    <a class="btn btn-secondary" href="{{ route('quotation.details.index', $quotation) }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </div>
            </form>
            </div>
        </div>
    </div>


@endsection
