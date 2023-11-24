<?php
  session_start();

  // Verifica se o usuário está logado
  if (!isset($_SESSION['logado']) || $_SESSION['logado'] == false) {
     header("Location: ../index.php");
  }

  if ( $_SESSION['logado'] == false){
     header("Location: ../index.php");
  }

  $menu = "Não foi possível achar o menu.";
  if(file_exists("../html/menu.html")){
     $menu = file_get_contents("../html/menu.html");
  }
  echo $menu;
?>
