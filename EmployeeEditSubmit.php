<?php
    include 'codeBlocks.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $employeeNumber= $_REQUEST['employeeNumber'];
        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $rolename = $_REQUEST['rolename'];
        $workinghours = $_REQUEST['workinghours'];
        $phone = $_REQUEST['phone'];
        $Email_address = $_REQUEST['email'];
        $salary = $_REQUEST['salary'];
        $city = $_REQUEST['city'];
        $state =$_REQUEST['state'];
        $country = $_REQUEST['country'];
        $zipcode = $_REQUEST['zipcode'];
        $serviceid = $_REQUEST['serviceID'];
        $restaurantid = $_REQUEST['restaurantID'];
        
        
        $conn->query("UPDATE `employee` SET 
                   `FName`='$fname',
                   `LName`='$lname',
                   `RoleName`='$rolename', 
                   `WorkingHours`='$workinghours',
                   `Phone`='$phone',
                   `Email`='$Email_address', 
                    `Salary`='$salary',
                    `City`='$city',
                    `State` ='$state',
                    `Country` = '$country',
                    `ZipCode` = '$zipcode',
                   `ServiceID` = '$serviceid',
                   `RestaurantID` = '$restaurantid'
                   WHERE EID='$employeeNumber'");
        refreshEmployees();
        $response = array('success' => true, 'employee' => $employees);
        // Return success response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>