<?php
@include 'config.php';
session_start();

if (isset($_POST['submit'])) {
   $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
   $pass = $_POST['pass'];
   $errors = [];

   // Verificar se o email e a senha não estão vazios
   if (empty($email)) {
      $errors['email'] = 'O email é obrigatório!';
   }
   if (empty($pass)) {
      $errors['pass'] = 'A senha é obrigatória!';
   }

   if (empty($errors)) {
      // Preparar a consulta SQL
      $sql = "SELECT * FROM `users` WHERE email = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$email]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      // Verificar se o usuário foi encontrado e se a senha está correta
      if ($user && password_verify($pass, $user['password'])) {
         if ($user['user_type'] == 'admin') {
            $_SESSION['admin_id'] = $user['id'];
            header('Location: admin_page.php');
            exit();
         } elseif ($user['user_type'] == 'user') {
            $_SESSION['user_id'] = $user['id'];
            header('Location: home.php');
            exit();
         }
      } else {
         $errors['general'] = 'Email ou senha incorretos!';
      }
   }
}
?>



   <section class="section testi text-center has-bg-image" style="background-image: url('./assets/images/login1.svg')" aria-label="testimonials">
      <div class="container">
         <div class="quote">”</div>
         <p class="headline-2 testi-text"></p>
         <div class="wrapper">
            <div class="separator"></div>
            <div class="separator"></div>
            <div class="separator"></div>
         </div>
      </div>
   </section>

   <article>
      <br>
      <br>
      <img src="./img/shape-6.png" class="image img-1 show" alt="" />

      <?php include('header.php'); ?>

      <section class="container">
      <div class="form reservation-form bg-black-10">
         <div>
            <br>
            <h1 class="headline-1 text-center">Login</h1>
         </div>
         <br>
         <form action="" method="POST" class="form-left">
            <!-- General Error Message -->
            <?php if (isset($errors['general'])): ?>
               <div class="error-message">
                  <p><?php echo $errors['general']; ?></p>
               </div>
            <?php endif; ?>

            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="input-field <?php echo isset($errors['email']) ? 'input-error' : ''; ?>" placeholder="nome@email.com" autocomplete="off" required>
            <?php if (isset($errors['email'])): ?>
               <div class="error-message">
                  <p><?php echo $errors['email']; ?></p>
               </div>
            <?php endif; ?>

            <label for="pass" class="form-label">Senha</label>
            <input type="password" name="pass" id="pass" class="input-field <?php echo isset($errors['pass']) ? 'input-error' : ''; ?>" placeholder="No mínimo 8 caracteres" autocomplete="off" required>
            <?php if (isset($errors['pass'])): ?>
               <div class="error-message">
                  <p><?php echo $errors['pass']; ?></p>
               </div>
            <?php endif; ?>

            <div class="input-wrapper">
               <a href="esqueciminhasenha.php" class="body-1 esqueci-senha hover-underline">Esqueci minha senha</a>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-secondary">
               <span class="text text-1">Login</span>
               <span class="text text-2" aria-hidden="true">Login</span>
            </button>
         </form>
         <div class="form-right text-center">
            <h2 class="headline-1 text-center">Ainda não tem uma conta?</h2>
            <p class="contact-label">Crie uma agora.</p>
            <a href="cadastrar.php" class="body-1 contact-number hover-underline">Criar uma conta.</a>
            <div class="separator"></div>
         </div>
      </div>
   </section>

      <br>

      <?php include('footer.php'); ?>

      <!-- BACK TO TOP -->
      <a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
         <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
      </a>

      <!-- JS scripts -->
      <script src="./assets/js/script.js"></script>
      <script src="./assets/js/validadorong.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>