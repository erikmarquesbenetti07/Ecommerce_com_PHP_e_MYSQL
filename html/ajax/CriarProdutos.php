<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "integridade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NomeProduto = $_POST['NomeProduto'];
    $precoproduto = $_POST['precoproduto'];
    $saldoproduto = $_POST['saldoproduto'];
    $url_image = $_POST['url_image'];

    // Verificar se o produto já existe usando prepared statements
    $checkIfExistsQuery = $conn->prepare("SELECT * FROM produtos WHERE NomeProduto = ?");
    $checkIfExistsQuery->bind_param("s", $NomeProduto);
    $checkIfExistsQuery->execute();
    $result = $checkIfExistsQuery->get_result();

    if ($result->num_rows > 0) {
        // Produto já existe, então atualize o preço e a URL usando prepared statements
        $updateQuery = $conn->prepare("UPDATE produtos SET precoproduto = ?, url_image = ? WHERE NomeProduto = ?");
        $updateQuery->bind_param("dss", $precoproduto, $url_image, $NomeProduto);

        if ($updateQuery->execute()) {
            $successMessage = "Produto atualizado com sucesso!";
        } else {
            $errorMessage = "Erro ao atualizar produto: " . $conn->error;
        }
    } else {
        // Produto não existe, então faça a inserção usando prepared statements
        $insertQuery = $conn->prepare("INSERT INTO produtos (NomeProduto, precoproduto, saldoproduto, url_image) VALUES (?, ?, ?, ?)");
        $insertQuery->bind_param("sdds", $NomeProduto, $precoproduto, $saldoproduto, $url_image);

        if ($insertQuery->execute()) {
            $successMessage = "Produto inserido com sucesso!";
        } else {
            $errorMessage = "Erro ao inserir produto: " . $conn->error;
        }
    }
}

$conn->close();

// Redirecione para a página index.php com as mensagens
header("Location: ../index.php?successMessage=$successMessage&errorMessage=$errorMessage");
exit();
?>
