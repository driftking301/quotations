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
        <h3>{{ $mode }} Part Number</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="sheetname">Sheet Name</label>
                    <input type="text" name="sheetname" class="form-control" value="{{ isset($partnumber->sheetname) ? $partnumber->sheetname: old('sheetname') }}">
                </div>
                <div class="col-md-4">
                    <label for="partnumber">Part Number</label>
                    <input type="text" class="form-control" name="partnumber" value="{{ isset($partnumber->partnumber) ? $partnumber->partnumber: old('partnumber') }}">
                </div>
                <div class="col-md-4">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ isset($partnumber->description) ? $partnumber->description: old('description') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="partnumber">Unit Measure</label>
                    <input type="text" class="form-control" name="unitmeasure" value="{{ isset($partnumber->unitmeasure) ? $partnumber->unitmeasure: old('unitmeasure') }}">
                </div>
                <div class="col-md-4">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="Price" value="{{ isset($partnumber->price) ? $partnumber->price: old('price') }}">
                </div>
        </div>
    </div>
    <div class="card-footer">
        <input type="submit" class="btn btn-sm btn-primary" value="Save">
        <a class="btn btn-sm btn-secondary" href="{{ url('partnumber/') }}">Return</a>
    </div>
</div>
