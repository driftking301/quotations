@extends('layouts.app')

@section('content')
    <script src="https://kit.fontawesome.com/283d08d6db.js" crossorigin="anonymous" defer="defer"></script>

    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-11">
                <h5>Quote name: {{ $quotation->name }}</h5>
            </div>
            <div class="col-md-1 align-self-end">
                <button type="button" class="btn btn-warning" data-toggle="add process" data-placement="top" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    +
                </button>
            </div>
        </div>
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
    <div class="modal fade modal-dialog modal-md" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
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
                            <button class="btn btn-primary input-group" name="lhc" id="lhc">
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


    </script>
@endsection
