<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    //
    public function store(Request $request){


        $cartDetail= new CartDetail();

        /*accediendo mediante accesor al cart_id activo*/
        $cartDetail->cart_id=auth()->user()->active_cart->id;

        $cartDetail->product_id=$request->product_id;
        $cartDetail->quantity=$request->quantity;
        $cartDetail->save();

        $notification='Agregaste un item correctamente al carrito';
        return back()->with(compact('notification'));
    }

    public function destroy(Request $request){
        $cartDetail=CartDetail::findOrFail($request->cart_detail_id);

        /*solo podemos eliminar detalles que esten en nuestro carrito activo*/
        if($cartDetail->cart_id==auth()->user()->active_cart->id){
            $cartDetail->delete();
        }

        $notification="Ha eliminado un producto del carrito satisfactoriamente";

        /*flash data*/
        return back()->with(compact('notification'));
    }
}
