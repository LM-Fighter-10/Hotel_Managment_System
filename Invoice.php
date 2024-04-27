<?php
 include 'codeBlocks.php';

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from form
        $CustomerID = $_POST["CustomerID"];
        $RoomNum = $_POST["RoomNum"];
     }

    $query_Invoice = "SELECT MAX(Inv_ID) AS last_id FROM Invoice";
    $last_id = mysqli_query($conn, $query_Invoice);
    if ($last_id->num_rows > 0) {
        $row = $last_id->fetch_assoc();
        $last_id = $row["last_id"];
    } else {

        $last_id = 0;
    }
    $new_id = $last_id + 1;

$query_insert_InvID="INSERT INTO Invoice (Inv_ID) VALUES ('$new_id') ";
$conn->query($query_insert_InvID);


$query_insert_Book = "UPDATE Book SET Inv_ID='$new_id' WHERE CustomerID = '$CustomerID' and RoomNum = '$RoomNum'";
$conn->query($query_insert_Book);


$query_inv="SELECT  c.CustomerID ,c.FirstName, c.LastName, b.RoomNum, b.CheckInDate, b.CheckOutDate, b.Price
            FROM Book b , Customer c, Rooms r
            WHERE c.CustomerID = '$CustomerID' and r.RoomNum = '$RoomNum'  and b.Inv_ID = $new_id ";

$result_inv = mysqli_query($conn, $query_inv);
if(mysqli_num_rows($result_inv)>0){
    $row_inv = mysqli_fetch_array($result_inv);
    $Customer_id = $row_inv['CustomerID'];
    $FirstName = $row_inv['FirstName'];
        $LastName = $row_inv['LastName'];
        $RoomNum = $row_inv['RoomNum'];
        $CheckInDate = $row_inv['CheckInDate'];
        $CheckOutDate = $row_inv['CheckOutDate'];
        $Price = $row_inv['Price'];

        $checkIn = new DateTime($CheckInDate);
        $checkOut = new DateTime($CheckOutDate);
        $interval = $checkIn->diff($checkOut);
        $numNights = $interval->days;
        $current_time = date("H:i:s");

        $invoiceHTML = "Invoice: $Inv_Id";
        $invoiceHTML .= "Customer ID: $Customer_id";
        $invoiceHTML .= "Customer Name: $FirstName $LastName";
        $invoiceHTML .= "Room Number: $RoomNum";
        $invoiceHTML .= "Check In Date: $CheckInDate";
        $invoiceHTML .= "Check Out Date: $CheckOutDate";
        $invoiceHTML .= "Number of Nights: $numNights";
        $invoiceHTML .= "Total Price: $Price";
        $invoiceHTML .= "Booking Time is: $current_time";

        echo $invoiceHTML;

        $query_insert_descrip="UPDATE Invoice SET Description='$invoiceHTML' WHERE Inv_ID = '$new_id'";
        $conn->query($query_insert_descrip);



}

?>