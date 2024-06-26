<!DOCTYPE html>
<html lang="en">
<?php
    include 'codeBlocks.php';
    refreshRooms();
    refreshEmployees();
    refreshServices();
    getRoom_Emp_Cust_Count();
?>
<head>
    <?=$headerBlock?>
</head>

<body>
    <div class="bg-white p-0">
        <?=$navBarBlock?>

        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
                                <a href="room.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Rooms</a>
                                <a href="booking.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Elegant Escapes</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Explore elegance at our distinguished hotel retreat.</h1>
                                <a href="room.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Rooms</a>
                                <a href="booking.php" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">Hotelier</span></h1>
                        <p class="mb-4">Discover a world of elegance and comfort at our boutique hotel. From the moment you arrive, you’ll be greeted by warm smiles and impeccable service. Our website is your gateway to an unforgettable stay. Explore our luxurious rooms, indulge in gourmet dining, and unwind by the poolside. Whether you’re here for business or leisure, our hotel promises an exceptional experience. Book your stay today and let us create lasting memories for you</p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?=$roomCount?></h2>
                                        <p class="mb-0">Rooms</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.2s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?=$employeeCount?></h2>
                                        <p class="mb-0">Employees</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?=$customerCount?></h2>
                                        <p class="mb-0">Customers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="about.php">Explore More</a>
                    </div>
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
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <div id="backgroundCover" class="background-cover"></div>
        <!-- Page Header End -->
        <form class="roomEditForm" id="RoomEditForm" method="POST">
            <div class="d-flex justify-content-between user-select-none">
                <p class="roomEditTitle">EDIT ROOM</p>
                <p class="crossExitEdit" id="exitEdit1">✖</p>
            </div>
            <div id="EditErrorMsg1" class="alert alert-danger" role="alert"></div>
            <label for="roomNumber" id="roomNumberMainLabel">
                <input class="input" type="text" id="roomNumber" name="roomNumber" readonly>
                <span id="roomNumberLabel">Room number</span>
            </label>

            <div class="roomEditFlex">
                <label for="branchId" style="width: 200px;">
                    <input class="input" type="text" id="branchId" name="branchId" required>
                    <span id="branchIdLabel">Branch ID</span>
                </label>

                <label for="pricePerNight" style="width: 200px;">
                    <input class="input" type="text" id="pricePerNight" name="pricePerNight" required>
                    <span id="pricePerNightLabel">Price / Night</span>
                </label>
            </div>

            <label for="roomCapacity">Room Capacity:</label>
            <select class="dropdownEditRoom" id="roomCapacity" name="capacity">
                <option value="Single" selected>Single</option>
                <option value="Double">Double</option>
                <option value="Triple">Triple</option>
                <option value="Suite">Suite</option>
            </select>

            <label for="status">Status:</label>
            <select class="dropdownEditRoom" id="status" name="status">
                <option value="Available" selected>Available</option>
                <option value="Occupied">Occupied</option>
                <option value="Under Maintenance">Under Maintenance</option>
            </select>

            <input type="button" class="roomEditSubmit" id="roomEditSubmitBtn" value="Edit Room">
        </form>

        <!-- Room Start -->
        <div class="container-xxl py-5" style="margin-bottom: 200px;">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
                </div>
                <div class="row g-4 position-relative" id="roomsContainer">
                    <?=$rooms?>
                </div>
            </div>
        </div>
        <!-- Room End -->


        <!-- Video Start -->
        <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Luxury Living</h6>
                        <h1 class="text-white mb-4">Discover A Brand Luxurious Hotel</h1>
                        <p class="text-white mb-4"> At our hotel, we believe that every guest deserves a memorable experience. Our website is your virtual concierge, ready to guide you through a world of comfort and luxury. Explore our elegantly appointed rooms, each designed with your relaxation in mind. From the plush bedding to the panoramic views, every detail has been carefully curated. Discover our award-winning dining options, where culinary delights await your taste buds. Whether you’re planning a romantic getaway or a business trip, our website is your passport to exceptional hospitality. Book now and let us exceed your expectations.</p>
                        <a href="room.php" class="btn btn-primary py-md-3 px-md-5 me-3">Our Rooms</a>
                        <a href="booking.php" class="btn btn-light py-md-3 px-md-5">Book A Room</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video">
                        <!-- <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Start -->


        <!-- Service Start -->
        <div class="container-xxl py-5" style="margin-bottom: 200px">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
                </div>
                <div class="row g-4">
                    <?=$services?>
                </div>
            </div>
        </div>
        <!-- Service End -->

        <div id="backgroundCover2" class="background-cover"></div>
        <!-- Page Header End -->
        <form class="employeeEditForm" id="EmployeeEditForm" method="POST">
            <div class="d-flex justify-content-between user-select-none">
                <p class="employeeEditTitle">EDIT Employee details</p>
              <p class="crossExitEdit" id="exitEdit2">✖</p>
            </div>
            <div id="EditErrorMsg2" class="alert alert-danger" role="alert"></div>
            <label for="employeeNumber" id="EmployeeIDMainLabel">
                <input class="input" type="text" id="employeeNumber" name="employeeNumber" readonly>
                <span id="EmployeeIDLabel">Employee Number</span>
            </label>

            <div class="employeeEditFlex">
                <label for="fname" style="width: 200px;" >
                    <input class="input" type="text" id="fname" name="fname" required>
                    <span id="FnameLabel">First Name</span>

                </label>

                <label for="lname" style="width: 200px;">
                    <input class="input" type="text" id="lname" name="lname" required>
                    <span id="lnameLabel">Last Name</span>
                </label>
            </div>


                <div>
                <label for="rolename" style="width: 200px;" >
                    <input class="input" type="text" id="rolename" name="rolename" required>
                    <span id = "RolenameLabel">Role Name</span>
                </label>
                <label for="workinghours" style="width: 200px;" >
                    <input class="input" type="text" id="workinghours" name="workinghours" required>
                    <span id="workinghlabel">Working Hours</span>
                </label>

                </div>


               <div>
                <label for="phone" style="width: 200px;">
                    <input class="input" type="text" id="phone" name="phone" required>
                    <span id ="phonelabel">Phone</span>
                </label>

                <label for="salary" style="width: 200px;">
                    <input class="input" type="text" id="salary" name="salary" required>
                    <span id = "salarylabel">Salary</span>
                </label>


                </div>
                <div>
                <label for="email" style="width: 405px;">
                    <input class="input" type="text" id="email" name="email" required>
                    <span id = "emaillabel">Email</span>
                </label>
                </div>

                <div>
                <label for="country" style="width: 200px;">
                    <input class="input" type="text" id="country" name="country" required>
                    <span id="countrylabel">Country</span>
                </label>
                <label for="city" style="width: 200px;">
                    <input class="input" type="text" id="city" name="city" required>
                    <span id ="citylabel" >City</span>
                </label>
                </div>

                <div>
                <label for="state" style="width: 200px;">
                    <input class="input" type="text" id="state" name="state" required>
                    <span id = "statelabel">State</span>
                </label>

                <label for="zipcode" style="width: 200px;">
                    <input class="input" type="text" id="zipcode" name="zipcode" required>
                    <span id = "zipcodelabel">Zip Code</span>
                </label>
                </div>


                <div>
                <label for="serviceID" style="width: 200px;">
                    <input class="input" type="text" id="serviceID" name="serviceID" required>
                    <span id = "sidlabel">Service ID</span>
                </label>
                <label for="restaurantID" style="width: 200px;">
                    <input class="input" type="text" id="restaurantID" name="restaurantID" required>
                    <span id = "ridlabel">Restaurant ID</span>
                </label>

                </div>
            <input type="button" class="EmployeeEditSubmit" id="EmployeeEditSubmitBtn" value="Edit Employee">
        </form>

        <!-- Team Start -->
        <div class="container-xxl py-5" style="margin-bottom: 200px">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Team</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Staffs</span></h1>
                </div>
                <div class="row g-4 justify-content-center" id="employeesContainer">
                    <?=$employees?>
                </div>
            </div>
        </div>
        <!-- Team End -->

        <?=$footerBlock?>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- Scripts -->
    <?=$scriptBlock?>
</body>

<script>
    var error = "<?=$error?>";
    if (error !== "") {
        alert("<?=$error?>");
    }
</script>

<?=editRoom()?>
<?=editEmployee()?>

</html>

<?php if (!empty($conn)) {
    $conn->close();
} ?>

