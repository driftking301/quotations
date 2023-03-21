@extends('layouts.app')

@section('content')
    <script src="https://kit.fontawesome.com/283d08d6db.js" crossorigin="anonymous" defer="defer"></script>

    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-10">
                <h5>Quote name: {{ $quotation->name }} / {{$quotation->client->name }} </h5>
                <p>{{ $quotation->description }}</p>
            </div>
            <div class="col-md-2 align-self-end">
                <a class="btn btn-dark" href="{{ route('quotation.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
                <!--button type="button" class="btn btn-secondary" data-toggle="processConfig" data-placement="top" data-bs-toggle="modal" data-bs-target="#processConfigModal"><i class="fa-solid fa-gear"></i></button-->
                <a class="btn btn-secondary" href="{{ route('quotation.processes', $quotation) }}"><i class="fa-solid fa-gear"></i></a>
                <a class="btn btn-primary" href="{{ route('quotation.edit', $quotation) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="btn btn-warning" href="{{ route('quotation.details.create', $quotation) }}"><i class="fa-solid fa-plus"></i></a>


                <!--<button type="button" class="btn btn-warning" data-toggle="add process" data-placement="top" data-bs-toggle="modal" data-bs-target="#processModal"><i class="fa-solid fa-plus"></i></button>-->

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover" id="partnumber-table">
                    <thead>
                    <tr>
                        <th>Part Number</th>
                        <th>Part desc.</th>
                        <th class="text-center">Width</th>
                        <th class="text-center">Length</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Factor</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $detail)
                    <tr>
                        <td>{{ $detail->partnumber }}</td>
                        <td>{{ $detail->description }}</td>
                        <td class="text-center">{{ $detail->width }}</td>
                        <td class="text-center">{{ $detail->length }}</td>
                        <td class="text-center">{{ $detail->quantity }}</td>
                        <td class="text-center">{{ $detail->factor }}</td>
                        <td class="text-center">{{ $detail->total }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i></button>
                            <form action="{{ route('details.destroy', $detail) }}" class="d-inline" method="post">
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
        </div>


</div>

    <!-- ---------------------------------------------------- PROCESSES PRICES MODAL --------------------------------------------------------
     ----------------------------------------------------------------------------------------------------------------------------- -->
    <div class="modal fade" id="processConfigModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Processes for {{ $quotation->name }}</h5>
                </div>
                <div class="modal-body">
                    @foreach($processesSettings as $key => $values)
                        <div class="form-group">
                            <div class="card-body">
                                <h5 class="card-title">{{ $values['name'] }}</h5>
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="{{ $key }}" class="col-form-label">Price</label>
                                        <input type="text" name="{{ $key }}" class="form-control-sm" value="{{ number_format(floatval($quotation->{$key} ?? $values['price'] ?? old($key)), 2) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="units">Units</label>
                                        <input value="{{ $values['units'] }}" class="form-control-sm" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="notes">Notes</label>
                                        <input value="{{ $values['notes']}}" name="notes" class="form-control-sm" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
