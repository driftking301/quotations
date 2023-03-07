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
<a href="{{ url('/quotation/create') }}" class="btn btn-success">Add a new Quotation</a>
    <br>
    <br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Quotation name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($quotations as $quotation)
        <tr>
            <td>{{ $quotation->id }}</td>
            <td>{{ $quotation->name }}</td>
            <td>{{ $quotation->description }}</td>

            <td>
                <a href="{{ url('/quotation/' . $quotation->id . '/edit') }}" class="btn btn-warning">Edit</a>
                <a href="{{ url('/details/' . $quotation->id . '/edit') }}" class="btn btn-primary">Details</a>


                <form action="{{ url('/quotation/'.$quotation->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
        {!! $quotations->links() !!}
    </div>
@endsection
