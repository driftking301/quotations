<h1>{{ $mode }} Client</h1>
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
        <div class="col-md-6">
            <label for="name">Client name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($client->name) ? $client->name: old('name') }}">
        </div>
        <div class="col-md-6">
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

<br>
<input type="submit" class="btn btn-secondary" value="{{ $mode }} client">
    <a class="btn btn-secondary" href="{{ url('client/') }}">Return</a>
