<?php
include("../config/config.php");
$login = file_get_contents("login.html");

$login = str_replace(
    "meutoken",
    $meutoken,
    $login
);
if (isset($_REQUEST["mensagem"])) {
    $login = str_replace(
        "<!--mensagem-->",
        $_REQUEST["mensagem"],
        $login
    );

}

echo $login;

?>