@extends('layouts.app')

@section('content')
    <div class="container">
<br>
<form action="{{ url('/quotation') }}" method="post">
    @csrf
    @include('quotation.form', ['mode'=>'Create'])

</form>
    </div>
@endsection
