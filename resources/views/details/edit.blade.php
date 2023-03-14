@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/283d08d6db.js" crossorigin="anonymous"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<!-- <script src="/js/app.js"></script> -->
<script src="/js/details.js"></script>
<link rel="stylesheet" href="/css/app.css">

@section('content')

    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-2 col-md-offset-10">
                <h5>Quote name: {{ $quotation->name }}</h5>
            </div>
            <div class="col-md-2 col-xs-12" style="position: relative;">
                <button id="add-row-btn" class="btn btn-primary">Add part number</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover" id="partnumber-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Part Number</th>
                        <th class="text-center w-10 text-nowrap"><i class="fas fa-ruler-combined"></i> Size</th>
                        <th class="text-center"><i class="fa-solid fa-scissors"></i> Laser</th>
                        <th class="text-center"><i class="fa-sharp fa-solid fa-wand-sparkles"></i> Weld</th>
                        <th class="text-center"><i class="fas fa-hammer"></i> Press</th>
                        <th class="text-center"><i class="fa-solid fa-knife-kitchen"></i> Saw</th>
                        <th class="text-center"><i class="fa-solid fa-bore-hole"></i> Drilling</th>
                        <th class="text-center"><i class="fas fa-tools"></i> Assembly</th>
                        <th>Total</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="form-group">
                                <select name="partnumber[]" class="select2" style="width: 100%;">
                                    @foreach ($partnumbers as $partnumber)
                                        <option value="{{ $partnumber->partnumber }}">{{ $partnumber->partnumber }} {{ $partnumber->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td class="text-center"><button><i class="fas fa-ruler-combined"></i></button></td>
                        <td class="text-center"><button><i class="fa-solid fa-scissors"></i></button></td>
                        <td class="text-center"><button><i class="fa-sharp fa-solid fa-wand-sparkles"></i></button></td>
                        <td class="text-center"><button><i class="fas fa-hammer"></i></button></td>
                        <td class="text-center"><button><i class="fas fa-crop-alt"></i></button></td>
                        <td class="text-center"><button><i class="fa-solid fa-bore-hole"></i></button></td>
                        <td class="text-center"><button><i class="fas fa-tools"></i></button></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <div class="row">
        <div class="col-md-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Subtotal</th>
                    <th>Margin</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td class="total">$10.00</td>
                </tr>
                <tr>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td class="total">$11.00</td>
                </tr>
                <tr>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td contenteditable="true"></td>
                    <td class="total">$10.00</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>





    <style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        font-size: 0.9rem;
        font-weight: 400;
        line-height: 1.5;
        background-color: transparent;
    }

    th {
        font-weight: 700;
    }

    td, th {
        border: 1px solid #dee2e6;
        padding: 0.75rem;
        vertical-align: top;
    }

    .total {
        background-color: #f2f2f2;
    }
</style>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select a part number",
                allowClear: true
            });
        });
    </script>
@endsection
