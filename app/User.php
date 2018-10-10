<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password','phone','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*relacion con Cart*/
    public function carts(){
        return $this->hasMany('App\Cart');
    }

    /*accesor propio para obtener el carrito
    activo del user*/
    public function getActiveCartAttribute(){
        $cart=$this->carts()->where('status','Active')->first();

        if($cart){
            return $cart;
        }

        $cart=new Cart();
        $cart->status='Active';
        $cart->user_id=$this->id;
        $cart->save();

        /*id del Cart recien creado*/
        return $cart;
    }

}
