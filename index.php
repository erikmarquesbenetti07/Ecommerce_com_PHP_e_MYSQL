<?php
session_start();

// Caminho correto para incluir config.php
include("./config/config.php");

// Verifica se o usuário está logado
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    // Redireciona para a página de menu
    header("Location: menu.php");
    exit;
}

// O usuário não está logado, continue exibindo a página de login
$login = file_get_contents("html/login.html");

if (isset($_REQUEST["mensagem"])) {
    // Substitui <!--mensagem--> pela mensagem fornecida
    $login = str_replace("<!--mensagem-->", $_REQUEST["mensagem"], $login); 
}

echo $login;
?>
