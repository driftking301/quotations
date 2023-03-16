@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>Quotes</h4>
            </div>
            <div class="col-md-4 text-end">
                {!! $quotations->links() !!}
                <a href="{{ route('quotation.create') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
<table class="table table-secondary table-light table-hover">
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
                <a href="{{ route('quotation.details.index', $quotation) }}">{{ $quotation->name }}</a>
            </td>
            <td>{{ $quotation->client->name }}</td>
            <td>{{ $quotation->description }}</td>
            <td>{{ $quotation->date }}</td>
            <td class="text-center">
                <form action="{{ route('quotation.destroy', $quotation) }}" class="d-inline" method="post">
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


