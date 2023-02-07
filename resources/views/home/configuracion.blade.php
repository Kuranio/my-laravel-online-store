@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<form method="POST" action="{{ route('home.sesion') }}">
	@csrf
	<div class="m-3">
		<label class="form-label me-3">Tipo de Letra:</label>
		<select class="form-select col-12" name="letra">
			@if(Session::has('letra'))
				<option selected hidden>{{ Session::get('letra') }}</option>
			@else
					<body>
			@endif
			<option value="Helvetica">Helvetica</option>
			<option value="Arial">Arial</option>
			<option value="Consolas">Consolas</option>
			<option value="Serif">Serif</option>
		</select>
	</div>
	<div class="m-3">
		<label class="form-label">Color encabezado:</label>
		@if(Session::has('encabezado'))
				<input class="form-control" name="encabezado" type="color"
					value="{{ Session::get('encabezado') }}">
		@else
				<input class="form-control" name="encabezado" type="color" value="#1abc9c">
		@endif
	</div>
	<button type="submit" class="btn btn-primary d-block mx-auto">Enviar</button>
</form>
@endsection