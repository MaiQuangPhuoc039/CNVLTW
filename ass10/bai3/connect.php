<?php
$connect= mysqli_connect("localhost","root","");
mysqli_select_db($connect, "login");
mysqli_query($connect, "SET names 'utf8'");
if(!$connect){
echo "Không thể kết nối đến Database!";
}else{
    echo 'ket noi thanh cong '; 
}
