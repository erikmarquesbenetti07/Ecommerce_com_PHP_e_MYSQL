<?php
session_start();

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
    $date_time = new DateTime('2023-11-24');
    $date_time_to_sql = $date_time->format('Y-m-d');

    if (isset($requestData['method']) && $requestData['method'] === 'add_order') {
        $ids = implode(',', array_map('intval', $requestData['ids']));
        $sql = "INSERT INTO pedido VALUES (null, ? , ?, ?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$_SESSION['userID'], $date_time_to_sql, $requestData['total']]);

        $id_pedido = $dbh->lastInsertId();

        $idArray = array_map('intval', explode(',', $ids));

        foreach ($idArray as $id) {
            $sql = "INSERT INTO produtos_do_pedido VALUES (null, ? , ?, ?, ?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$id_pedido, $id, 1, null]);
        }
        return;
    }


    if (isset($requestData['method']) && $requestData['method'] === 'get_orders') {
        $id_user = $_SESSION['userID'];
        $sql = "SELECT * FROM pedido WHERE idUsuario = ($id_user)";
        
        $pedidos = $dbh->query($sql)->fetchAll();
        echo json_encode($pedidos);
        return;
    }

    if (isset($requestData['method']) && $requestData['method'] === 'get_order_product') {
        $id_user = $_SESSION['userID'];
        $sql = "SELECT * FROM pedido WHERE idUsuario = ($id_user)";
        
        $pedidos = $dbh->query($sql)->fetchAll();
        echo json_encode($pedidos);
        return;
    }
}

$produtos = $dbh->query("SELECT * FROM produtos ORDER BY idProdutos DESC")->fetchAll();
echo json_encode($produtos);

?>