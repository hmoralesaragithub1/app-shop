<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Pedido</title>
</head>
<body>
    <p>Se ha realizado un nuevo Pedido</p>
    <p>Estos son los datos del cliente que realizó el pedido:</p>
    <ul>
        <li>
            <strong>Nombre:</strong>
            {{$user->name}}
        </li>
        <li>
            <strong>E-mail:</strong>
            {{$user->email}}
        </li>
        <li>
            <strong>Fecha del Pedido:</strong>
            {{$cart->order_date}}
        </li>
    </ul>
    <hr>
    <p>Detalles del pedido</p>
    <ul>
        @foreach($cart->details as $detail)
            <li>
                {{$detail->product->name}} x{{$detail->quantity}}
                ($ {{$detail->quantity*$detail->product->price}})
            </li>
        @endforeach
    </ul>
    <p><strong>Importe a pagar:</strong>{{$cart->total}}</p>
    <hr>
    <p><a href="">Haz click aquí</a> para ver mas información sobre este pedido</p>
</body>
</html>