<h1>{{ $mode }} Quote</h1>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label for="name">Quote name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($quotation->name) ? $quotation->name: old('name') }}">
        </div>
        <div class="col-md-4">
            <label for="client">Client</label>
            <input type="text" name="client" class="form-control" value="{{ isset($quotation->client) ? $quotation->client: old('client') }}">
        </div>
        <div class="col-md-4">
            <label for="description">Date</label>
            <input type="date" name="date" class="form-control" value="{{ isset($quotation->date) ? $quotation->date: old('date') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" class="form-control" name="description">{{ isset($quotation->description) ? $quotation->description : old('description') }}</textarea>
</div>

<br>
<input type="submit" class="btn btn-secondary" value="{{ $mode }} quotation">
    <a class="btn btn-secondary" href="{{ url('quotation/') }}">Return</a>
