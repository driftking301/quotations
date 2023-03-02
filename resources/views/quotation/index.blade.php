Mostrar la lista de estimaciones
@if(Session::has('message'))
    {{ Session::get('message') }}
@endif
<a href="{{ url('/quotation/create') }}">Add a new Quotation</a>
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
                <a href="{{ url('/quotation/' . $quotation->id . '/edit') }}">Edit</a>

            </td>
            <td>Delete
                <form action="{{ url('/quotation/'.$quotation->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar')" value="Borrar">
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
