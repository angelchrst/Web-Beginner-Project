<?php

include "config.php";

if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$uname' ");

    if(mysqli_num_rows($result) > 0){
        foreach($result as $q){
            if(!password_verify($pass, $q['password'])){
                header("location:login.php");
            }
            else {
                session_start();
                $_SESSION['username'] = $uname;
                $_SESSION['name'] = $q['name'];

                header("location:home.php");
            }
        }
    }
    else{
        header("location:login.php");
    }

}

?>