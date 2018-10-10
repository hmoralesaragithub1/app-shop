<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
        $category=Category::create($request->only('name','description'));

        if($request->hasFile('image')){
            /*vamos a guardar la imagen en el proyecto*/
            $file=$request->file('image');

            /*public_path() = C:\xampp\htdocs\app-shop\public*/
            $path=public_path().'/images/categories';

            /*uniqid=entero unico */
            /*$file->getClientOriginalName()=nombre original del archivo cargado*/
            $fileName=uniqid().$file->getClientOriginalName();

            /*movemos el archivo del tmp a public*/
            $moved=$file->move($path,$fileName);

            //dd($path.'/'.$fileName);
            //$ruta_ver=$path.'/'.$fileName;

            /*vamos a guardar la ruta de la imagen en la bd*/
            if($moved){
                $category->image=$fileName;
                $category->update();
            }

        }

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

        $category->update($request->only('name','description'));

        if($request->hasFile('image')){
            /*vamos a guardar la imagen en el proyecto*/
            $file=$request->file('image');

            /*public_path() = C:\xampp\htdocs\app-shop\public*/
            $path=public_path().'/images/categories';

            /*uniqid=entero unico */
            /*$file->getClientOriginalName()=nombre original del archivo cargado*/
            $fileName=uniqid().$file->getClientOriginalName();

            /*movemos el archivo del tmp a public*/
            $moved=$file->move($path,$fileName);

            //dd($path.'/'.$fileName);
            //$ruta_ver=$path.'/'.$fileName;

            /*vamos a guardar la ruta de la imagen en la bd*/
            if($moved){

                /*borramos la imagen anterior del disco*/
                $previousPath=$path.'/'.$category->image;

                $category->image=$fileName;
                $updated=$category->update();

                if($updated){
                    File::delete($previousPath);
                }
            }

        }

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
