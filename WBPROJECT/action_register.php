<?php
include "config.php";

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO akun(name,username,password) 
                values('$name','$uname','$pass') ");
    
    header("location:login.php");
}

?>