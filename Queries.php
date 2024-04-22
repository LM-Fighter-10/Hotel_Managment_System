<?php
    $SelectingAllHotelObjects = "SELECT * FROM Hotel";
    $SelectingRoomStatus ="SELECT * FROM `rooms`";
    $SelectingAllEmployeeFullName = "SELECT * FROM Employee";
    $GetEmployeeLoggedIn = "";
    $GetCustomerLoggedIn = "";
    $AddCustomer = "";
    $AddEmployee = "";
    function AddCustomer($cid, $fname, $lname, $gender, $email, $phone, $cphone, $country, $city, $state, $zip){
        $AddCustomer = "INSERT INTO `customer`(`CustomerID`, `FirstName`, `LastName`, `Gender`, `Email`, `PhoneNumber`, 
                       `ContactNumber`, `Country`, `City`, `State`, `Zip_Code`) VALUES 
                       ('$cid','$fname','$lname','$gender','$email','$phone','$cphone','$country','$city','$state','$zip')";
        $conn->query($AddCustomer);
    }
    function AddEmployee($eid, $fname, $lname, $role, $wh, $phone, $email, $salary, $city, $state, $zip, $country, $gender, $sid, $rid){
        $AddEmployee = "INSERT INTO `employee` (`EID`, `FName`, `LName`, `RoleName`, `WorkingHours`, `Phone`, `Email`, `Salary`, 
                        `City`, `State`, `ZipCode`, `Country`, `Gender`, `ServiceID`, `RestaurantID`) VALUES 
                       ('$eid','$fname','$lname','$role','$wh','$phone','$email','$salary','$city','$state','$zip','$country','$gender','$sid','$rid')";
        $conn->query($AddEmployee);
    }
    if (isset($_SESSION['username'])){
        $isLoggedIn = true;
        $GetEmployeeLoggedIn = "SELECT * FROM `employee` WHERE EID = '".$_SESSION['username']."'";
        $GetCustomerLoggedIn = "SELECT * FROM `customer` WHERE CustomerID = '".$_SESSION['username']."'";
        if ($conn->query($GetEmployeeLoggedIn)->num_rows
            > 0){
            $isLoggedInAsEmployee = true; $isLoggedInAsCustomer=false;
        }else {
            $isLoggedInAsEmployee = false; $isLoggedInAsCustomer = true;
        }
    }
?>
