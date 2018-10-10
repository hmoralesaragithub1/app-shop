<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories=Category::paginate(10);

        /*form de listado*/
        return view('admin.categories.index')->with(compact('categories'));
    }

    public function create(){

        /*form para creacion*/
        return view('admin.categories.create');
    }

    public function store(Request $request){

        /*validacion*/
        /*
        $rules=[
            'name'=>'required|min:3',
            'description'=>'max:250'
        ];
        */

        /*mensajes propios de error*/
        /*
        $messages=[
            'name.required'=>'El campo nombre es obligatorio',
            'name.min'=>'El campo nombre como mínimo debe tener 3 caracteres',
            'description.max'=>'El campo descripción como máximo debe tener 250 caracteres'
        ];
        */

        /*Accedemos a variables publicas estaticas del modelo*/
        $this->validate($request,Category::$rules,Category::$messages);

        /*asignacion masiva de datos*/
        Category::create($request->all());

        return redirect()->route('categories.index')->with('info','Categoría creada correctamente!!!');
    }

    public function edit(Category $category){

        //$category=Category::findOrFail($id);
        /*form para creacion*/
        /*ya no usamo findOrFail porque al recibir el id en un obejto Category automaticamente
        busca la categoria con ese id*/
        return view('admin.categories.edit')->with(compact('category'));
    }

    public function update(Request $request,Category $category){


        /*validacion*/
        /*
        $rules=[
            'name'=>'required|min:3',
            'description'=>'max:250'
        ];
        */
        /*mensajes propios de error*/
        /*
        $messages=[
            'name.required'=>'El campo nombre es obligatorio',
            'name.min'=>'El campo nombre como mínimo debe tener 3 caracteres',
            'description.max'=>'El campo descripción como máximo debe tener 250 caracteres'
        ];
        */

        /*Accedemos a variables publicas estaticas del modelo*/
        $this->validate($request,Category::$rules,Category::$messages);


        //dd($request->except('_token'));

        //Category::where('id',$id)->update($request->except('_token'));

        /*ya no usamo where porque al recibir el id en un obejto Category automaticamente
        busca la categoria con ese id*/

        $category->update($request->all());

        return redirect()->route('categories.index')->with('info','Categoría actualizada correctamente!!!');
    }

    public function destroy(Category $category){

        //dd($request->except('_token'));

        //Product::where('id',$id)->delete();

        /*ya no usamo where porque al recibir el id en un obejto Category automaticamente
        busca la categoria con ese id*/
        $category->delete();

        return redirect()->route('categories.index')->with('info','Categoría eliminada correctamente!!!');
    }
}
