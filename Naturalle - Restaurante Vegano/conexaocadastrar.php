<?php
// Conectar ao banco de dados
include 'config.php'; // Certifique-se de que este arquivo contém a configuração de conexão com o banco de dados

if (isset($_POST['submit'])) {
    // Coletar e sanitizar dados do formulário
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    // Verificar se os campos obrigatórios não estão vazios
    if (empty($name) || empty($email) || empty($pass) || empty($cpass)) {
        $message[] = 'Todos os campos são obrigatórios!';
    } else {
        // Verificar se o email já está cadastrado
        $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
        $select->execute([$email]);

        if ($select->rowCount() > 0) {
            $message[] = 'Email já cadastrado!';
        } else {
            // Verificar se as senhas coincidem
            if ($pass !== $cpass) {
                $message[] = 'Senha de confirmação não corresponde!';
            } else {
                // Hash da senha
                $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

                // Processamento da imagem
                $image = $_FILES['image']['name'];
                $image_size = $_FILES['image']['size'];
                $image_tmp_name = $_FILES['image']['tmp_name'];
                $image_folder = 'uploaded_img/' . basename($image);

                // Verificar o tamanho e tipo da imagem
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                $image_type = $_FILES['image']['type'];

                if ($image_size > 2000000) {
                    $message[] = 'Tamanho da imagem muito grande!';
                } elseif (!in_array($image_type, $allowed_types)) {
                    $message[] = 'Tipo de imagem não suportado!';
                } else {
                    // Inserir dados no banco de dados
                    $insert = $conn->prepare("INSERT INTO `users` (name, email, password, image) VALUES (?, ?, ?, ?)");
                    if ($insert->execute([$name, $email, $hashed_pass, $image])) {
                        move_uploaded_file($image_tmp_name, $image_folder);
                        $message[] = 'Cadastrado com sucesso!';
                        header('Location: login.php');
                        exit(); // Certifique-se de sair após o redirecionamento
                    } else {
                        $message[] = 'Erro ao cadastrar. Tente novamente.';
                    }
                }
            }
        }
    }

    // Se houver mensagens de erro, exiba-as
    if (!empty($message)) {
        foreach ($message as $msg) {
            echo "<p>$msg</p>";
        }
    }
}
?>
