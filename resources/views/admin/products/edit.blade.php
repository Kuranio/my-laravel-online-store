@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')

<div class="card mb-4">
    <div class="card-header">
        Crear productos
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.products.update', ['id' => $viewData['product']['id']]) }}" enctype="multipart/form-data">
            @method('PUT')
            <div class="row">
                <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nombre:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input name="name" type="text" class="form-control" value="{{$viewData['product']['name']}}">
                    </div>
                </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Precio:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="price" type="number" class="form-control" value="{{$viewData['product']['price']}}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Imagen:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="image" type="file" class="form-control" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" name="description" rows="3">{{$viewData['product']['description']}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            @csrf
        </form>
    </div>
    </div>

@endsection