<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "dbtier";

    $conn = new mysqli($server, $user, $password, $db_name);

    if($conn->connect_error){
        die("Gagal konek ke database : ".$conn->connect_error);
    }
?>