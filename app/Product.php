<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name','description','long_description','price','category_id'
    ];

    //$product->category
    public function category(){
        return $this->belongsTo('App\Category');
    }

    //$product->images
    public function images(){
        return $this->hasMany('App\ProductImages');
    }

    /*accesor o campo calculado*/
    public function getFeaturedImageUrlAttribute(){
        $featuredImage=$this->images()->where('featured',true)->first();

        if(!$featuredImage){
            $featuredImage=$this->images()->first();
        }
        if ($featuredImage){
            return $featuredImage->url;
        }

        /*si no existe imagen destacada ni cualquier imagen
        devolvemos imagen default*/
        return '/images/products/default_product.png';
    }

    /*accesor o campo calculado*/
    public function getCategoryNameAttribute(){
        if($this->category){
            return $this->category->name;
        }

        return 'General';
    }
}
