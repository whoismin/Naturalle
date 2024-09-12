<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_profile'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE id = ?");
   $update_profile->execute([$name, $email, $admin_id]);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;
   $old_image = $_POST['old_image'];

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'Tamanho da imagem muito grande!';
      }else{
         $update_image = $conn->prepare("UPDATE `users` SET image = ? WHERE id = ?");
         $update_image->execute([$image, $admin_id]);
         if($update_image){
            move_uploaded_file($image_tmp_name, $image_folder);
            unlink('uploaded_img/'.$old_image);
            $message[] = 'Imagem atualizada com sucesso!';
         };
      };
   };

   $old_pass = $_POST['old_pass'];
   $update_pass = md5($_POST['update_pass']);
   $update_pass = filter_var($update_pass, FILTER_SANITIZE_STRING);
   $new_pass = md5($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = md5($_POST['confirm_pass']);
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

   if(!empty($update_pass) AND !empty($new_pass) AND !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'Senha antiga não correspondida!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'Confirmação de senha não correspondida!';
      }else{
         $update_pass_query = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
         $update_pass_query->execute([$confirm_pass, $admin_id]);
         $message[] = 'Senha atualizada com sucesso!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Atualizar Perfil do Administrador</title>

   <!-- Link para o arquivo CSS do Font Awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Link para o arquivo CSS personalizado  -->
   <link rel="stylesheet" href="assets/css/components.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="update-profile">

   <h1 class="title">Atualizar Perfil</h1>

   <form action="" method="POST" enctype="multipart/form-data">
      <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
      <div class="flex">
         <div class="inputBox">
            <span>Nome de usuário:</span>
            <input type="text" name="name" value="<?= $fetch_profile['name']; ?>" placeholder="Atualizar nome de usuário" required class="box">
            <span>E-mail:</span>
            <input type="email" name="email" value="<?= $fetch_profile['email']; ?>" placeholder="Atualizar e-mail" required class="box">
            <span>Atualizar foto de perfil:</span>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
            <input type="hidden" name="old_image" value="<?= $fetch_profile['image']; ?>">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?= $fetch_profile['password']; ?>">
            <span>Senha antiga:</span>
            <input type="password" name="update_pass" placeholder="Insira a senha anterior" class="box">
            <span>Nova senha:</span>
            <input type="password" name="new_pass" placeholder="Insira a nova senha" class="box">
            <span>Confirmar senha:</span>
            <input type="password" name="confirm_pass" placeholder="Confirme a nova senha" class= "box">
         </div>
      </div>
      <div class="flex-btn">
         <input type="submit" class="btn" value="Atualizar Perfil" name="update_profile">
         <a href="admin_page.php" class="option-btn">Voltar</a>
      </div>
   </form>

</section>













<script src="js/script.js"></script>

</body>
</html>
