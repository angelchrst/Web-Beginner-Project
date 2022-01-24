<?php

include "config.php";

$id_post = $_GET['id_post'];

mysqli_query($conn, "DELETE FROM posts WHERE id_post = '$id_post' ");

header("location:home.php");


?>