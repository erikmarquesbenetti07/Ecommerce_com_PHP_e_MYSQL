<?php

session_start();
include("../config/config.php");
// Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] == false) {
    header("Location: ../index.php");
    exit;
}

// Conexão com o banco de dados (substitua com suas próprias configurações)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "integridade";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém o ID do usuário logado
$idUsuario = $_SESSION['idUsuario']; // Supondo que você tenha um campo ID na sua tabela de usuários

// Consulta para obter o menu do usuário a partir do banco de dados
$sql = "SELECT menu FROM usuarios WHERE idusuario = $idUsuario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $menu = $row['menu'];

    if (file_exists("../html/menu.html")) {
        $menuContent = file_get_contents("../html/menu.html");
        echo $menuContent;
    } else {
        echo "Não foi possível encontrar o menu.";
    }
} else {
    echo "Não foi possível obter informações do usuário.";
}

// Fecha a conexão
$conn->close();
?>
