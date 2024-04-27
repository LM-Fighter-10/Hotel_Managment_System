<?php
    include 'codeBlocks.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Initialize response array
        $response = array(
            'FirstName_error' => false,
            'LastName_error' => false,
            'RoleName_error' => false,
            'salary_error' => false,
            'workingh_error' => false,
            'phone_error' => false,
            'country_error' => false,
            "city_error" => false,
            'state_error' => false,
            'zipcode_error' => false,
            'email_error' => false,
            'serviceId_error' => false,
            'restaurantId_error' => false,
        );
        function isEmplyeeExists($employeeNumber, $conn)
        {
            if ($employeeNumber != "") {
                $sql = "SELECT * FROM employee WHERE  EID = '$employeeNumber'";
                $result = $conn->query($sql);
                return $result->num_rows > 0;
            } else {
                return false;
            }
        }

        if (isset($_POST['fname'])) {
            $fname = $_POST['fname'];
            if ($fname != "") {
                if (!preg_match("/^[a-zA-Z\s]+$/", $fname)) {
                    $response['FirstName_error'] = true;
                    $response['fname_errMsg'] = "First Name must contain only letters";
                } else {
                    $response['FirstName_error'] = false;
                }
            } else {
                // Handle empty first name
                $response['FirstName_error'] = true;
                $response['fname_errMsg'] = "First Name cannot be empty";
            }
        }

        if (isset($_POST['rolename'])) {
            $rolename = $_POST['rolename'];
            if ($rolename != "") {
                if (!preg_match("/^[a-zA-Z\s]+$/", $rolename)) {
                    $response['RoleName_error'] = true;
                    $response['Rname_errMsg'] = "Role Name must contain only letters";
                } else {
                    $response['RoleName_error'] = false;
                }
            } else {
                // Handle empty first name
                $response['RoleName_error'] = true;
                $response['Rname_errMsg'] = "Role Name cannot be empty";
            }
        }

        if (isset($_POST['lname'])) {
            $lname = $_POST['lname'];
            if ($lname != "") {
                if (!preg_match("/^[a-zA-Z\s]+$/", $lname)) {
                    $response['LastName_error'] = true;
                    $response['lname_errMsg'] = "Last name must contain only letters";
                } else {
                    $response['LastName_error'] = false;
                }
            } else {
                // Handle empty first name
                $response['LastName_error'] = true;
                $response['lname_errMsg'] = "Last Name cannot be empty";
            }
        }

        if (isset($_POST['city'])) {
            $city = $_POST['city'];
            if ($city != "") {
                if (!preg_match("/^[a-zA-Z\s]+$/", $city)) {
                    $response['city_error'] = true;
                    $response['city_errMsg'] = "City must contain only letters";
                } else {
                    $response['city_error'] = false;
                }
            } else {
                // Handle empty first name
                $response['city_error'] = true;
                $response['city_errMsg'] = "city cannot be empty";
            }
        }

        if (isset($_POST['state'])) {
            $state = $_POST['state'];
            if ($state != "") {
                if (!preg_match('/^[A-Za-z\s]+$/', $state)) {
                    $response['state_error'] = true;
                    $response['state_errMsg'] = "State must contain only letters";
                } else {
                    $response['state_error'] = false;
                }
            } else {
                // Handle empty first name
                $response['state_error'] = true;
                $response['state_errMsg'] = "State cannot be empty";
            }
        }


        if (isset($_POST['zipcode'])) {
            $zipcode = $_POST['zipcode'];
            if ($zipcode != "") {
                if (!preg_match('/^\d+$/', $zipcode)) {
                    $response['zipcode_error'] = true;
                    $response['zipcode_errMsg'] = "Zip code must contain only numbers";
                } else {
                    $response['zipcode_error'] = false;
                }
            } else {
                // Handle empty first name
                $response['zipcode_error'] = true;
                $response['zipcode_errMsg'] = "Zip code cannot be empty";
            }
        }

        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
            if ($phone != "") {
                // Basic US phone number format validation
                if (!preg_match("/^\+?\d{11}$/", $phone)) {
                    $response['phone_error'] = true;
                    $response['phone_errMsg'] = "Phone number must contain only digits and be 11 characters long.";
                } else {
                    $response['phone_error'] = false;
                }
            } else {
                // Handle empty phone number
                $response['phone_error'] = true;
                $response['phone_errMsg'] = "Phone Number cannot be empty";
            }
        }

        if (isset($_POST['country'])) {
            $country = $_POST['country'];
            if ($country != "") {
                if (!preg_match("/^[a-zA-Z\s]+$/", $country)) {
                    $response['country_error'] = true;
                    $response['country_errMsg'] = "Country must contain only letters";
                } else {
                    $response['country_errMsg'] = false;
                }
            } else {
                // Handle empty first name
                $response['country_error'] = true;
                $response['country_errMsg'] = "Country cannot be empty";
            }
        }

        if (isset($_POST['workinghours'])) {
            $workinghours = $_POST['workinghours'];
            if ($workinghours != "") {
                if (!is_numeric($workinghours) || $workinghours <= 10 || $workinghours > 80) {
                    $response['workingh_error'] = true;
                    if (!is_numeric($workinghours)) {
                        $response['workingh_ErrorMsg'] = "Working hours must be numeric only";
                    } else if ($workinghours <= 0)
                        $response['workingh_ErrorMsg'] = "Working hours must be greater than 0";
                    else
                        $response['workingh_ErrorMsg'] = "Working hours must be less than 80";
                }
            } else {
                $response['workingh_error'] = false;
                $response['workingh_ErrorMsg'] = "Working hours cannot be empty";
            }
        }

        if (isset($_POST['salary'])) {
            $salary = $_POST['salary'];
            if ($salary != "") {
                if (!is_numeric($salary) || $salary <= 1000 || $salary > 100000) {
                    $response['salary_error'] = true;
                    if (!is_numeric($salary)) {
                        $response['salary_errorMsg'] = "Salary must be numeric only";
                    } else if ($salary <= 1000)
                        $response['salary_errorMsg'] = "Salary must be greater than 1000";
                    else
                        $response['salary_errorMsg'] = "Salary must be less than 80000";
                }
            } else {
                $response['salary_error'] = false;
                $response['salary_errorMsg'] = "Salary cannot be empty";
            }
        }

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            if ($email != "") {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $response['email_error'] = true;
                    $response['email_errorMsg'] = "Invalid email format";
                }
            } else {
                // Handle empty email
                $response['email_error'] = true;
                $response['email_errorMsg'] = "Email cannot be empty";
            }
        }

        if (isset($_POST['serviceID'])) {
            $serviceId = $_POST['serviceID'];
            if ($serviceId != "") {
                if (!isServiceExist($conn, $serviceId)) {
                    $response['serviceId_error'] = true;
                    $response['serviceId_errorMsg'] = "Services id does not exist";
                }
            } else {
                // Handle empty email
                $response['serviceId_error'] = true;
                $response['serviceId_errorMsg'] = "Services id cannot be empty";
            }
        }

        if (isset($_POST['restaurantID'])) {
            $restId = $_POST['restaurantID'];
            if ($restId != "") {
                if (!isRestaurantExist($conn, $restId)) {
                    $response['restaurantId_error'] = true;
                    $response['restaurantId_errorMsg'] = "Restaurant id does not exist";
                }
            } else {
                // Handle empty email
                $response['restaurantId_error'] = true;
                $response['restaurantId_errorMsg'] = "Restaurant id cannot be empty";
            }
        }

        // Return validation results as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
 ?>