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
    <label for="sheetname">Sheet Name</label>
    <input type="text" name="sheetname" class="form-control" value="{{ isset($partnumber->sheetname) ? $partnumber->sheetname: old('sheetname') }}">
</div>
<div class="form-group">
    <label for="partnumber">Part Number</label>
    <input type="text" class="form-control" name="partnumber" value="{{ isset($partnumber->partnumber) ? $partnumber->partnumber: old('partnumber') }}">
</div>
<div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" value="{{ isset($partnumber->description) ? $partnumber->description: old('description') }}">
</div>
<div class="form-group">
    <label for="partnumber">Unit Measure</label>
    <input type="text" class="form-control" name="unitmeasure" value="{{ isset($partnumber->unitmeasure) ? $partnumber->partnumber: old('unitmeasure') }}">
</div><div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" name="Price" value="{{ isset($partnumber->price) ? $partnumber->price: old('price') }}">
</div>
<br>
<input type="submit" class="btn btn-success" value="{{ $mode }} part number">
    <a class="btn btn-primary" href="{{ url('partnumber/') }}">Return</a>

