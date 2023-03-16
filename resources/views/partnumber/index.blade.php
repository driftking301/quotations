@extends('layouts.app')

@section('content')
    <div class="container">

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Sheet name</th>
            <th>Part Number</th>
            <th>Description</th>
            <th>Unit Measure</th>
            <th>Price</th>
            <th class="text-center">Actions <a href="{{ route('partnumber.create') }}" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i></a></th>
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
            <td>$ {{ $partnumber->price }}</td>

            <td class="text-center">
                <a href="{{ route('partnumber.edit', $partnumber) }}" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>


                <form action="{{ route('partnumber.destroy', $partnumber) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Do you want to delete the item?')"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
        {!! $partnumbers->links() !!}
    </div>
@endsection
