<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    //
    public function update(){

        $client=auth()->user();
        $cart=$client->active_cart;

        $cart->status='Pending';
        $cart->order_date=Carbon::now('America/Lima');
        $cart->update();


        /*Despues de registar la orden con el carrito enviamos
        automaticamente un email a todos los admin de nuestra aplicación*/
        $admins=User::where('admin',true)->get();

        //dd($admins);
        Mail::to($admins)->send(new NewOrder($client,$cart));

        $notification='Tu pedido se ha registrado correctamente. Te contactaremos pronto por correo';
        return back()->with(compact('notification'));
    }
}
