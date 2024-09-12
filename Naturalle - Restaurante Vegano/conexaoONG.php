<?php
// Função para validar e limpar dados
function validarDado($dado) {
    $dado = trim($dado);
    $dado = stripslashes($dado);
    $dado = htmlspecialchars($dado);
    return $dado;
}

$nome = validarDado($_POST['nomeONG']);
$email = validarDado($_POST['email']);
$telefone = validarDado($_POST['telefone']);
$cep = validarDado($_POST['cep']);
$rua = validarDado($_POST['rua']);
$bairro = validarDado($_POST['bairro']);
$cidade = validarDado($_POST['cidade']);
$estado = validarDado($_POST['estado']);
$cnpj = validarDado($_POST['cnpj']);
$tipo_ong = validarDado($_POST['tipo_ong']);
$observacoes = validarDado($_POST['observacoes']);

// Validações adicionais (exemplos)
if (empty($nome) || empty($email) || empty($telefone) || empty($cep) || empty($rua) || empty($bairro) || empty($cidade) || empty($estado) || empty($cnpj) || empty($tipo_ong) || empty($observacoes)) {
    echo "Por favor, preencha todos os campos obrigatórios.";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Por favor, insira um endereço de e-mail válido.";
    exit();
}

// Definindo banco de dados, localhost 

define('MYSQL_HOST', 'localhost:3306');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB_NAME', 'bd_naturalle');

try {
    // Conectar ao banco de dados
    $pdo = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);

    // Inserir dados na tabela CadastroONG
    $sql = "INSERT INTO CadastroONG (nome, email, telefone, cep, rua, bairro, cidade, estado, CNPJ, tipo_ong, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $telefone, $cep, $rua, $bairro, $cidade, $estado, $cnpj, $tipo_ong, $observacoes]);

    // Redirecionar ou exibir uma mensagem de sucesso
    if ($stmt) {
        header("Location: sucessocadastrarONG.php"); // Redirecionar para uma página de sucesso
        exit();
    } else {
        echo "Erro ao cadastrar a ONG.";
    }
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}
?>
