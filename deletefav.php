<?php
    $id=$_GET["id"];
    $server = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "rent_cafe";
    $conn = mysqli_connect($server, $username, $pass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        
    }
    $dlquery="DELETE from saved_later where fpid=$id";
    // die(var_dump($upquery));
    $dquery=mysqli_query($conn,$dlquery);
    header("Location: myfav.php");
?>