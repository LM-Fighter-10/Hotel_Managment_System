<!DOCTYPE html>
<html lang="en">
<?php
include 'codeBlocks.php';
?>
<head>
    <?=$headerBlock?>
</head>

<?php
    $fname = '';
    $lname = '';
    $gender = '';
    $email = '';
    $phoneNum = '';
    $contactNum = '';
    $country = '';
    $city = '';
    $state = '';
    $zipcode = '';

    if ($isLoggedInAsCustomer) {
        $id = $_SESSION['username'];

        $sqlc = "SELECT * FROM customer WHERE CustomerID = '$id' ";

        $stmt = $conn->prepare($sqlc);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $fname = $row['FirstName'];
            $lname = $row['LastName'];
            $gender = $row['Gender'];
            $email = $row['Email'];
            $phoneNum = $row['PhoneNumber'];
            $contactNum = $row['ContactNumber'];
            $country = $row['Country'];
            $city = $row['City'];
            $state = $row['State'];
            $zipcode = $row['Zip_Code'];
        }

    }
?>

<body>
<div class="bg-white p-0">
    <?=$navBarBlock?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Booking Start -->
    <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="bg-white shadow" style="padding: 35px;">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                           placeholder="Check in" data-target="#date1" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" placeholder="Check out" data-target="#date2" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>Adult</option>
                                    <option value="1">Adult 1</option>
                                    <option value="2">Adult 2</option>
                                    <option value="3">Adult 3</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option selected>Child</option>
                                    <option value="1">Child 1</option>
                                    <option value="2">Child 2</option>
                                    <option value="3">Child 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- Booking Start -->
    <div class="container-xxl py-5" style="margin-bottom: 200px">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6>
                <h1 class="mb-5">Book A <span class="text-primary text-uppercase">Luxury Room</span></h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/picture.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form method="post" action="">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input readonly type="text" class="form-control" name="fname" id="Fname" placeholder="First Name" value="<?php echo $fname; ?>">
                                        <label for="name">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input readonly type="text" class="form-control" name="lname" id="Lname" placeholder="Last Name" value="<?php echo $lname; ?>">
                                        <label for="name">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input readonly type="gender" class="form-control" id="gender" name="gender" value="<?php echo $gender; ?>">
                                        <label for="gender">Gender</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input readonly type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $email; ?>">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input readonly type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $phoneNum; ?>">
                                        <label for="phone">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input readonly type="tel" class="form-control" name="phone1" id="phone1" placeholder="Contact Number" value="<?php echo $contactNum; ?>">
                                        <label for="phone">Contact Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input readonly type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $country; ?>">
                                        <label for="country">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input readonly type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $city; ?>">
                                        <label for="city">City</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input readonly type="text" class="form-control" name="state" id="state" placeholder="State" value="<?php echo $state; ?>">
                                        <label for="state">State</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input readonly type="text" class="form-control" name="zip-code" id="zip-code" placeholder="Zip Code" value="<?php echo $zipcode; ?>">
                                        <label for="zip-code">Zip Code</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input required type="date" class="form-control" name="checkin" id="checkin" placeholder="Check In"/>
                                        <label for="checkin">Check In</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date4" data-target-input="nearest">
                                        <input required type="date" class="form-control" name="checkout" id="checkout" placeholder="Check Out"/>
                                        <label for="checkout">Check Out</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select required class="form-select" id="select3" name="bookType">
                                            <option value="Standard">Standard</option>
                                            <option value="Half-Board">Half-Board</option>
                                            <option value="All-Inclusive">All-Inclusive</option>
                                        </select>
                                        <label for="select3">Select Booking Type</label>
                                    </div>
                                </div>

                                <div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <select required class="form-select" id="select2" name="room">
                                            <option value="Single">Single</option>
                                            <option value="Double">Double</option>
                                            <option value="Suite">Suite</option>
                                        </select>
                                        <label for="select2">Select Room Type</label>
                                    </div>
                                    <button type="button" class="add-button" style="margin-top: 9px" onclick="addAccompanies()">Add Accompany</button>
                                </div>
                                </div>
                                <div id="xx">
                                </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Special Request" name="message" id="message" style="height: 100px"></textarea>
                                            <label for="message">Special Request</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Book Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->
    <?=$footerBlock?>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<!-- Scripts -->
<?=$scriptBlock?>
</body>
<script>
    $("#navbarCollapse a").each(function () {
        if ($(this).html() === "Booking"){
            $(this).addClass("active");
        }else{
            $(this).removeClass("active");
        }
    });

    function addAccompanies(uniqueID) {
        const fieldContainer = document.getElementById('xx');


        const fieldContainer2 = document.createElement('div');
        fieldContainer2.style.marginBottom = '15px';

        const fieldContainer1 = document.createElement('div');
        fieldContainer1.className = 'row g-2';

        const fieldWrapperC1 = document.createElement('div');
        fieldWrapperC1.className = 'col-md-6';
        fieldWrapperC1.style.marginBottom = '8px';

        const fieldWrapperC2 = document.createElement('div');
        fieldWrapperC2.className = 'col-md-6';
        fieldWrapperC2.style.marginBottom = '8px';

        const fieldWrapperC3 = document.createElement('div');
        fieldWrapperC3.className = 'col-md-6';
        fieldWrapperC3.style.marginBottom = '8px';

        const fieldWrapperC4 = document.createElement('div');
        fieldWrapperC4.className = 'col-md-6';
        fieldWrapperC4.style.marginBottom = '8px';

        const fieldWrapper1 = document.createElement('div');
        fieldWrapper1.style.marginBottom = '4px';
        fieldWrapper1.style.marginRight = '8px';
        fieldWrapper1.className = 'form-floating';

        const fieldWrapper2 = document.createElement('div');
        fieldWrapper2.style.marginBottom = '4px';
        fieldWrapper2.className = 'form-floating';

        const fieldWrapper3 = document.createElement('div');
        fieldWrapper3.style.marginBottom = '4px';
        fieldWrapper3.style.marginRight = '8px';
        fieldWrapper3.className = 'form-floating';

        const fieldWrapper4 = document.createElement('div');
        fieldWrapper4.style.marginBottom = '4px';
        fieldWrapper4.className = 'form-floating';

        const NameField = document.createElement('input');
        NameField.type = 'text';
        NameField.className = 'form-control';
        NameField.placeholder = 'Name'
        NameField.name = 'aname[]'

        const GenderField = document.createElement('select');
        GenderField.className = 'form-select';
        GenderField.name = 'genders[]'


        const BDateField = document.createElement('input');
        BDateField.type = 'date';
        BDateField.className = 'form-control';
        BDateField.placeholder = 'Birthdate'
        BDateField.name = 'BDate[]'

        const RelationField = document.createElement('input');
        RelationField.type = 'text';
        RelationField.className = 'form-control';
        RelationField.placeholder = 'Relationship'
        RelationField.name = 'Relationship[]'

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.textContent = 'Remove Accompany';
        removeButton.className = 'remove-button';

        removeButton.onclick = function () {
            removeAccompanies(fieldContainer2, uniqueID);
        };

        const label1 = document.createElement('label');
        label1.textContent = 'Name'

        const label2 = document.createElement('label');
        label2.textContent = 'Gender';

        const label3 = document.createElement('label');
        label3.textContent = 'Birthdate';

        const label4 = document.createElement('label');
        label4.textContent = 'Relationship';

        const option1 = document.createElement('option');
        option1.value = 'Male';
        option1.textContent = 'Male';

        const option2 = document.createElement('option');
        option2.value = 'Female';
        option2.textContent = 'Female';

        GenderField.appendChild(option1);
        GenderField.appendChild(option2);


        fieldWrapper1.appendChild(NameField);
        fieldWrapper1.appendChild(label1);
        fieldWrapper2.appendChild(GenderField);
        fieldWrapper2.appendChild(label2);
        fieldWrapper3.appendChild(BDateField);
        fieldWrapper3.appendChild(label3);
        fieldWrapper4.appendChild(RelationField);
        fieldWrapper4.appendChild(label4);

        fieldWrapperC1.appendChild(fieldWrapper1);
        fieldWrapperC2.appendChild(fieldWrapper2);
        fieldWrapperC3.appendChild(fieldWrapper3);
        fieldWrapperC4.appendChild(fieldWrapper4);

        fieldContainer1.appendChild(fieldWrapperC1);
        fieldContainer1.appendChild(fieldWrapperC2);
        fieldContainer1.appendChild(fieldWrapperC3);
        fieldContainer1.appendChild(fieldWrapperC4);
        fieldContainer2.appendChild(fieldContainer1);
        fieldContainer2.appendChild(removeButton);
        fieldContainer.appendChild(fieldContainer2);

    }
    function removeAccompanies(fieldWrapper) {
        // Get the container where fields are stored
        const fieldContainer = document.getElementById('xx');

        // Remove the specific field wrapper from the container
        fieldContainer.removeChild(fieldWrapper);
    }

</script>

<?php


// Step 3: Insert data into MySQL when form is submitted
if (isset($_POST['submit'])) {

    if ($isLoggedInAsCustomer) {


        $unique_id1 = mt_rand(10000, 99999);
        $result = $conn->query("select * from invoice where Inv_ID = $unique_id1");
        while ($result->num_rows > 0) {
            $unique_id1 = mt_rand(10000, 99999);
            $result = $conn->query("select * from invoice where Inv_ID = $unique_id1");
        }

        $unique_id1 = "INV" . $unique_id1;

        // Sanitize inputs to avoid SQL injection
        $checkin = $conn->real_escape_string($_POST['checkin']);
        $checkout = $conn->real_escape_string($_POST['checkout']);
        $message = $conn->real_escape_string($_POST['message']);
        $room = $conn->real_escape_string($_POST['room']);
        $bookType = $conn->real_escape_string($_POST['bookType']);


        $date = "Check in: " . $checkin . ", Check out: " . $checkout;

        $description = "Special Request: " . $message . "\n-" . $date . "\n-" . "Booked Room Type: " . $room;

        $sqlInv = "INSERT INTO Invoice (Inv_ID, Description) VALUES ('$unique_id1', '$description');";


        $conn->query($sqlInv);

        $sqlr = "SELECT RoomNum, Price_Per_Night FROM rooms WHERE Capacity = ? AND Status = 'Available' LIMIT 1";

        $stmt = $conn->prepare($sqlr);
        $stmt->bind_param("s", $room); // Bind the room type parameter
        $stmt->execute();

        $room_id = null;
        $price = null;

        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $room_id = $row['RoomNum'];
            $price = $row['Price_Per_Night'];
        }

        if ($room_id !== null) {

            $aname = $_POST['aname'] ?? [];
            $genders = $_POST['genders'] ?? [];
            $BDate = $_POST['BDate'] ?? [];
            $Relation = $_POST['Relationship'] ?? [];

            if (count($aname) > 0) {

                if (isset($_POST['aname'])) {

                    for ($j = 0; $j < count($aname); $j++) {
                        $aname1 = $aname[$j];
                        $gender1 = $genders[$j];
                        $BDate1 = $BDate[$j];
                        $Relation1 = $Relation[$j];

                        $sqlA = "INSERT INTO Accompanies (Name, CustomerID, RoomNum, Gender, Bdate, Relationship) VALUES ('$aname1', '$id',
                                                                             '$room_id', '$gender1', '$BDate1'
                                                                             , '$Relation1');";
                        $conn->query($sqlA);

                    }
                }
            }

            $sqlU = "UPDATE rooms SET Status = 'Occupied' where RoomNum = $room_id";
            $conn->query($sqlU);

            $sqlB = "INSERT INTO Book (CustomerID, RoomNum, Inv_ID, CheckInDate, CheckOutDate, BookingType, Price) VALUES 
                              ('$id', '$room_id', '$unique_id1', '$checkin', '$checkout', '$bookType'
                              ,'$price');";
            $conn->query($sqlB);

            $room_id = null;

        } else {
            echo "<script>alert('No available rooms of type $room found.!');</script>";
        }

    } else {
        echo "<script>alert('Please Login or Register to Continue the Booking Process!');
                window.location.href = 'signUp.php';</script>";
    }
}
?>
</html>