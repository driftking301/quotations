
@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/app.css">

    <!-- CSS de Bootstrap Select -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script src="/js/app.js"></script>
    <div class="container">

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                </button>
            </div>
        @endif
        <a href="{{ url('/quotation/create') }}" class="btn btn-success">Add a new Quotation</a>
        <br>
        <br>
            <div class="container mt-4">
                <select class="form-control" id="select">
                    <option value="1">Opción 1</option>
                    <option value="2">Opción 2</option>
                    <option value="3">Opción 3</option>
                    <option value="4">Opción 4</option>
                    <option value="5">Opción 5</option>
                    <option value="6">Opción 6</option>
                    <option value="7">Opción 7</option>
                    <option value="8">Opción 8</option>
                    <option value="9">Opción 9</option>
                    <option value="10">Opción 10</option>
                    <option value="11">Opción 11</option>
                    <option value="12">Opción 12</option>
                </select>
            </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="container mt-4">
                <button class="btn btn-primary" onclick="generarFormulario()">Agregar formulario</button>
                <div id="formularios"></div>
            </div>
        </div>
    </div>



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JS de Bootstrap Select (requiere jQuery) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/js/bootstrap-select.min.js"></script>

    <!-- JS de Bootstrap 5 (requiere jQuery 3.5+) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <!-- Tu archivo de JavaScript -->
    <script src="/js/app.js"></script>
@endsection
