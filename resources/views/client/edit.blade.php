@extends('layouts.app')

@section('content')
    <div class="container">
<form action="{{ url('/quotation/' . $client->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('client.form', ['mode'=>'Edit'])
</form>
    </div>
@endsection
