<?php

$hostname = 'localhost';
$username = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=integridade", $username, $password);
} catch (Exception $e) {
    echo 'Exceção capturada: ', $e->getMessage(), "\n";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && json_decode(file_get_contents('php://input'), true)) {
    $requestData = json_decode(file_get_contents('php://input'), true);
    if (isset($requestData['method']) && $requestData['method'] === 'get_product') {
        $ids = implode(',', array_map('intval', $requestData['ids']));
        $sql = "SELECT * FROM produtos WHERE idProdutos IN ($ids) ORDER BY idProdutos DESC";
        
        $produtos = $dbh->query($sql)->fetchAll();
        echo json_encode($produtos);
        return;
    } else {
        echo json_encode(["error" => "Método inválido"]);
    }
}

$produtos = $dbh->query("SELECT * FROM produtos ORDER BY idProdutos DESC")->fetchAll();
echo json_encode($produtos);

?>