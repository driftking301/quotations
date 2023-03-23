@extends('layouts.app')

@section('content')
    <script src="https://kit.fontawesome.com/283d08d6db.js" crossorigin="anonymous" defer="defer"></script>

    <div class="container">
        <div class="row">

        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col">
                    <h4>Quote name: {{ $quotation->name }}</h4>
                </div>
                <div class="col text-end">
                    <a class="btn btn-dark" href="{{ route('quotation.details.index', $quotation) }}"><i class="fa-solid fa-arrow-left"></i></a>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('quotation.processes', $quotation) }}" method="post">
                        @csrf
                        @foreach($processesSettings as $key => $values)
                            <div class="form-group">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $values['name'] }}</h5>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-4">
                                            <label for="{{ $key }}" class="col-form-label">Price</label>
                                            <input type="text" name="{{ $key }}" class="form-control-sm" value="{{ number_format(floatval($quotation->{$key} ?? $values['price'] ?? old($key)), 2) }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="units">Units</label>
                                            <input  class="form-control-sm"  id="units" value="{{ $values['units'] }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label" for="notes">Notes</label>
                                            <input class="form-control-sm" id="notes" value="{{ $values['notes'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <a class="btn btn-dark" href="{{ route('quotation.details.index', $quotation) }}">Back</a>
                        </div>
                    </form>
                </div>
                </div>
            </div>
    </div>

@endsection
