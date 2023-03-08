<h1>{{ $mode }} Quotation</h1>
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
    <label for="name">Quotation name</label>
    <input type="text" name="name" class="form-control" value="{{ isset($quotation->name) ? $quotation->name: old('name') }}">
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" class="form-control" name="description">{{ isset($quotation->description) ? $quotation->description : old('description') }}</textarea>
</div>
<br>
<input type="submit" class="btn btn-success" value="{{ $mode }} quotation">
    <a class="btn btn-primary" href="{{ url('quotation/') }}">Return</a>

