<?php
    $SelectingAllHotelObjects = "SELECT * FROM Hotel";
    $SelectingRoomStatus ="SELECT * FROM `rooms`";
    $SelectingAllEmployeeFullName = "SELECT * FROM Employee";
    if (isset($_SESSION['username'])){
        $isLoggedIn = true;
        if ($conn->query("SELECT * FROM `employee` WHERE EID = '".$_SESSION['username']."'")->num_rows
            > 0){
            $isLoggedInAsEmployee = true; $isLoggedInAsCustomer=false;
        }else {
            $isLoggedInAsEmployee = false; $isLoggedInAsCustomer = true;
        }
    }
?>
