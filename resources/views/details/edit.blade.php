@extends('layouts.app')

@section('content')
    <script src="https://kit.fontawesome.com/283d08d6db.js" crossorigin="anonymous" defer="defer"></script>

    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-10">
                <h5>Quote name: {{ $quotation->name }}</h5>
            </div>
            <div class="col-md-2 align-self-end">
                <a class="btn btn-dark" href="{{ url('quotation/') }}"><-</a>
                <button type="button" class="btn btn-secondary" data-toggle="add process" data-placement="top" data-bs-toggle="modal" data-bs-target="#configModal">C</button>
                <a class="btn btn-primary" href="{{ url('quotation/'. $quotation->id . '/edit' ) }}">E</a>

                <button type="button" class="btn btn-warning" data-toggle="add process" data-placement="top" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover" id="partnumber-table">
                    <thead>
                    <tr>
                        <th>Part Number</th>
                        <th class="text-center w-10 text-nowrap">Width</th>
                        <th class="text-center w-10 text-nowrap">Length</th>
                        <th class="text-center w-10 text-nowrap">Quantity</th>
                        <th class="text-center w-10 text-nowrap">Factor</th>
                        <th>Total</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>

                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $quotation->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="width">Width</label>
                            <input class="input-group" type="text" name="width">
                        </div>
                        <div class="col-md-4">
                            <label for="length">Width</label>
                            <input class="input-group" type="text" name="width">
                        </div>
                        <div class="col-md-4">
                            <label for="quantity">Quantity</label>
                            <input class="input-group" type="text" name="width">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="laser">Laser</label>
                            <input class="input-group" type="text" name="laser">
                        </div>
                        <div class="col-md-8">
                            <label for="lhc">Laser Hole Calculator</label>
                            <button class="btn btn-primary input-group" name="lhc" id="lhc" data-bs-toggle="modal" data-bs-target="#laserHoleCalculator">
                                LHC
                            </button>
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
                    <hr>
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
                    <hr>
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


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('exampleModal').addEventListener('shown.bs.modal', function () {
            // myInput.focus();
        });
        document.getElementById('exampleModalToggle2').addEventListener('shown.bs.modal', function () {
            // myInput.focus();
        });
    </script>
    <div class="modal fade" id="laserHoleCalculator" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Laser Hole Calculator</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-3">
                            <label for="circleDiameter1">Circle Dia.</label>
                            <input class="input-group" type="text" name="circleDiameter1">
                        </div>
                        <div class="col-md-3">
                            <label for="quantity1">Qty</label>
                            <input class="input-group" type="text" name="quantity1">
                        </div>
                        <div class="col-md-3">
                            <label for="circumference1">Circumference</label>
                            <input class="input-group" type="text" name="circumference1"disabled value="$0.00">
                        </div>
                        <div class="col-md-3">
                            <label for="totalCircumference5">Total Cir.</label>
                            <input class="input-group" type="text" name="totalCircumference1" disabled value="$0.00">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="circleDiameter2">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="quantity2">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="circumference2"disabled value="$0.00">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="totalCircumference2" disabled value="$0.00">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="circleDiameter3">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="quantity3">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="circumference3"disabled value="$0.00">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="totalCircumference3" disabled value="$0.00">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="circleDiameter4">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="quantity4">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="circumference4"disabled value="$0.00">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="totalCircumference3" disabled value="$0.00">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="circleDiameter5">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="quantity5">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="circumference5"disabled value="$0.00">
                        </div>
                        <div class="col-md-3">
                            <input class="input-group" type="text" name="totalCircumference5" disabled value="$0.00">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <h5>Total: $0.00</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Apply</button>
                    <button class="btn btn-secondary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back</button>

                </div>
            </div>
        </div>
    </div>

@endsection
