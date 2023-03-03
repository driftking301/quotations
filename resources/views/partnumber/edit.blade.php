@extends('layouts.app')

@section('content')
    <div class="container">
<form action="{{ url('/partnumber/' . $partnumber->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('partnumber.form', ['mode'=>'Edit'])
</form>
    </div>
@endsection
