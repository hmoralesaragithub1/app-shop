<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table='product_images';

    protected $fillable=[
        'image','featured','product_id'
    ];

    //$productImages->product
    public function product(){
        return $this->belongsTo('App\Product');
    }

    /*campo calculado = accesor y en la vista solo llamamos url*/
    public function getUrlAttribute(){
        if(substr($this->image,0,4)=='http'){
            return $this->image;
        }

        return '/images/products/'.$this->image;
    }

}
