<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function update(){
        $cart=auth()->user()->active_cart;

        $cart->status='Pending';
        $cart->update();

        $notification='Tu pedido se ha registrado correctamente. Te contactaremos pronto por correo';
        return back()->with(compact('notification'));
    }
}
