@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
    <!-- Esto es lo que debe contener el yield "content" -->
    <div class="card mb-3">
        <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('storage/'.$viewData['products']['image']) }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">
                {{ $viewData['products']['name'] }} - {{ $viewData['products']['price'] }}€
            </h5>
            <p class="card-text">{{ $viewData['products']['description'] }}</p>
            <p class="card-text"><small class="text-muted">Añadir a la cesta</small></p>
            </div>
        </div>
        </div>
    </div>
  @endsection