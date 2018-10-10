@extends('layouts.app')

@section('title')
    App Shop | Detalle de Productos
@endsection

@section('main-body-class')
    profile-page
@endsection

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile.jpg')}}');"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="{{asset($product->featured_image_url)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>

                            <div class="name">
                                <h3 class="title">{{$product->name}}</h3>
                                <h6>{{$product->category_name}}</h6>
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
                    <p>{{$product->long_description}}</p>
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

                <!-- Button trigger modal -->
                <div class="text-center">
                    <button class="btn btn-primary btn-round" type="button"  data-toggle="modal" data-target="#modalCarrito">
                        <i class="material-icons">add_shopping_cart</i> Añadir al Carrito
                    </button>
                </div>

                <div class="tab-content tab-space">
                    <div class="tab-pane active text-center gallery" id="studio">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                @foreach($imagesLeft as $image)
                                    <img src="{{asset($image->url)}}" class="rounded">
                                @endforeach
                            </div>
                            <div class="col-md-3 mr-auto">
                                @foreach($imagesRight as $image)
                                    <img src="{{asset($image->url)}}" class="rounded">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="tab-pane text-center gallery" id="works">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="{{asset('img/examples/olu-eletu.jpg')}}" class="rounded">
                                <img src="{{asset('img/examples/clem-onojeghuo.jpg')}}" class="rounded">
                                <img src="{{asset('img/examples/cynthia-del-rio.jpg')}}" class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="{{asset('img/examples/mariya-georgieva.jpg')}}" class="rounded">
                                <img src="{{asset('img/examples/clem-onojegaw.jpg')}}" class="rounded">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane text-center gallery" id="favorite">
                        <div class="row">
                            <div class="col-md-3 ml-auto">
                                <img src="{{asset('img/examples/mariya-georgieva.jpg')}}" class="rounded">
                                <img src="{{asset('img/examples/studio-3.jpg')}}" class="rounded">
                            </div>
                            <div class="col-md-3 mr-auto">
                                <img src="{{asset('img/examples/clem-onojeghuo.jpg')}}" class="rounded">
                                <img src="{{asset('img/examples/olu-eletu.jpg')}}" class="rounded">
                                <img src="{{asset('img/examples/studio-1.jpg')}}" class="rounded">
                            </div>
                        </div>
                    </div>
                    --}}
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










