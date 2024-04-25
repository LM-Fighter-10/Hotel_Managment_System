<?php
    include 'codeBlocks.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $roomNumber = $_REQUEST['roomNumber'];
        $branchId = $_REQUEST['branchId'];
        $pricePerNight = $_REQUEST['pricePerNight'];
        $capacity = $_REQUEST['capacity'];
        $status = $_REQUEST['status'];
        $conn->query("UPDATE `rooms` SET `BranchID`='$branchId',
                   `Price_Per_Night`='$pricePerNight',`Capacity`='$capacity',
                   `Status`='$status' WHERE RoomNum='$roomNumber'");
        refreshRooms();
        $response = array('success' => true, 'rooms' => $rooms);
        // Return success response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>
