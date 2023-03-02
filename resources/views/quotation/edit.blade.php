
<form action="{{ url('/quotation/' . $quotation->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('quotation.form', ['mode'=>'Edit']);
</form>
