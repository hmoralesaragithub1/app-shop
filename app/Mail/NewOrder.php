<?php

namespace App\Mail;

use App\Cart;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;
    public $cart;

    public function __construct(User $user, Cart $cart)
    {
        //si las propiedades son publicas
        //automaticamente accedermos a ellas en la vista
        //sino tendremos que usar with
        $this->user=$user;
        $this->cart=$cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuevo Pedido')
                    ->view('emails.new-order');
    }
}
