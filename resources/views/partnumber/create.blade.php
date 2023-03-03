@extends('layouts.app')

@section('content')
    <div class="container">
<br>
<form action="{{ url('/partnumber') }}" method="post">
    @csrf
    @include('partnumber.form', ['mode'=>'Create'])

</form>
    </div>
@endsection
