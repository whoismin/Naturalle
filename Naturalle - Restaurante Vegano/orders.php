<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/css/delivery.css">

</head>
<body>
<?php include 'delivery_header.php'; ?>

<section class="placed-orders">

   <h1 class="title">Pedidos</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
      $select_orders->execute([$user_id]);
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <p> Pedido realizado em: <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> Nome : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> Numero : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> Endereço : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> Método de pagamento : <span><?= $fetch_orders['method']; ?></span> </p>
      <p> Seu pedido: <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> Preço total : <span>R$<?= $fetch_orders['total_price']; ?>,00</span> </p>
      <p> Marmita doada para ONG: <span><?= $fetch_orders['ong']; ?></span> </p>
      <p> Status de pagamento : <span style="color:<?php if($fetch_orders['payment_status'] == 'Pendente'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">Nenhum pedido realizado ainda!</p>';
   }
   ?>

   </div>

</section>









<?php include 'footer.php'; ?>

<script src="assets/js/script.js"></script>

</body>
</html>