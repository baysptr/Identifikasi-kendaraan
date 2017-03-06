<?php
    session_start();
    
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    
    if($user == "admin" && $pass == md5("qazwsxedc")){
        $_SESSION['do_login'] = 1;
        
        echo "<script>window.location = '../index.php';</script>";
    }else{
        echo "<script>alert('User atau Password anda tidak diketahui');window.location = '../index.php';</script>";
    }

