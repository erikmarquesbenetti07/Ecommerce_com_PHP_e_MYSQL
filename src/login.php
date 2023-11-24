<?php
include("../config/config.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recupera os dados do formulário
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];
    
    // Conexão com o banco de dados (substitua com suas próprias configurações)
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
    
    // Verifica se o CPF já está cadastrado
    $checkCpfQuery = "SELECT * FROM usuarios WHERE cpfusuario = '$cpf'";
    $checkCpfResult = $conn->query($checkCpfQuery);
    
    if ($checkCpfResult->num_rows > 0) {
        echo "CPF já cadastrado. Por favor, escolha outro.";
        exit;
    }
    
    // Insere o novo usuário no banco de dados
    $insertQuery = "INSERT INTO usuarios (cpfusuario, senhausuario) VALUES ('$cpf', '$senha')";
    
    if ($conn->query($insertQuery) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }
    
    // Fecha a conexão
    $conn->close();
} else {
    // Redireciona para a página de cadastro se o formulário não foi enviado corretamente
    header("Location: cadUsuario.html");
    exit;
}
?>
