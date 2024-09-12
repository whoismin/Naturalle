<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'already added to wishlist!';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'Produto já adicionado no carrinho!';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'added to wishlist!';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'Produto já adicionado no carrinho!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'Produto adicionado no carrinho!';
   }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/css/delivery.css">

</head>
<body>
   
<?php include 'delivery_header.php'; ?>

<div class="home-bg">

   <section class="home">

      <div class="content">
         <br>
         <br>
         <strong><span>Naturalle</span></strong>
         <h3>Fazemos a comida, você faz a história. Desfrute do sabor no conforto da sua casa</h3>
         <p>Entregamos os sabores mais frescos e deliciosos diretamente na sua porta. Peça agora e experimente o melhor do nosso cardápio!</p>
         <a href="shop.php" class="btn">Peça Já</a>
      </div>

   </section>

</div>

<section class="home-category">

<br>


   <h1 class="title">Categorias</h1>

   <div class="box-container">

      <div class="box">
         <img src="assets/images/cat-1.png" alt="">
         <h3>Pratos</h3>
         <p>Desfrute de pratos saudáveis e saborosos preparados com ingredientes de alta qualidade.</p>
        
      </div>

      <div class="box">
         <img src="assets/images/cat-2.png" alt="">
         <h3>Sobremesas</h3>
         <p>Termine sua refeição com doçuras irresistíveis e tentadoras.</p>
         
      </div>

      <div class="box">
         <img src="assets/images/cat-3.png" alt="">
         <h3>Bebidas</h3>
         <p>Refresque-se com uma variedade de bebidas, de sucos naturais a coquetéis especiais.</p>
         
      </div>

      <div class="box">
         <img src="assets/images/cat-4.png" alt="">
         <h3>Sabor Solidário</h3>
         <p>Você tem o poder de decidir para qual comunidade direcionar uma marmita.</p>
         
      </div>

   </div>

</section>

<section class="products">

   <h1 class="title">Produtos</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price">R$<span><?= $fetch_products['price']; ?></span></div>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <input type="submit" value="Adicionar a lista de desejos" class="option-btn" name="add_to_wishlist">
      <input type="submit" value="Adicionar ao carrinho" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">Nenhum produto adicionado!</p>';
   }
   ?>

   </div>

</section>




<?php include 'footer.php'; ?>

<script src="assets/js/script.js"></script>

</body>
</html>