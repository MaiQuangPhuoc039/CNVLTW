<?php 
  $severname = "localhost";
  $username = "root";
  $password = "";
  $database = "my_guitar_shop1";

  try {
    $conn = mysqli_connect($severname,$username,$password,$database);
  } catch (PDOException $e) {
    exit();
  }

  // $conn = mysqli_connect($severname,$username,$password,$database);
  if(!$conn){
    // echo " ket noi that bai";
  }else{
    // echo "ket noi thanh cong";
  }
