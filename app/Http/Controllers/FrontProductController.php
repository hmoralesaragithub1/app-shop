<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class FrontProductController extends Controller
{
    //
    public function index(){
        //$products=Product::paginate(9);
        /*obtenemos solo las categorias que tienen productos*/
        $categories=Category::has('products')->get();

        /*form de listado*/
        return view('welcome')->with(compact('categories'));
    }
}
