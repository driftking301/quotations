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
<a href="{{ url('/quotation/create') }}" class="btn btn-success">Add a new Quote</a>
    <br>
    <br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Quote name</th>
            <th>Description</th>
            <th>Client</th>
            <th>Date</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($quotations as $quotation)
        <tr>
            <td>{{ $quotation->id }}</td>
            <td>{{ $quotation->name }}</td>
            <td>{{ $quotation->description }}</td>
            <td></td>
            <td></td>
            <td class="text-center">
                <a href="{{ url('/quotation/' . $quotation->id . '/edit') }}" class="btn btn-secondary">Edit</a>
                <a href="{{ url('/details/' . $quotation->id . '/edit') }}" class="btn btn-secondary">Details</a>


                <form action="{{ url('/quotation/'.$quotation->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Do you want to delete the item?')" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


        {!! $quotations->links() !!}
    </div>
@endsection
