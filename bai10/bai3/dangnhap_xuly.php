<?php   
session_start();
if(isset($_POST['login'])){
    include('connect.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query  = 'select * from users where Username ="'.$username.'" and Password = "'.$password.'" ';
    echo $query;
    $result = mysqli_query($connect ,$query);
    $row = mysqli_fetch_assoc($result);
    $le = mysqli_num_rows($result);

    if($le > 0){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        if(isset($_POST['remember']) and ($_POST['remember'] == 'on')){
            setcookie("username",$username, time()+60);
            setcookie("password",$password, time()+60);
        }
        echo "<script>alert('login successfull');location.href='trangquantriadmin.php';</script>";
        echo "Chao ban ".$row['username']."<br>Pass cua ban la :".$row['password'];
    }else{
        echo "<script>alert('login false');location.href='index.php';</script>";
    }
}
if(isset($_POST['cancel'])){
    echo "<script>location.href='index.php';</script>";
    }
