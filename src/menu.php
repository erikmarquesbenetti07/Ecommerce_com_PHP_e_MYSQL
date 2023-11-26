<?php
  session_start();

  if (!isset($_SESSION['logado'])){
   header("Location: http://localhost/Projeto-Banco-de-Dados/html/login_page.php");
  }

  if ( $_SESSION['logado'] == false){
     header("Location: http://localhost/Projeto-Banco-de-Dados/html/login_page.php");
  }

  $menu = "Não foi possivel achar o menu.";
  if(file_exists("../html/menu.html")){
     $menu = file_get_contents("../html/menu.html");
  }
  echo $menu;
?>