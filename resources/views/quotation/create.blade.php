<h1>Formulario de creación de Estimación</h1>
<br>
<form action="{{ url('/quotation') }}" method="post">
    @csrf
    @include('quotation.form', ['mode'=>'Create']);

</form>
