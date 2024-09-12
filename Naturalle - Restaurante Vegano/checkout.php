<?php
@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location: login.php');
    exit(); // Stop further execution if the user is not logged in
}

// ...

if (isset($_POST['order'])) {
    // Capturing form data
    $name = $_POST['nome'];
    $number = $_POST['telefone'];
    $method = $_POST['method'];
    $ong = $_POST['ong'];
    $address = $_POST['rua'] . ', ' . $_POST['bairro'] . ', ' . $_POST['cidade'] . ', ' . $_POST['estado'] . ', ' . $_POST['cep'];
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $placed_on = date('d-M-Y');
    $cart_total = 0;
    $cart_products = array();

    // Capturing cart items
    $cart_query = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
    $cart_query->execute([$user_id]);
    
    if ($cart_query->rowCount() > 0) {
        while ($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)) {
            $cart_products[] = $cart_item['name'] . ' ( ' . $cart_item['quantity'] . ' )';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    // Creating a string with the products
    $total_products = implode(', ', $cart_products);

    // Checking if the order has already been made
   // ...

// Query to check if the order has already been made
$order_query = $conn->prepare("SELECT * FROM `orders` WHERE name = ? AND number = ? AND method = ? AND address = ? AND total_products = ? AND total_price = ?");
$order_query->execute([$name, $number, $method, $address, $total_products, $cart_total]);

// ...


    if ($cart_total == 0) {
        $message[] = 'Seu carrinho está vazio';
    } elseif ($order_query->rowCount() > 0) {
        $message[] = 'Pedido já feito!';
    } else {
        // Add the points_used field to the form
        $pontos_usados = $_POST['pontos_usados'] ?? 0;

        // Deduct the used points from the total order amount
        $cart_total -= $pontos_usados;

        // Update the "users" table with the used points
        $update_points_used = $conn->prepare("UPDATE users SET pontos_usados = ? WHERE id = ?");
        $update_points_used->execute([$pontos_usados, $user_id]);

        // Inserting the order into the "orders" table
        $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES(?,?,?,?,?,?,?,?,?)");

        if ($insert_order === false) {
            // Handle the error
            echo "Error preparing the SQL statement";
        } else {
         $order_query = $conn->prepare("SELECT * FROM `orders` WHERE name = ? AND number = ? AND method = ? AND address = ? AND total_products = ? AND total_price = ?");
         $order_query->execute([$name, $number, $method, $address, $total_products, $cart_total]);
         
         // Check if the order has already been made
         if ($cart_total == 0) {
             $message[] = 'Seu carrinho está vazio';
         } elseif ($order_query->rowCount() > 0) {
             $message[] = 'Pedido já feito!';
         } else {
             // Adicione o campo de pontos usados no formulário
             $pontos_usados = $_POST['pontos_usados'] ?? 0;
         
             // Deduza os pontos usados do valor total do pedido
             $cart_total -= $pontos_usados;
         
             // Atualize a tabela "users" com os pontos usados
             $update_points_used = $conn->prepare("UPDATE users SET pontos_usados = ? WHERE id = ?");
             $update_points_used->execute([$pontos_usados, $user_id]);
         
             // Inserindo o pedido na tabela "orders"
             $insert_order = $conn->prepare("INSERT INTO `orders` (user_id, name, number, method, address, total_products, total_price, placed_on) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
             $insert_order->execute([$user_id, $name, $number, $method, $address, $total_products, $cart_total, $placed_on]);
         
             // ...
         }
            // Deleting items from the cart
            $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
            $delete_cart->execute([$user_id]);

            // Points system
            $bonus_percentage = 0.20; // 20% more in points
            $points_earned = ($cart_total + ($cart_total * $bonus_percentage));

            // Update user points
            $update_points = $conn->prepare("UPDATE users SET pontos = pontos + ? WHERE id = ?");
            $update_points->execute([$points_earned, $user_id]);

            $message[] = 'Pedido realizado com sucesso! Você ganhou ' . $points_earned . ' pontos.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/css/delivery.css">

</head>
<body>
   
<?php include 'delivery_header.php'; ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>


<section class="checkout-orders">
<br>
<h2 class="headline-1 text-center">Pagamento</h2>
<br>
<form action="" method="POST">
    <div class="input-wrapper">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" id="nome" name="nome" value="<?= $fetch_profile['name']; ?>" placeholder="Nome Completo" autocomplete="off" class="input-field" required>
    </div>

    <div class="input-wrapper">
        <label for="telefone" class="form-label">Celular</label>
        <input type="text" id="telefone" name="telefone" placeholder="(99)99999-9999" size="20" maxlength="14" onkeypress="mascara(this)" autocomplete="off" class="input-field" required>
    </div>

    <div class="input-wrapper">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" id="cep" name="cep" placeholder="CEP" autocomplete="off" class="input-field" required>
    </div>

    <div class="input-wrapper">
        <label for="rua" class="form-label">Rua</label>
        <input type="text" id="rua" name="rua" placeholder="Rua" autocomplete="off" class="input-field" required>
    </div>

    <div class="input-wrapper">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" id="bairro" name="bairro" placeholder="Bairro" autocomplete="off" class="input-field" required>
    </div>

    <div class="input-wrapper">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" id="cidade" name="cidade" placeholder="Cidade" autocomplete="off" class="input-field" required>
    </div>

    <div class="input-wrapper">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" id="estado" name="estado" placeholder="Estado" autocomplete="off" class="input-field" required>
    </div>

    <div class="input-wrapper">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" id="cpf" name="cpf" placeholder=" 000.000.000-00" autocomplete="off" class="input-field" required>
    </div>

    <div class="input-wrapper">
        <label for="method" class="form-label">Pagamento:</label>
        <select id="method" name="method" class="input-field" required>
            <option value="">Pagar na retirada</option>
            <option value="Cartão de crédito ou débito">Cartão de crédito ou débito</option>
            <option value="Pix">Pix</option>
        </select>
    </div>

    <div class="input-wrapper">
        <label for="pontos_usados" class="form-label">Meus Pontos</label>
        <input type="text" id="pontos_usados" name="pontos_usados" placeholder="Pontos a serem usados:" autocomplete="off" value="0" max="<?= $fetch_profile['name']; ?>" class="input-field" required>
    </div>

    <div class="input-wrapper">
        <label for="ong" class="form-label">Selecione a ONG que você gostaria de doar uma marmita:</label>
        <select id="ong" name="ong" class="input-field" required>
            <option value="Mundo Sem Fome">Mundo Sem Fome</option>
            <option value="Crianças Felizes">Crianças Felizes</option>
            <option value="Amor e Cura">Amor e Cura</option>
        </select>
    </div>
    <section class="display-orders">
   <?php
      $cart_grand_total = 0;
      $select_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart_items->execute([$user_id]);
      // Verifica se há itens no carrinho
      if($select_cart_items->rowCount() > 0){
         // Loop através dos itens do carrinho
         while($fetch_cart_items = $select_cart_items->fetch(PDO::FETCH_ASSOC)){
            $cart_total_price = ($fetch_cart_items['price'] * $fetch_cart_items['quantity']);
            $cart_grand_total += $cart_total_price;
   ?>
  <!-- Comentando ou removendo o bloco HTML que exibe os itens do carrinho -->
  <!--
  <p> <?= $fetch_cart_items['name']; ?> <span>(<?= 'R$'.$fetch_cart_items['price'].',00/'. $fetch_cart_items['quantity']; ?>)</span> </p>
  -->
   <?php
      }
   } else {
      // Exibe a mensagem se o carrinho estiver vazio
      echo '<p class="Vazio">Seu carrinho está vazio</p>';
   }
   ?> 
<div class="headline-1 text-center fonte-tamanho">
    Total geral :<span class="headline-1">R$<?= $cart_grand_total; ?>,00</span>
</div>
</section>
    <input type="submit" name="order" class="btn <?= ($cart_grand_total > 1)?'':'disabled'; ?>" value="Faça seu pedido">
</form>

</section>

<style>
    .display-orders {
    margin: 20px 0; /* Adiciona margem em cima e embaixo da seção */
    padding: 20px;
    border-radius: 5px; /* Adiciona bordas arredondadas */
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Adiciona uma sombra leve */
}

.grand-total {
    font-size: 1.2em;
    font-weight: bold;
    margin-top: 10px;
    
}

.Vazio {
    color: #f00; /* Altere a cor conforme necessário */
    font-weight: bold;
}

</style>






<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<!-- 
    - FOOTER COM IMAGENS
  -->
        <div class="form-right text-center" style="background-image: url('./assets/images/form-pattern.png')">

        <h2 class="headline-1 text-center">Contate-nos </h2>

<p class="contact-label">Telefone:</p>

<a href="tel:+88123123456" class="body-1 contact-number hover-underline">(11)981765432</a>

<div class="separator"></div>

<p class="contact-label">Localização:</p>

<address class="body-4">
  Restaurant Naturalle, São Paulo, <br>
   123, SP
</address>

<p class="contact-label">Almoço:</p>

<p class="body-4">
  Terça à Domingo<br>
  11:00h - 16:30h
</p>

<p class="contact-label">Jantar:</p>

<p class="body-4">
Terça à Domingo <br>
  17:00h - 23:30h
</p>

</div>

</div>

</div>
</section>

<script src="./assets/js/scripts.js"></script>


<!-- 
- #FOOTER
-->

<?php
include ('footer.php');
      ?>


<!-- 
- VOLTAR PARA O ÍNICIO
-->

<a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
<ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
</a>





<!-- 
- LINKS JS
-->
<script src="./assets/js/script.js"></script>
<script src="./assets/js/validadorong.js"></script>
<script src="./assets/js/funcoesAPIcadastro.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>





<!-- 
- LINKS
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
