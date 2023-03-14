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
<a href="{{ url('/client/create') }}" class="btn btn-success">Add a new Client</a>
    <br>
    <br>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Client name</th>
            <th>Description</th>
            <th>Notes</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->description }}</td>
            <td>{{ $client->notes }}</td>
            <td class="text-center">
                <a href="{{ url('/client/' . $client->id . '/edit') }}" class="btn btn-secondary">Edit</a>
                <form action="{{ url('/client/'.$client->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Do you want to delete the item?')" value="Delete">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


        {!! $clients->links() !!}
    </div>
@endsection
