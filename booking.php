<!DOCTYPE html>
<html lang="en">
<?php
    include 'codeBlocks.php';
?>
<head>
    <?=$headerBlock?>
</head>

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
        <div class="container-xxl py-5">
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
                                            <input type="text" class="form-control" name="fname" id="Fname" placeholder="First Name">
                                            <label for="name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="lname" id="Lname" placeholder="Last Name">
                                            <label for="name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="select1" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <label for="select1">Select Gender</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                                            <label for="phone">Phone Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="country" id="country" placeholder="Country">
                                            <label for="country">Country</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                            <label for="city">City</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="state" id="state" placeholder="State">
                                            <label for="state">State</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="zip-code" id="zip-code" placeholder="Zip Code">
                                            <label for="zip-code">Zip Code</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date3" data-target-input="nearest">
                                            <input type="date" class="form-control" name="checkin" id="checkin" placeholder="Check In"/>
                                            <label for="checkin">Check In</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating date" id="date4" data-target-input="nearest">
                                            <input type="date" class="form-control" name="checkout" id="checkout" placeholder="Check Out"/>
                                            <label for="checkout">Check Out</label>
                                        </div>
                                    </div>
<!--                                    <div class="col-md-12">-->
<!--                                        <div class="form-floating">-->
<!--                                            <select class="form-select" id="select2" name="room">-->
<!--                                                <option value="Single">Single</option>-->
<!--                                                <option value="Double">Double</option>-->
<!--                                                <option value="Suite">Suite</option>-->
<!--                                            </select>-->
<!--                                            <label for="select2">Select Gender</label>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div id="xx">
                                    </div>

<!--                                    <div class="col-md-6">-->
<!--                                        <div class="form-floating">-->
<!--                                            <select class="form-select" id="select1">-->
<!--                                              <option value="1">Adult 1</option>-->
<!--                                              <option value="2">Adult 2</option>-->
<!--                                              <option value="3">Adult 3</option>-->
<!--                                            </select>-->
<!--                                            <label for="select1">Select Adult</label>-->
<!--                                          </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="form-floating">-->
<!--                                            <select class="form-select" id="select2">-->
<!--                                              <option value="1">1</option>-->
<!--                                              <option value="2">2</option>-->
<!--                                              <option value="3">3</option>-->
<!--                                              <option value="3">4</option>-->
<!--                                              <option value="3">5</option>-->
<!--                                              <option value="3">6</option>-->
<!--                                              <option value="3">7</option>-->
<!--                                              <option value="3">8</option>-->
<!--                                            </select>-->
<!--                                            <label for="select2">Select Number of Accompanies</label>-->
<!--                                          </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-12">-->
<!--                                        <div class="form-floating">-->
<!--                                            <select class="form-select" id="select3">-->
<!--                                              <option value="1">1</option>-->
<!--                                              <option value="2">2</option>-->
<!--                                              <option value="3">3</option>-->
<!--                                              <option value="3">4</option>-->
<!--                                              <option value="3">5</option>-->
<!--                                            </select>-->
<!--                                            <label for="select3">Select Number of Rooms</label>-->
<!--                                          </div>-->
<!--                                    </div>-->

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Special Request" name="message" id="message" style="height: 100px"></textarea>
                                            <label for="message">Special Request</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="button" onclick="addRoom()">Add Room</button>
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


        <!-- Newsletter Start -->
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">Subscribe Our <span class="text-primary text-uppercase">Newsletter</span></h4>
                            <div class="position-relative mx-auto" style="max-width: 400px;">
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                                <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Start -->
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

    function addRoom() {
        // Get the container where new fields will be added
        const fieldContainer = document.getElementById('xx');

        const label = document.createElement('label');
        label.textContent = 'Select Room Type';

        const fieldWrapper2 = document.createElement('div');
        fieldWrapper2.className = 'form-floating';
        fieldWrapper2.style.marginBottom = '15px';

        // Create a new div to wrap the input field and remove button
        const fieldWrapper = document.createElement('div');
        fieldWrapper.className = 'form-floating';
        fieldWrapper.style.marginBottom = '8px';

        const uniqueId = `select-${Math.random().toString(36).substr(2, 9)}`;

        const fieldContainer1 = document.createElement('div');
        fieldContainer1.id = uniqueId;


        // Create the new input field
        const newField = document.createElement('select');
        newField.className = 'form-select';
        newField.name = 'rooms[]'

        // Add some options to the select element
        const option1 = document.createElement('option');
        option1.value = 'Single';
        option1.textContent = 'Single';

        const option2 = document.createElement('option');
        option2.value = 'Double';
        option2.textContent = 'Double';

        const option3 = document.createElement('option');
        option3.value = 'Suite';
        option3.textContent = 'Suite';

        newField.appendChild(option1);
        newField.appendChild(option2);
        newField.appendChild(option3);


        // Create the remove button
        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.textContent = 'Remove Room';
        removeButton.className = 'remove-button';

        const addAccompanyButton = document.createElement('button');
        addAccompanyButton.type = 'button';
        addAccompanyButton.textContent = 'Add Accompany';
        addAccompanyButton.className = 'add-button';

        // Set the function to remove the specific field
        removeButton.onclick = function () {
            removeRoom(fieldWrapper2);
            removeAllAccompanies(fieldContainer1);
        };

        addAccompanyButton.onclick = function () {
            addAccompanies(uniqueId);
        };

        // Append the input field and remove button to the wrapper
        fieldWrapper.appendChild(newField);
        fieldWrapper.appendChild(label);
        fieldWrapper2.appendChild(fieldWrapper)
        fieldWrapper2.appendChild(removeButton);
        fieldWrapper2.appendChild(addAccompanyButton);


        // Append the wrapper to the container
        fieldContainer.appendChild(fieldWrapper2);
        fieldContainer.appendChild(fieldContainer1);
    }

    function removeRoom(fieldWrapper) {
        // Get the container where fields are stored
        const fieldContainer = document.getElementById('xx');

        // Remove the specific field wrapper from the container
        fieldContainer.removeChild(fieldWrapper);
    }

    function removeAllAccompanies(fieldContain) {
        // Get the container where fields are stored
        const fieldContainer = document.getElementById('xx');

        // Remove the specific field wrapper from the container
        fieldContainer.removeChild(fieldContain);
    }

    function addAccompanies(uniqueID) {
        const fieldContainer = document.getElementById(uniqueID);

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
        GenderField.name = 'gender1[]'


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
    function removeAccompanies(fieldWrapper, uniqueID) {
        // Get the container where fields are stored
        const fieldContainer = document.getElementById(uniqueID);

        // Remove the specific field wrapper from the container
        fieldContainer.removeChild(fieldWrapper);
    }

</script>

<?php
// Step 3: Insert data into MySQL when form is submitted
if (isset($_POST['submit'])) {

    $unique_id = mt_rand(10000, 99999);
    $result = $conn->query("select * from invoice where Inv_ID = $unique_id");
    while ($result->num_rows > 0){
        $unique_id = mt_rand(10000, 99999);
        $result = $conn->query("select * from invoice where Inv_ID = $unique_id");
    }

    $unique_id1 = "INV".$unique_id1;
    echo $unique_id1;

    $unique_id1 = mt_rand(10000, 99999);
    $result = $conn->query("select * from invoice where Inv_ID = $unique_id1");
    while ($result->num_rows > 0){
        $unique_id1 = mt_rand(10000, 99999);
        $result = $conn->query("select * from invoice where Inv_ID = $unique_id1");
    }

    $unique_id1 = "INV".$unique_id1;
    echo $unique_id1;

    // Sanitize inputs to avoid SQL injection
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $country = $conn->real_escape_string($_POST['country']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $zipcode = $conn->real_escape_string($_POST['zip-code']);
    $checkin = $conn->real_escape_string($_POST['checkin']);
    $checkout = $conn->real_escape_string($_POST['checkout']);
    $message  = $conn->real_escape_string($_POST['message']);

    $date = "Check in: " . $checkin . ", Check out: " . $checkout;

    $rooms = $_POST['rooms'] ?? [];
    $roomTypes = implode( ',',$rooms);

    $description = "Special Request: " . $message . "-" . $date . "-" . "Booked Rooms: " . $roomTypes;


    // Insert query
    $sql = "INSERT INTO customer (CustomerID, FirstName, LastName, Gender, Email, PhoneNumber,
                      ContactNumber, Country, City, State, Zip_Code) VALUES ('$unique_id', '$fname',
                                                                             '$lname', '$gender','$email',
                                                                             '$phone', '$phone', '$country', 
                                                                             '$city','$state', '$zipcode');";

    $sqlInv = "INSERT INTO Invoice (Inv_ID, Description) VALUES ('$unique_id1', '$description');";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if ($conn->query($sqlInv) === TRUE) {
        echo "New record created successfully!";

    } else {
        echo "Error: " . $sqlInv . "<br>" . $conn->error;
    }

    for ($i = 0; $i < count($rooms); $i++) {
        $desired_room_type = $rooms[$i];

        $sqlr = "SELECT RoomNum FROM rooms WHERE Capacity = ? AND Status = 'Available' LIMIT 1";

        $stmt = $conn->prepare($sqlr);
        $stmt->bind_param("s", $desired_room_type); // Bind the room type parameter
        $stmt->execute();

        $room_id = null;
        $room_id1 = 0;

        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $room_id = $row['RoomNum'];
            $row['Status'] = "Occupied";
        }

        if ($room_id !== null) {
            echo "The first available room with type '$desired_room_type' has ID: $room_id";

            $aname = $_POST['aname'];
            $gender1 = $_POST['gender1'];
            $BDate = $_POST['BDate'];
            $Relation = $_POST['Relationship'];

            if(isset($_POST['aname'])) {

                for ($j = 0; $j < count($aname); $j++) {
                    $aname1 = $aname[$j];
                    $gender1 = $gender[$j];
                    $BDate1 = $BDate[$j];
                    $Relation1 = $Relation[$j];

                    $sqlA = "INSERT INTO Accompanies (Name, CustomerID, RoomNum, Gender, Bdate, Relationship) VALUES ('$aname1', '$unique_id',
                                                                                         '$room_id', '$gender1', '$BDate1'
                                                                                         , '$Relation1');";
                    $conn->query($sqlA);
                }
            }

            $sqlB = "INSERT INTO Book (CustomerID, RoomNum, Inv_ID, CheckInDate, CheckOutDate, BookingType, Price) VALUES 
                                      ('$unique_id',);";
            $conn->query($sqlB);


        } else {
            echo "No available rooms of type '$desired_room_type' found.";
        }

    }




}
$conn->close();
?>
</html>