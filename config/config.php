<?php
$meutoken = "Abc123!";
$parteForte = "&%$!2KÇ";
$arquivo = "../db/db.json";

$hostname = 'localhost';
$username = 'root';
$password = '';

try {
  $dbh = new PDO("mysql:host=$hostname;dbname=integridade", $username, $password);
} catch (Exception $e) {
  echo 'Exceção capturada: ', $e->getMessage(), "\n";
}
?>