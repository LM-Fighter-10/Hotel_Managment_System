<?php
    $SelectingAllHotelObjects = "SELECT * FROM Hotel";
    $SelectingRoomStatus ="SELECT * FROM `rooms` as r JOIN `hotel` as h ON r.BranchID=h.BranchID";
    $NumberOfRoom ="SELECT COUNT(*) as count FROM `rooms`";
    $SelectingAllEmployeeFullName = "SELECT * FROM Employee";
    $SelectingAllServices = "SELECT * FROM Services";
    $GetEmployeeLoggedIn = "";
    $GetCustomerLoggedIn = "";
    $AddCustomer = "";
    $AddEmployee = "";
    function AddCustomer($cid, $fname, $lname, $gender, $email, $phone, $cphone, $country, $city, $state, $zip, $conn){
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
    $SQLFunction_CheckCustID = "DELIMITER //
                                CREATE FUNCTION IsCustomerIdTaken(
                                    p_CustomerID CHAR(14)
                                )
                                RETURNS BIT
                                BEGIN
                                    DECLARE countExist INT;
                                
                                    SELECT COUNT(*) INTO countExist FROM Customer WHERE CustomerID = p_CustomerID;
                                
                                    IF countExist > 0 THEN
                                        RETURN 0;
                                    ELSE
                                        RETURN 1;
                                    END IF;
                                END //
                                
                                DELIMITER ;";

    $SQLFunction_isRestaurantExist = "DELIMITER //
                                      CREATE FUNCTION isRestaurantExist(
                                          p_RestaurantID CHAR(8)
                                      )
                                      RETURNS BIT
                                      BEGIN
                                          DECLARE countExist INT;
                                      
                                          SELECT COUNT(*) INTO countExist FROM Restaurant WHERE RID = p_RestaurantID;
                                      
                                          IF countExist > 0 THEN
                                              RETURN 1;
                                          ELSE
                                              RETURN 0;
                                          END IF;
                                      END //
                                      DELIMITER ;";

    $SQLFunction_isServiceExist = "DELIMITER //
                                   CREATE FUNCTION isServiceExist(
                                       p_ServiceID CHAR(8)
                                   )
                                   RETURNS BIT
                                   BEGIN
                                       DECLARE countExist INT;
                                   
                                       SELECT COUNT(*) INTO countExist FROM services WHERE SID = p_ServiceID;
                                   
                                       IF countExist > 0 THEN
                                           RETURN 1;
                                       ELSE
                                           RETURN 0;
                                       END IF;
                                   END //
                                   DELIMITER ;";
    $SQLViewForHotelStatusCount = "CREATE VIEW HotelStatusCounts AS
                                   SELECT
                                       (SELECT COUNT(*) FROM employee) AS EmployeesCount,
                                       (SELECT COUNT(*) FROM customer) AS CustomersCount,
                                       (SELECT COUNT(*) FROM rooms) AS RoomsCount;";
    function getNewCustID ($conn){
        $newCustID = mt_rand(1000000000, 9999999999);
        $result = $conn->query("SELECT IsCustomerIdTaken('$newCustID') AS isTaken;")->fetch_assoc();
        while ($result['isTaken'] == 1){
            $newCustID = mt_rand(1000000000, 9999999999);
            $result = $conn->query("SELECT IsCustomerIdTaken('$newCustID') AS isTaken;")->fetch_assoc();
        }
        return "CUST".$newCustID;
    }
    function isServiceExist ($conn, $sid){
        $result = $conn->query("SELECT isServiceExist('$sid') AS isExist;")->fetch_assoc();
        if ($result['isExist'] == 1){
            return true;
        }
        return false;
    }
    function isRestaurantExist ($conn, $rid){
        $result = $conn->query("SELECT isRestaurantExist('$rid') AS isExist;")->fetch_assoc();
        if ($result['isExist'] == 1){
            return true;
        }
        return false;
    }

?>
