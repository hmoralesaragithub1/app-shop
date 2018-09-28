<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function show($id){
        $product=Product::findOrFail($id);
        $images=$product->images;

        /*coleccion vacia
        las colecciones son como arrays pero se tratan como objetos*/
        $imagesLeft=collect();
        $imagesRight=collect();

        foreach ($images as $key=>$image){
            /*$key nos da el indice de cada pasada*/
            if($key%2==0){
                $imagesLeft->push($image);
            }else{
                $imagesRight->push($image);
            }
        }
        return view('products.show')->with(compact('product','imagesLeft','imagesRight'));
    }
}
