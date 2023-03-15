@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-secondary mb-3" style="max-width: 50rem">
        <form action="{{ route('processes') }}" method="post">
            @csrf
            <div class="card-header">
                <h3>Default processes prices</h3>
            </div>
            @if(count($errors)>0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
            @foreach($processesSettings as $key => $values)
                <div class="form-group">
                    <div class="card-body">
                        <h5 class="card-title">{{ $values['name'] }}</h5>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <label for="{{ $key }}" class="col-form-label">Price</label>
                            <input type="text" name="{{ $key }}" class="form-control-sm" value="{{ round(floatval($quotation->{$key} ?? $values['price'] ?? old($key)), 2) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="units">Units</label>
                            <input value="{{ $values['units'] }}" class="form-control-sm" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="notes">Notes</label>
                            <input value="{{ $values['notes']}}" name="notes" class="form-control-sm" disabled>
                        </div>
                    </div>
                </div>
                </div>
                    <hr>

            @endforeach
            </div>


            <br>
            <div class="card-footer">
                <div class="row">
                    <div class="offset-11">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </div>
            </div>

        </form>
        </div>

    </div>

@endsection
