@extends('layouts.app')

@section('content')
    <div class="container">


            <div class="row">
                <div class="offset-8 col-md-2">
                    {!! $clients->links() !!}
                </div>


            </div>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Client Alias</th>
            <th>Client Real Name</th>
            <th>Description</th>
            <th>Notes</th>
            <th class="text-center">
                Actions
                <a href="{{ url('/client/create') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i></a>
            </th>
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
                <a href="{{ url('/client/' . $client->id . '/edit') }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ url('/client/'.$client->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Do you want to delete the item?')"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



    </div>
@endsection
