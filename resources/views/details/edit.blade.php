
@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script src="/js/app.js"></script>



@section('content')

    <div class="container">
        <br>
        <h2>{{ $quotation->name }}</h2>
        <form action="{{ route('details.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Guardar</button>
            <input type="hidden" name="quotation_id" value="{{ $quotation->id }}">
            <table class="table table-bordered table-hover table-sm">
                <thead>
                <tr>
                    <th>Part number</th>
                    <th>Description</th>
                    <th>D. part</th>
                    <th>Width</th>
                    <th>Length</th>
                    <th>Quantity</th>
                    <th>Bar</th>
                    <th>Laser</th>
                    <th>Weld</th>
                    <th>Press</th>
                    <th>Saw</th>
                    <th>Drill</th>
                    <th>Clean</th>
                    <th>Paint</th>
                    <th>Pipe Thread</th>
                    <th>Pipe Engage</th>
                    <th>Press Setup</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @for ($i = 0; $i < 70; $i++)
                    <tr>
                        <td contenteditable="false" name="partnumber_select[]" style="width: 100%;">
                            <select class="form-control" name="partnumber_select[]" >
                                <option value=""></option>
                                @foreach ($partnumbers as $partnumber)
                                    <option value="{{ $partnumber }}">{{ $partnumber->partnumber }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td contenteditable="true" name="description[{{$i}}]"></td>
                        <td contenteditable="true" name="d_part[{{$i}}]"></td>
                        <td contenteditable="true" name="width[{{$i}}]"></td>
                        <td contenteditable="true" name="length[{{$i}}]"></td>
                        <td contenteditable="true" name="quantity[{{$i}}]"></td>
                        <td contenteditable="true" name="bar[{{$i}}]"></td>
                        <td class="laser" contenteditable="false" name="laser[{{$i}}]"></td>
                        <td contenteditable="true" name="welding[{{$i}}]"></td>
                        <td contenteditable="true" name="press[{{$i}}]"></td>
                        <td contenteditable="true" name="saw[{{$i}}]"></td>
                        <td contenteditable="true" name="drill[{{$i}}]"></td>
                        <td contenteditable="true" name="clean[{{$i}}]"></td>
                        <td contenteditable="true" name="paint[{{$i}}]"></td>
                        <td contenteditable="true" name="pipethread[{{$i}}]"></td>
                        <td contenteditable="true" name="pipeengage[{{$i}}]"></td>
                        <td contenteditable="true" name="press_setup[{{$i}}]"></td>
                        <td class="total" contenteditable="false" name="total[{{$i}}]"></td>

                    </tr>
                @endfor
                </tbody>
            </table>
        </form>
        <div class="row">
            <!-- <div class="col-md-2 col-md-offset-10">
                 <button id="add-row-btn" class="btn btn-primary">Add part number</button>
             </div>-->
            <div id="total-container" class="col-md-2 text-right" style="margin-left: auto">
                <h2><strong><span id="grand-total">0.00</span></strong></h2>

            </div>
        </div>
    </div>

    <style>
        td:nth-child(1) {
            min-width: 150px;
        }
        td:first-child {
            width: 100%;
        }

        select {
            width: 100%;
        }

    </style>
@endsection
