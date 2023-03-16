@extends('layouts.app')

@section('content')
    <div class="container">


            <div class="row">
                <div class="col-md-8">
                    <h4>Customers</h4>
                </div>

                <div class="col-md-4 text-end">
                    {!! $clients->links() !!}
                    <a href="{{ route('client.create') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i> Add new</a>
                </div>

            </div>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Client Alias</th>
            <th>Client Real Name</th>
            <th>Description</th>
            <th>Notes</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{ $client->name }}</td>
            <td></td>
            <td>{{ $client->description }}</td>
            <td>{{ $client->notes }}</td>
            <td class="text-center">
                <a href="{{ route('client.edit', $client) }}" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ route('client.destroy', $client) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Do you want to delete the item?')"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
@endsection
