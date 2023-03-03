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
<a href="{{ url('/partnumber/create') }}" class="btn btn-success">Add a new Part Number</a>
    <br>
    <br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Sheet name</th>
            <th>Part Number</th>
            <th>Description</th>
            <th>Unit Measure</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($partnumbers as $partnumber)
        <tr>
            <td>{{ $partnumber->id }}</td>
            <td>{{ $partnumber->sheetname }}</td>
            <td>{{ $partnumber->partnumber }}</td>
            <td>{{ $partnumber->description }}</td>
            <td>{{ $partnumber->unitmeasure }}</td>

            <td>
                <a href="{{ url('/partnumber/' . $partnumber->id . '/edit') }}" class="btn btn-warning">Edit</a>


                <form action="{{ url('/partnumber/'.$partnumber->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
        {!! $partnumbers->links() !!}
    </div>
@endsection
