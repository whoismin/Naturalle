<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pedidos</title>

   <!-- Font Awesome CDN link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="{{ asset('delivery.css') }}">
</head>
<body>
   

<section class="placed-orders">
   <h1 class="title">Pedidos</h1>

   <div class="box-container">
      @forelse($orders as $order)
      <div class="box">
         <p> Pedido realizado em: <span>{{ $order->placed_on }}</span> </p>
         <p> Nome: <span>{{ $order->name }}</span> </p>
         <p> Número: <span>{{ $order->number }}</span> </p>
         <p> Endereço: <span>{{ $order->address }}</span> </p>
         <p> Método de pagamento: <span>{{ $order->method }}</span> </p>
         <p> Seu pedido: <span>{{ $order->total_products }}</span> </p>
         <p> Preço total: <span>R$ {{ $order->total_price }},00</span> </p>
         <p> Marmita doada para ONG: <span>{{ $order->ong }}</span> </p>
         <p> Status de pagamento: 
            <span style="color: {{ $order->payment_status == 'Pendente' ? 'red' : 'green' }}">
                {{ $order->payment_status }}
            </span> 
         </p>
      </div>
      @empty
      <p class="empty">Nenhum pedido realizado ainda!</p>
      @endforelse
   </div>
</section>


<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
