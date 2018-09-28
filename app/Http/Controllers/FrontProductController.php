<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontProductController extends Controller
{
    //
    public function index(){
        $products=Product::paginate(9);

        /*form de listado*/
        return view('welcome')->with(compact('products'));
    }
}
