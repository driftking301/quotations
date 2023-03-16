@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h4><i class="fa-solid fa-list"></i> {{ $mode }} Quote</h4>
    </div>
<div class="card-body">
<div class="form-group">
    <div class="row">
        <div class="col-md-5">
            <label for="name">Quote name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($quotation->name) ? $quotation->name: old('name') }}">
        </div>
        <div class="col-md-5">
            <label for="client">Customer</label>
            <select class="form-select select2 select2-selection--single" name="client_id">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" @selected($customer->id == $quotation->client_id ?? old('client_id'))>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label for="description">Date</label>
            <input type="date" name="date" class="form-control" value="{{ isset($quotation->date) ? $quotation->date: old('date') }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" class="form-control" name="description">{{ isset($quotation->description) ? $quotation->description : old('description') }}</textarea>
</div>
</div>
<br>
    <div class="card-footer">
        <button type="submit" class="btn btn-sm btn-primary" value="Save"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        <a class="btn btn-sm btn-secondary" href="{{ route('quotation.details.index', $quotation) }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
    </div>
</div>

