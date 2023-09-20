<?php 
    
     require_once 'database.php';

     $productCode = $_GET['delete'];
     $xoa = "DELETE FROM products WHERE productCode = '$productCode'";
     mysqli_query($conn,$xoa);
     header("location: index.php");
?>