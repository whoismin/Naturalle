<?php
include 'config.php';

$errors = [];
$name = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificação do campo nome
    if (empty($_POST['name'])) {
        $errors['name'] = 'O campo Nome é obrigatório.';
    } else {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }

    // Verificação do campo email
    if (empty($_POST['email'])) {
        $errors['email'] = 'O campo Email é obrigatório.';
    } else {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        // Verifica se o e-mail contém o caractere @ e se é um e-mail válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strpos($email, '@') === false) {
            $errors['email'] = 'O campo Email deve ser um e-mail válido e conter o caractere @.';
        }
    }

    // Verificação dos campos senha
    if (empty($_POST['pass'])) {
        $errors['pass'] = 'O campo Senha é obrigatório.';
    } elseif (strlen($_POST['pass']) < 8) {
        $errors['pass'] = 'A senha deve ter pelo menos 8 caracteres!';
    } elseif (empty($_POST['cpass'])) {
        $errors['cpass'] = 'O campo Confirmar Senha é obrigatório.';
    } elseif ($_POST['pass'] !== $_POST['cpass']) {
        $errors['cpass'] = 'Senha de confirmação não corresponde!';
    } else {
        $pass = $_POST['pass'];
    }

    // Verificação da imagem
    if (empty($_FILES['image']['name'])) {
        $errors['image'] = 'O campo Foto é obrigatório.';
    } else {
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_img/' . basename($image);

        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $image_type = $_FILES['image']['type'];

        if ($image_size > 2000000) {
            $errors['image'] = 'Tamanho da imagem muito grande!';
        } elseif (!in_array($image_type, $allowed_types)) {
            $errors['image'] = 'Tipo de imagem não suportado!';
        }
    }

    // Se não houver erros, prossiga com o registro
    if (empty($errors)) {
        // Verifica se o email já está cadastrado
        $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $select->execute([$email]);

        if ($select->rowCount() > 0) {
            $errors['email'] = 'Email já cadastrado!';
        } else {
            $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

            $insert = $conn->prepare("INSERT INTO `users` (name, email, password, image) VALUES (?, ?, ?, ?)");
            $insert->execute([$name, $email, $hashed_pass, $image]);

            if ($insert) {
                if (move_uploaded_file($image_tmp_name, $image_folder)) {
                    header('Location: login.php');
                    exit(); // Certifique-se de sair após redirecionar
                } else {
                    $errors['image'] = 'Falha ao mover a imagem para a pasta de destino.';
                }
            } else {
                $errors['general'] = 'Falha ao cadastrar o usuário. Tente novamente mais tarde.';
            }
        }
    }
}
?>




<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <?php include('header.php'); ?>

  <main>
  <article>
    <section class="section testi text-center has-bg-image" style="background-image: url('./assets/images/Salada3.png')" aria-label="testimonials">
      <div class="container">
        <div class="quote"></div>
        <p class="headline-2 testi-text"></p>
        <div class="wrapper">
          <div class="separator"></div>
          <div class="separator"></div>
          <div class="separator"></div>
        </div>
      </div>
    </section>

    <div class="container">
      <br>
      <h2 class="headline-1 text-center">Cadastre-se</h2>
      <form id="ongForm" action="" method="POST" enctype="multipart/form-data" class="form-left" novalidate>
        <div class="input-wrapper">
          <label for="name" class="form-label">Nome</label>
          <input type="text" id="name" name="name" placeholder="Nome Completo" autocomplete="off" class="input-field <?php echo isset($errors['name']) ? 'input-error' : ''; ?>" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
          <?php if (isset($errors['name'])): ?>
            <div class="error-message"><?php echo $errors['name']; ?></div>
          <?php endif; ?>

          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" placeholder="nome@email.com" autocomplete="off" class="input-field <?php echo isset($errors['email']) ? 'input-error' : ''; ?>" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
          <?php if (isset($errors['email'])): ?>
            <div class="error-message"><?php echo $errors['email']; ?></div>
          <?php endif; ?>

          <label for="pass" class="form-label">Senha</label>
          <input type="password" id="pass" name="pass" placeholder="No mínimo 8 caracteres" autocomplete="off" class="input-field <?php echo isset($errors['pass']) ? 'input-error' : ''; ?>" required>
          <?php if (isset($errors['pass'])): ?>
            <div class="error-message"><?php echo $errors['pass']; ?></div>
          <?php endif; ?>

          <label for="cpass" class="form-label">Confirmar Senha</label>
          <input type="password" id="cpass" name="cpass" placeholder="" autocomplete="off" class="input-field <?php echo isset($errors['cpass']) ? 'input-error' : ''; ?>" required>
          <?php if (isset($errors['cpass'])): ?>
            <div class="error-message"><?php echo $errors['cpass']; ?></div>
          <?php endif; ?>

          <div class="input-wrapper">
            <label for="image" class="form-label">Foto</label>
            <input type="file" id="image" name="image" class="input-field <?php echo isset($errors['image']) ? 'input-error' : ''; ?>" accept="image/*">
            <?php if (isset($errors['image'])): ?>
              <div class="error-message"><?php echo $errors['image']; ?></div>
            <?php endif; ?>
          </div>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-secondary">
          <span class="text text-1">Cadastre-se</span>
          <span class="text text-2" aria-hidden="true">Cadastre-se</span>
        </button>
      </form>
    </div>
  </article>
    <!-- Include footer -->
    <?php include('footer.php'); ?>
  </main>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="./assets/js/scripts.js"></script>
  <script src="./assets/js/validadorong.js"></script>
  <script src="./assets/js/funcoesAPIcadastro.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>