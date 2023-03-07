
@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script src="/js/app.js"></script>



@section('content')

    <div class="container">
        <br>

        <form action="{{ route('detailsprocess.store') }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Número de parte</th>
                    <th>Descripción</th>
                    <th>D. de parte</th>
                    <th>Ancho</th>
                    <th>Largo</th>
                    <th>Cantidad</th>
                    <th>Barra</th>
                    <th>Láser</th>
                    <th>Soldadura</th>
                    <th>Prensa</th>
                    <th>Sierra</th>
                    <th>Taladro</th>
                    <th>Limpieza</th>
                    <th>Pintura</th>
                    <th>Pipe Thread</th>
                    <th>Pipe Engage</th>
                    <th>Press Setup</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td contenteditable="false" name="partnumber[]" style="width: 100%;">
                        <select class="form-control" name="partnumber[]" >
                            <option value=""></option>
                            @foreach ($partnumbers as $partnumber)
                                <option value="{{ $partnumber }}">{{ $partnumber->partnumber }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td contenteditable="true" name="description[]"></td>
                    <td contenteditable="true" name="d_part[]"></td>
                    <td contenteditable="true" name="width[]"></td>
                    <td contenteditable="true" name="length[]"></td>
                    <td contenteditable="true" name="quantity[]"></td>
                    <td contenteditable="true" name="bar[]"></td>
                    <td class="laser" contenteditable="false" name="laser[]"></td>
                    <td contenteditable="true" name="welding[]"></td>
                    <td contenteditable="true" name="press[]"></td>
                    <td contenteditable="true" name="saw[]"></td>
                    <td contenteditable="true" name="drill[]"></td>
                    <td contenteditable="true" name="clean[]"></td>
                    <td contenteditable="true" name="paint[]"></td>
                    <td contenteditable="true" name="pipe_thread[]"></td>
                    <td contenteditable="true" name="pipe_engage[]"></td>
                    <td contenteditable="true" name="press_setup[]"></td>
                    <td class="total" contenteditable="false" name="total[]"></td>
                    <td><button type="button" class="btn btn-danger delete-row">Eliminar</button></td>
                </tr>
                </tbody>
            </table>
        </form>
        <div class="row">
            <div class="col-md-2 col-md-offset-10">
                <button id="add-row-btn" class="btn btn-primary">Agregar Fila</button>
            </div>
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