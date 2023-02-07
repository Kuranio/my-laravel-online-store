@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
    <!-- Esto es lo que debe contener el yield contenido de la plantilla de nuestra web cuando el usuario acceda a la vista "products" -->

    <div class="row">
        <!-- Bucle con una iteración por cada producto -->
        @foreach ($viewData['products'] as $clave => $valor)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
            <img src=" {{ asset('storage/'.$valor["image"]) }} " class="card-img-top img-card">
            <div class="card-body text-center">
                <a href=" {{ route('products.show', ['id'=> $valor["id"]])  }} "
                class="btn bg-primary text-white"> {{ $valor["name"] }} </a>
            </div>
            </div>
        </div>
        @endforeach
        <!-- FIN bucle con una iteración por cada producto -->
    </div>
@endsection