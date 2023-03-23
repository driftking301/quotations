@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-secondary">
            <form action="{{ route('processes') }}" method="post">
                @csrf
                <div class="card-header">
                    <h3><i class="fa-solid fa-gears"></i> Default processes prices</h3>
                </div>
                <div class="card-body">
                    @foreach($processesSettings as $key => $values)
                        <h5 class="card-title">{{ $values['name'] }}</h5>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="{{ $key }}" >Price</label>
                                    <input type="text" name="{{ $key }}" class="form-control" value="{{ number_format(floatval($quotation->{$key} ?? $values['price'] ?? old($key)), 4) }}">
                                </div>
                                <div class="col-md-2">
                                    <label for="units">Units</label>
                                    <input value="{{ $values['units'] }}" class="form-control" readonly>
                                </div>
                                <div class="col-md-8">
                                    <label for="notes">Notes</label>
                                    <input value="{{ $values['notes']}}" name="notes" class="form-control" readonly>
                                </div>
                            </div>
                            <hr>
                    @endforeach
                </div>
                <br>
                <div class="card-footer">
                    <div class="row">
                        <div class="offset-11">
                            <button type="submit" class="btn  btn-primary" value="Save"><i class="fa-solid fa-floppy-disk"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
@endsection
