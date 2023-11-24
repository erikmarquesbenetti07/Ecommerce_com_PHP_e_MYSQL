

<?php

$hostname='localhost';
$username='root';
$password='';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=integridade",$username,$password);
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}

 $produtos = $dbh->query("SELECT * FROM produtos ORDER BY idProdutos DESC")->fetchAll();
 echo json_encode($produtos);

?>