<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function show(Request $request){
        $query = $request->input('query');

        $products=Product::where("name","LIKE","%$query%")->paginate(5);

        /**si solo hay una coincidencia debemos ir directamente a la pagina del producto*/
        if($products->count()==1){
            $id=$products->first()->id;
            return redirect()->route('products.show',$id);
        }

        return view('search.show')->with(compact('products','query'));
    }

    public function data(){
        $products=Product::pluck('name');
        return $products;
    }
}
