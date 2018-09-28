<?php

namespace App\Http\Controllers\Admin;

use App\ProductImages;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
class ImageController extends Controller
{
    //
    public function index($id){

        $product=Product::findOrFail($id);
        $images=$product->images;
        return view('admin.products.images.index')->with(compact('product','images'));
    }

    public function store(Request $request,$id){
        /*vamos a guardar la imagen en el proyecto*/
        $file=$request->file('foto');

        /*public_path() = C:\xampp\htdocs\app-shop\public*/
        $path=public_path().'/images/products';

        /*uniqid=entero unico */
        /*$file->getClientOriginalName()=nombre original del archivo cargado*/
        $fileName=uniqid().$file->getClientOriginalName();

        /*movemos el archivo del tmp a public*/
        $moved=$file->move($path,$fileName);

        //dd($path.'/'.$fileName);
        //$ruta_ver=$path.'/'.$fileName;

        /*vamos a guardar la ruta de la imagen en la bd*/
        if($moved){
            ProductImages::create([
                'image'=>$fileName,
                'product_id'=>$id
            ]);
        }

        return back();
    }

    public function destroy($id){
        /*ELIMINAR EL ARCHIVO*/
        $productImages=ProductImages::findOrFail($id);

        /*eliminamos solo si es archivo local*/
        if(substr($productImages->image,0,4)=== 'http'){
            $deleted=true;
        }else{
            $fullPath=public_path().'/images/products/'.$productImages->image;
            $deleted=File::delete($fullPath);
        }

        /*ELIMINAR EL REGISTRO EN LA BD*/
        if($deleted){
            $productImages->delete();
        }

        return back();

    }

    public function update_featured($id){
        $productImages=ProductImages::findOrFail($id);

        $productImages->featured=!$productImages->featured;

        $arrayUpdate=[
            'featured'=>$productImages->featured
        ];


        $productImages->update($arrayUpdate);

        return back();
    }
}
