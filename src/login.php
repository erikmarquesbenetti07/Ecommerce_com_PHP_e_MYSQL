<?php
// tem que ser o primeiro comando do
// programa - prepara o ambiente sessão
session_start();

include("../config/config.php");

$cpf = $_REQUEST['cpf'];
$senha = $_REQUEST['senha'];

// abaixo junta senha com meu conteúdo forte
$senha = md5($senha);
// echo $senha;

$tudoOk = validar($cpf, $senha, $arquivo);

if ($tudoOk == true) {
  $_SESSION['logado'] = true;
  $_SESSION['cpf'] = $cpf;
  header("Location: menu.php");
} else {
  header("Location: http://localhost/Projeto-Banco-de-Dados/html/login_page.php");
}

function validar($cpf, $senha, $arquivo)
{
  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  try {
    $dbh = new PDO("mysql:host=$hostname;dbname=integridade", $username, $password);
  } catch (Exception $e) {
    echo 'Exceção capturada: ', $e->getMessage(), "\n";
  }
  ;

  $sql = "SELECT * FROM usuarios WHERE cpfusuario = ?";
  $stmt = $dbh->prepare($sql);
  $stmt->execute([$cpf]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && $user['senhausuario'] == md5($senha)) {
    if($user['emailusuario'] == "admin@gmail.com"){
      $_SESSION['is_admin'] = true;
      return true;
    }
    $_SESSION['is_admin'] = false;
    return true;
  } else {
    return false;
  }
}

//$pessoa["cpf"]
//$pessoa["senha"] 
?>