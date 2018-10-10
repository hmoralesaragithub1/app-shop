@extends('layouts.app')

@section('title')
    App Shop | Dashboard
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
                <h2 class="title">Bienvenidos al Dashboard</h2>
                @if(session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{session('notification')}}
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <ul class="nav nav-pills nav-pills-icons" role="tablist">
                    <!--
                        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                    -->
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                            <i class="material-icons">shopping_cart</i>
                            Carrito de Compras
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos Realizados
                        </a>
                    </li>
                </ul>

                <div class="tab-content tab-space">
                    <div class="tab-pane active" id="dashboard-1">
                        <table class="table table-responsive table-bordered table-hover mt-2">
                            <thead>
                            <tr>
                                <th class="text-center" width="20%">Imagen</th>
                                <th width="20%">Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $products_count=0;
                            @endphp
                            @foreach(auth()->user()->active_cart->details as $detail)
                                @php
                                    $products_count+=$detail->quantity;
                                @endphp
                                <tr>
                                    <td class="text-center">
                                        <img src="{{asset($detail->product->featured_image_url)}}" height="50px">
                                    </td>
                                    <td>
                                        <a href="{{route('products.show',$detail->product->id)}}" target="_blank">{{$detail->product->name}}</a>
                                    </td>
                                    <td class="">&#36; {{$detail->product->price}}</td>
                                    <td class="">{{$detail->quantity}}</td>
                                    <td class="">&#36; {{$detail->product->price*$detail->quantity}}</td>
                                    <td class="td-actions">
                                        {{-- ELIMINACIÓN --}}
                                        <form action="{{route('cartDetail.destroy')}}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                            {{-- -por diseño colocamos estas opciones dentro del form--}}
                                            <a type="button" rel="tooltip" class="btn btn-info btn-sm" title="Ver Detalle" href="{{route('products.show',$detail->product->id)}}" target="_blank">
                                                <i class="material-icons">pageview</i>
                                            </a>
                                            <button type="submit" rel="tooltip" class="btn btn-danger btn-sm" title="Eliminar">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfooter>
                                <tr>
                                    <td colspan="4"><strong>Total a Pagar</strong></td>
                                    <td><strong>{{auth()->user()->active_cart->total}}</strong></td>
                                </tr>
                            </tfooter>
                        </table>
                        <hr>
                        <p class="text-primary">Has agregado {{auth()->user()->active_cart->details->count()}} items a tu carrito</p>
                        <p class="text-primary">Con un total de {{$products_count}} productos</p>
                        <form action="{{route('cart.update')}}" method="POST">
                            {!! csrf_field() !!}
                            <button class="btn btn-success btn-round">
                                <i class="material-icons">check_circle_outline</i> Realizar Pedido
                            </button>
                        </form>
                    </div>
                    <div class="tab-pane" id="tasks-1">
                        Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                        <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('includes.footer')

@endsection










