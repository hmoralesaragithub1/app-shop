<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function index(){
        $products=Product::paginate(10);

        /*form de listado*/
        return view('admin.products.index')->with(compact('products'));
    }

    public function create(){

        $categories=Category::orderBy('name')->get();
        /*form para creacion*/
        return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request){

        /*validacion*/
        $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0'
        ];

        /*mensajes propios de error*/
        $messages=[
            'name.required'=>'El campo nombre es obligatorio',
            'name.min'=>'El campo nombre como mínimo debe tener 3 caracteres',
            'description.required'=>'El campo descripción es obligatorio',
            'description.max'=>'El campo descripción como máximo debe tener 200 caracteres',
            'price.required'=>'El campo precio es obligatorio',
            'price.numeric'=>'El campo precio solo puede ser numerico',
            'price.min'=>'El campo precio no puede ser menor que 0',
        ];

        $this->validate($request,$rules,$messages);

        Product::create($request->all());

        return redirect()->route('products.index')->with('info','Producto creado correctamente!!!');
    }

    public function edit($id){

        $product=Product::findOrFail($id);
        $categories=Category::orderBy('name')->get();
        /*form para creacion*/
        return view('admin.products.edit')->with(compact('product','categories'));
    }

    public function update(Request $request,$id){


        /*validacion*/
        $rules=[
            'name'=>'required|min:3',
            'description'=>'required|max:200',
            'price'=>'required|numeric|min:0'
        ];

        /*mensajes propios de error*/
        $messages=[
            'name.required'=>'El campo nombre es obligatorio',
            'name.min'=>'El campo nombre como mínimo debe tener 3 caracteres',
            'description.required'=>'El campo descripción es obligatorio',
            'description.max'=>'El campo descripción como máximo debe tener 200 caracteres',
            'price.required'=>'El campo precio es obligatorio',
            'price.numeric'=>'El campo precio solo puede ser numerico',
            'price.min'=>'El campo precio no puede ser menor que 0',
        ];

        $this->validate($request,$rules,$messages);


        //dd($request->except('_token'));

        Product::where('id',$id)->update($request->except('_token'));

        return redirect()->route('products.index')->with('info','Producto actualizado correctamente!!!');
    }

    public function destroy($id){

        //dd($request->except('_token'));

        Product::where('id',$id)->delete();

        return redirect()->route('products.index')->with('info','Producto eliminado correctamente!!!');
    }

}
