@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h4>Quotes</h4>
            </div>
            <div class="offset-md-6 col-md-2">

            </div>
            <div class="col-md-2 ">
                {!! $quotations->links() !!}
            </div>
        </div>
<table class="table table-secondary table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Quote name</th>
            <th>Client</th>
            <th>Description</th>
            <th>Date</th>
            <th class="text-center text-nowrap">Actions <a href="{{ url('/quotation/create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a></th>
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
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Do you want to delete the item?')"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



    </div>
@endsection


