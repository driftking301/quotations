<h1>{{ $mode }} Quotation</h1>
<label for="name">Nombre de la Estimación</label>
<input type="text" name="name" value="{{ isset($quotation->name) ? $quotation->name: '' }}">
<br>
<label for="description">Descripción</label>
<input type="text" name="description" value="{{ isset($quotation->description) ? $quotation->description: '' }}">
<br>
<input type="submit" value="{{ $mode }} quotation">
<a href="{{ url('quotation/') }}">Regresar</a>
