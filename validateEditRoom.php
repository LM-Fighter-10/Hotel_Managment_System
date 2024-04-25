<?php
    include 'codeBlocks.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // Initialize response array
        $response = array(
            'branchIdError' => false,
            'pricePerNightError' => false
        );

        // Function to check if a room exists with the provided room number
        function isRoomExists($roomNumber, $conn) {
            if ($roomNumber != "") {
                $sql = "SELECT * FROM rooms WHERE BINARY RoomNum = '$roomNumber'";
                $result = $conn->query($sql);
                return $result->num_rows > 0;
            } else{
                return false;
            }
        }

        // Function to check if a hotel exists with the provided branch ID
        function isHotelExists($branchId, $conn) {
            if ($branchId != "") {
                $sql = "SELECT * FROM Hotel WHERE BINARY BranchID = '$branchId'";
                $result = $conn->query($sql);
                return $result->num_rows > 0;
            } else{
                return true;
            }
        }

        // Validate branch ID
        if(isset($_POST['branchId'])) {
            $branchId = $_POST['branchId'];
            if(!isHotelExists($branchId, $conn)) {
                // Hotel with the provided branch ID does not exist, set error flag
                $response['branchIdError'] = true;
                $response['branchIdErrorMsg'] = "Hotel with the provided branch ID does not exist";
            }
        }

        // Validate price per night
        if(isset($_POST['pricePerNight'])) {
            $pricePerNight = $_POST['pricePerNight'];
            if ($pricePerNight != "") {
                if (!is_numeric($pricePerNight) || $pricePerNight <= 0 || $pricePerNight > 99999999.99) {
                    // Invalid price per night, set error flag
                    $response['pricePerNightError'] = true;
                    if (!is_numeric($pricePerNight)){
                        $response['pricePerNightErrorMsg'] = "Price per night must be numeric only";
                    } else if ($pricePerNight <= 0)
                        $response['pricePerNightErrorMsg'] = "Price per night must be greater than 0";
                    else
                        $response['pricePerNightErrorMsg'] = "Price per night must be less than 2147483647";
                }
            } else{
                $response['pricePerNightError'] = false;
            }
        }

        // Return validation results as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>