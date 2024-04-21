<?php
    session_start();
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel_managment";
    $error = "";
    $isLoggedIn = false;
    $isLoggedInAsEmployee = false;
    $isLoggedInAsCustomer = false;
    try{
        $conn = new mysqli($hostname, $username, $password, $dbname);
    }catch (Exception $e) {
        $error = "Database Connection Failed";
    }
?>
