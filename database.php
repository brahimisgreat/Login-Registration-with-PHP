<?php 
$hostName = "localhost";
$userName = "root";
$dbPassword = "";
$databaseName = "login_register";
 $conn =   mysqli_connect($hostName, $userName, $dbPassword, $databaseName);

    if(!$conn){
        die("somthing went wrong");
    }
?>