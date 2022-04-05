<?php
session_start();

if (isset($_SESSION['login'])){
  //Falta verificar si esta variable es true/false
  if ($_SESSION['login'] == false){
    header("Location:index.php");
  }
}else{
  //Si no existe la variable, entonces chauuu
  header("Location:index.php");
}

?>