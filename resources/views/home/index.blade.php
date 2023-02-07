@extends('layouts.app')
@section('title', "shinjiku")

@section('content')
	<div class="row">
		<div class="col-md-6 col-lg-4 mb-2">
			<img src= {{ asset('/img/1.jpg') }} class="img-fluid rounded">
		</div>
		<div class="col-md-6 col-lg-4 mb-2">
			<img src= {{ asset('/img/2.jpg') }} class="img-fluid rounded">
		</div>
		<div class="col-md-6 col-lg-4 mb-2">
			<img src= {{ asset('/img/3.jpg') }} class="img-fluid rounded">
		</div>
	</div>
@endsection