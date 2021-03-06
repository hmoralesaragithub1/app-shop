@extends('layouts.app')

@section('title')
    App Shop | Detalle de Categorías
@endsection

@section('main-body-class')
    profile-page
@endsection

{{--
@section('styles')
    <style>
        .team{
            padding-bottom: 50px;
        }
    </style>
@endsection
--}}

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile.jpg')}}');"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="{{asset($category->featured_image_url)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>

                            <div class="name">
                                <h3 class="title">{{$category->name}}</h3>

                                {{--
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
                                --}}
                            </div>

                            @if(session('notification'))
                                <div class="alert alert-success" role="alert">
                                    {{session('notification')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{$category->description}}</p>
                </div>
            {{--  <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile-tabs">
                        <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                    <i class="material-icons">camera</i> Studio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                    <i class="material-icons">palette</i> Work
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                    <i class="material-icons">favorite</i> Favorite
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}

                <div class="team text-center pb-2">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <div class="card card-plain border border-success">
                                        <div class="col-md-6 ml-auto mr-auto">
                                            {{-- <img src="{{asset('img/faces/avatar.jpg')}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid"> --}}
                                            {{-- <img src="{{$product->images()->first()->image}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid"> --}}
                                            <img src="{{asset($product->featured_image_url)}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                        </div>
                                        <a href="{{route('products.show',$product->id)}}" class="card-title h4">{{$product->name}}
                                            <br>
                                            {{-- accedemos a un campo calculado--}}
                                            {{--  <small class="card-description text-muted">{{$product->category_name}}</small> --}}
                                        </a>
                                        <div class="card-body">
                                            <p class="card-description">{{$product->description}}</p>
                                        </div>
                                        {{--
                                            <div class="card-footer justify-content-center">
                                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                                            <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                                        </div>
                                        --}}

                                    </div>
                                </div>
                            </div>

                            {{--
                            <div class="col-md-4">
                            <div class="team-player">
                                <div class="card card-plain">
                                    <div class="col-md-6 ml-auto mr-auto">
                                        <img src="{{asset('img/faces/christian.jpg')}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                    </div>
                                    <h4 class="card-title">Christian Louboutin
                                        <br>
                                        <small class="card-description text-muted">Designer</small>
                                    </h4>
                                    <div class="card-body">
                                        <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                                            <a href="#">links</a> for people to be able to follow them outside the site.</p>
                                    </div>
                                    <div class="card-footer justify-content-center">
                                        <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                                        <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="team-player">
                                <div class="card card-plain">
                                    <div class="col-md-6 ml-auto mr-auto">
                                        <img src="{{asset('img/faces/kendall.jpg')}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                                    </div>
                                    <h4 class="card-title">Kendall Jenner
                                        <br>
                                        <small class="card-description text-muted">Model</small>
                                    </h4>
                                    <div class="card-body">
                                        <p class="card-description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                                            <a href="#">links</a> for people to be able to follow them outside the site.</p>
                                    </div>
                                    <div class="card-footer justify-content-center">
                                        <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                                        <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                                        <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        --}}
                        @endforeach
                    </div>
                    <div class="row mb-2">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="modalCarrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-info" id="exampleModalLabel">Añadir producto al Carrito</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('cartDetail.show')}}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Ingrese cantidad</label>
                            <input type="number" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="0" min="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('includes.footer')

@endsection










