@extends('layouts.app')

@section('content')
    <div class="container">

            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                </button>
            </div>
            @endif
        <div class="row">
            <div class="col-md-2">
                <h4>Quotes</h4>
            </div>
            <div class="offset-md-6 col-md-2">
                <a href="{{ url('/quotation/create') }}" class="btn btn-success">New Quote</a>
            </div>
            <div class="col-md-2 ">
                {!! $quotations->links() !!}
            </div>
        </div>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Quote name</th>
            <th>Client</th>
            <th>Description</th>
            <th>Date</th>
            <th class="text-center text-nowrap">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($quotations as $quotation)
        <tr>
            <td>
                <a href="{{ url('/details/' . $quotation->id . '/edit') }}">{{ $quotation->name }}</a>
            </td>
            <td>{{ $quotation->client }}</td>
            <td>{{ $quotation->description }}</td>
            <td>{{ $quotation->date }}</td>
            <td class="text-center">
                <form action="{{ url('/quotation/'.$quotation->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-secondary" type="submit" onclick="return confirm('¿Do you want to delete the item?')" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



    </div>
@endsection


