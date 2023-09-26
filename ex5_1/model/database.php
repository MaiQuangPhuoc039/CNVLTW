<?php
  $pro = 'mysql:host=localhost;dbname=my_guitar_shop1';
  $username = 'root';
  $password='';
  
  try {
    $db = new PDO($pro,$username,$password);
  } catch (PDOException $e) {
    $error_mesaage = $e-> getMessage();
    include('../errors/database_error.php');
    exit();
  }

?>