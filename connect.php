<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel_managment";
    $error = "";
    try{
        $conn = new mysqli($hostname, $username, $password, $dbname);
    }catch (Exception $e) {
        $error = "Database Connection Failed";
    }
?>
