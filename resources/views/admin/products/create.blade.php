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
                <h2 class="title">Registrar Producto</h2>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-left"><strong>Error!</strong> {{$error}}.</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="form-group" action="{{route('products.store')}}" method="POST">
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre del producto</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Precio del Producto</label>
                                <input type="number" step="0.01" class="form-control" name="price" value="{{old('price')}}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Descripción corta</label>
                                <input type="text" class="form-control" name="description" value="{{old('description')}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputState" class="float-left">Categoría</label>
                                <select id="inputState" class="form-control" name="category_id">
                                    <option value="{{null}}" selected>General</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Descripción extensa del producto</label>
                                <textarea name="long_description" class="form-control" rows="5">{{old('long_description')}}</textarea>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-primary">Registrar</button>
                    <a href="{{route('products.index')}}" class="btn btn-warning">Cancelar</a>
                </form>
            </div>

        </div>
    </div>
    @include('includes.footer')

@endsection
