@extends('layouts.app')

@section('title')
    Imágenes del Producto
@endsection

@section('main-body-class')
    profile-page
@endsection

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
        <div class="container">

        </div>
    </div>
    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                @if(session('info'))
                    <div class="alert alert-success" role="alert">
                        <strong>Bien hecho!</strong> {{session('info')}}
                    </div>
                @endif

                <h2 class="title">Imagenes del Producto "{{$product->name}}"</h2>
                    <form action="{{route('images.store',$product->id)}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="file" name="foto" required>
                        <button type="submit" class="btn btn-primary btn-round m-auto">Subir nueva imágen</button>
                        <a href="{{route('products.index')}}" class="btn btn-primary btn-round m-auto">Volver al listado de Productos</a>
                    </form>


                    <div class="row text-center">
                        @foreach($images as $image)
                            <div class="card col-md-4">
                                {{-- src llama a un accesor del modelo url=getUrlAttribute --}}
                                <img class="card-img-top" src="{{asset($image->url)}}" alt="Card image cap">
                                <div class="card-body">
                                    <div class="row">
                                        <form action="{{route('images.destroy',$image->id)}}" method="POST" class="col-md-6">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <button type="submit" class="btn btn-danger btn-round m-auto">Eliminar imágen</button>
                                        </form>
                                        <form action="{{route('images.update_featured',$image->id)}}" method="POST" class="col-md-6">
                                            {!! csrf_field() !!}
                                            {!! method_field('PUT') !!}
                                            @if($image->featured)
                                                <button type="submit" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                                    <i class="material-icons">favorite</i>
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-default btn-fab btn-fab-mini btn-round">
                                                    <i class="material-icons">favorite</i>
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

            </div>

        </div>
    </div>
    @include('includes.footer')

@endsection
