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
                <a class="btn btn-dark" href="{{ route('quotation.details.index', $quotation) }}"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('quotation.processes', $quotation) }}" method="post">
                    @csrf
                    @foreach($processesSettings as $key => $values)
                        <div class="form-group">
                            <div class="card-body">
                                <h5 class="card-title">{{ $values['name'] }}</h5>
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-2">
                                        <label for="{{ $key }}" class="col-form-label">Price</label>
                                        <input type="text" name="{{ $key }}" class="form-control-sm" value="{{ number_format(floatval($quotation->{$key} ?? $values['price'] ?? old($key)), 2) }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label  class="col-form-label"> {{ $values['units'] }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <label  class="col-form-label"> {{ $values['notes'] }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <a class="btn btn-dark" href="{{ route('quotation.details.index', $quotation) }}">Back</a>
                </form>
            </div>
        </div>
    </div>

@endsection
