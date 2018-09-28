@extends('layouts.app')

@section('title')
    Bienvenidos a Latina
@endsection

@section('main-body-class')
    landing-page
@endsection

@section('styles')
    {{--
    <style>
        .row{
            overflow: hidden;
        }

        [class*="col-"]{
            margin-bottom: -99999px;
            padding-bottom: 99999px;
        }
    </style>
    --}}

@endsection

@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Hey, Somos Latina, ya llegamos</h1>
                    <h4>Latina ha llegado para brindarte los mejores productos cosméticos de calidad, al mejor precio y seremos por siempre tu mejor opción</h4>
                    <br>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-play"></i> Conócenos un poco más
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">¿Porque elegir Latina?</h2>
                        <h5 class="description">Nuestros productos son de marcas reconicidas mundialmente, y te los ofrecemos al mejor precio y con total calidad. Estamos comprometidos con la satisfacción total de nuestros clientes y para esto te damos nuestras características principales</h5>
                    </div>
                </div>
                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="material-icons">chat</i>
                                </div>
                                <h4 class="info-title">Marcas Líderes</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Pago Seguro</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <h4 class="info-title">Reparto Instantáneo y Gratuito</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section text-center">
                <h2 class="title">Productos Disponibles</h2>
                <div class="team">
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
                                        <small class="card-description text-muted">{{$product->category->name}}</small>
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
                    <div class="row">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
            <div class="section section-contacts">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="text-center title">¿Aún no te has registrado, que esperas?</h2>
                        <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Your Name</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Your Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
                                <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto text-center">
                                    <button class="btn btn-primary btn-raised">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')

@endsection
