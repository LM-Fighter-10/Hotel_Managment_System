<?php
    include 'codeBlocks.php';
    // Function to check if a room exists with the provided room number
    function isRoomExists($roomNumber, $conn) {
        $sql = "SELECT * FROM rooms WHERE room_number = '$roomNumber'";
        $result = $conn->query($sql);
        return $result->num_rows > 0;
    }

    // Function to check if a hotel exists with the provided branch ID
    function isHotelExists($branchId, $conn) {
        $sql = "SELECT * FROM hotels WHERE branch_id = '$branchId'";
        $result = $conn->query($sql);
        return $result->num_rows > 0;
    }

    // Validate room number
    if(isset($_POST['roomNumber'])) {
        $roomNumber = $_POST['roomNumber'];
        if(isRoomExists($roomNumber, $conn)) {
            // Room number already exists, handle error
            echo '<script>document.getElementById("roomNumberLabel").children[1].style.color = "red";</script>';
        } else {
            // Room number is valid, reset label color
            echo '<script>document.getElementById("roomNumberLabel").children[1].style.color = "";</script>';
        }
    }

    // Validate branch ID
    if(isset($_POST['branchId'])) {
        $branchId = $_POST['branchId'];
        if(!isHotelExists($branchId, $conn)) {
            // Hotel with the provided branch ID does not exist, handle error
            echo '<script>document.getElementById("branchIdLabel").children[1].style.color = "red";</script>';
        } else {
            // Branch ID is valid, reset label color
            echo '<script>document.getElementById("branchIdLabel").children[1].style.color = "";</script>';
        }
    }

    // Validate price per night
    if(isset($_POST['pricePerNight'])) {
        $pricePerNight = $_POST['pricePerNight'];
        if(!is_numeric($pricePerNight) || $pricePerNight <= 0) {
            // Invalid price per night, handle error
            echo '<script>document.getElementById("pricePerNightLabel").children[1].style.color = "red";</script>';
        } else {
            // Price per night is valid, reset label color
            echo '<script>document.getElementById("pricePerNightLabel").children[1].style.color = "";</script>';
        }
    }
?>
