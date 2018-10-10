<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*validacion*/
    public static $rules=[
        'name'=>'required|min:3',
        'description'=>'max:250'
    ];

    /*mensajes propios de error*/
    public static $messages=[
        'name.required'=>'El campo nombre es obligatorio',
        'name.min'=>'El campo nombre como mínimo debe tener 3 caracteres',
        'description.max'=>'El campo descripción como máximo debe tener 250 caracteres'
    ];

    protected $fillable=[
        'name','description'
    ];

    //$category->products
    public function products(){
        return $this->hasMany('App\Product');
    }

    public function getFeaturedImageUrlAttribute(){

        if($this->image){
            return '/images/categories/'.$this->image;
        }
        $featuredProduct=$this->products()->first();
        if($featuredProduct){
            return $featuredProduct->featured_image_url;
        }

        /*imagen por defecto*/
        return '/images/products/default_product.png';
    }
}
