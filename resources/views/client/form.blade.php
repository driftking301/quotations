
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
        <h4 class="cart-title">{{ $mode }} Client</h4>
    </div>
    <div class="card-body">
<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label for="name">Client alias</label>
            <input type="text" name="name" class="form-control" value="{{ isset($client->name) ? $client->name: old('name') }}">
        </div>
        <div class="col-md-4">
            <label for="realname">Client real name</label>
            <input type="text" name="description" class="form-control" value="{{ isset($client->description) ? $client->description: old('description') }}">
        </div>
        <div class="col-md-4">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="{{ isset($client->description) ? $client->description: old('description') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="notes">Notes</label>
            <textarea type="text" name="notes" class="form-control">{{ isset($client->notes) ? $client->notes: old('notes') }}</textarea>
        </div>

    </div>
</div>
</div>
<br>
    <div class="card-footer">
        <div class="offset-10">
            <input type="submit" class="btn btn-primary" value="Save">
            <a class="btn btn-secondary" href="{{ url('client/') }}">Back</a>
        </div>
    </div>
</div>
