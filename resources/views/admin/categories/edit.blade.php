@extends('layouts.app')

@section('title')
    Bienvenidos a Latina
@endsection

@section('main-body-class')
    profile-page
@endsection

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

    </div>
    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Editar Categoría</h2>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-left"><strong>Error!</strong> {{$error}}.</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-group" action="{{route('categories.update',$category->id)}}" method="POST">
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre de la Categoría</label>
                                {{-- mostraremos old si es que hemos cambiado la informacion cargada, sino mostraremos la informacion
                                cargada de la bd--}}
                                <input type="text" class="form-control" name="name" value="{{old('name',$category->name)}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Descripción de la Categoría</label>
                                <textarea name="description" class="form-control" rows="5">{{old('description',$category->description)}}</textarea>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-primary">Actualizar</button>
                    <a href="{{route('categories.index')}}" class="btn btn-warning">Cancelar</a>
                </form>
            </div>

        </div>
    </div>
    @include('includes.footer')

@endsection
