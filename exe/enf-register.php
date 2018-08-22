<?php
ob_start();
session_start();
require_once('../config.php');
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $repass = md5($_POST['repass']);
    $email = $_POST['email'];
    if($_POST['password'] != $_POST['repass']){
        $_SESSION['flash'] = "<div class='ribbon-red'>Vui lòng nhập mật khẩu giống nhau !</div>";
        header('Location:../index.php?page=register');
    }
    else{
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $rows = $conn->query($sql);
        if($rows->num_rows >0){
            $_SESSION['flash'] = "<div class='ribbon-red'>Tên đăng nhập này đã được sử dụng !</div>";
            header('Location:../index.php?page=register');
            return;
        }
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $rows = $conn->query($sql);
        if($rows->num_rows >0){
            $_SESSION['flash'] = "<div class='ribbon-red'>Email này đã được sử dụng !</div>";
            header('Location:../index.php?page=register');
            return;
        }       
    }
    $insert_user = "INSERT INTO `user`(`username`, `password`, `email`) VALUES ('$username','$password','$email')";
    $conn->query($insert_user);
    $_SESSION['flash'] = "<div class='ribbon-blue'>Đăng ký thành công !</div>";
    header('Location:../index.php');
}

?>