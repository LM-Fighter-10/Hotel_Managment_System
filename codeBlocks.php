<?php
    include_once "connect.php";
    include 'Queries.php';
    $navBarBlock = '
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    
    <!-- Header Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <div class="col-lg-3 bg-dark d-none d-lg-block">
                <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                </a>
            </div>
            <div class="col-lg-9">
                <div class="row gx-0 bg-white d-none d-lg-flex header-contact-container">
                    <div class="col-lg-7 px-5 text-start header-contact-email-phone">
                        <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                            <i class="fa fa-envelope text-primary me-2"></i>
                            <p class="mb-0">hotelier997@gmail.com</p>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center py-2">
                            <i class="fa fa-phone-alt text-primary me-2"></i>
                            <p class="mb-0">+012 345 6789</p>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                    <a href="index.php" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="about.php" class="nav-item nav-link">About</a>
                            <a href="service.php" class="nav-item nav-link">Services</a>
                            <a href="room.php" class="nav-item nav-link">Rooms</a>
                            <a href="booking.php" class="nav-item nav-link">Booking</a>
                            <a href="team.php" class="nav-item nav-link">Our Team</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>';
    if (!isset($_SESSION['username'])) {
        $navBarBlock.= '<button onclick="window.open(\'login.php\', \'_self\')" class="login_RegBtn">Login/Register</button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>';
    } else{
        $navBarBlock.= '<button onclick="window.open(\'logout.php\', \'_self\')" class="logout_HomeBtn">Logout</button>
                        </div>
                    </nav>
                </div>
            </div>
        </div>';
    }
    $headerBlock = '
        <meta charset="utf-8">
    <title>Hotel Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">';
    $footerBlock = '
    <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer wow" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-7">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>hotelier997@gmail.com</p>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="row gy-5 g-4">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Company</h6>
                                <a class="btn btn-link" href="about.php">About Us</a>
                                <a class="btn btn-link" href="contact.php">Contact Us</a>
                                <a class="btn btn-link" href="contact.php">Support</a>
                            </div>
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Services</h6>
                                <a class="btn btn-link" href="service.php">Food & Restaurant</a>
                                <a class="btn btn-link" href="service.php">Spa & Fitness</a>
                                <a class="btn btn-link" href="service.php">Sports & Gaming</a>
                                <a class="btn btn-link" href="service.php">Event & Party</a>
                                <a class="btn btn-link" href="service.php">GYM & Yoga</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="index.php">Hotelier</a>, All Right Reserved. 		
							Designed By 
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="index.php">Home</a>
                                <a href="contact.php">Help</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->';
    $scriptBlock = '<!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>';

    function refreshRooms(){
        global $conn, $rooms, $SelectingRoomStatus, $isLoggedIn, $isLoggedInAsEmployee, $roomInd;
        $resultStatus =$conn->query($SelectingRoomStatus);
        $rooms = "";
        $roomInd = 1;$animationNum = 1;
        while($room =$resultStatus->fetch_assoc()){
            if ($roomInd == 4){
                $roomInd = 1;
            }
            $rooms = $rooms.
                '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.'. $animationNum .'s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/room-'. $roomInd .'.jpg" alt="">
                            <small class="position-absolute start-0 
                            top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">$<span id="RoomPricePerNight'. $roomInd .'">'.$room["Price_Per_Night"].'</span>/Night
                            </small>
                        </div>
                        <div class="p-4 mt-2">';
            if ($isLoggedIn and $isLoggedInAsEmployee){
                $rooms .= '<div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">Room '.$room['RoomNum'].'</h5>
                                <a id="pen'. $roomInd .'" class="edit-icon top-0 end-0 p-0">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>';
            }else{
                $rooms .= '<div class="d-flex justify-content-center mb-3">
                                <h5 class="mb-0">Room '.$room['RoomNum'].'</h5>';
            }
            $rooms .= '</div>
                            <div class="d-flex mb-3 justify-content-around">
                                <small class="border-end me-3 pe-3">';
            if ($room['Capacity'] == 'Single'){
                $rooms .= '<i class="fas fa-user text-primary me-2"></i><span id="RoomCapacity'. $roomInd .'">'. $room['Capacity'] .'</spanid></small>
    
                                <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                            </div>
                            <div class="d-flex justify-content-between m-4">
                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="mb-0" style="font-size: 0.9rem">Branch</h6>
                                    <h6 class="text-body mb-0" style="font-size: 0.9rem">
                                    (<span id="RoomBranchID'. $roomInd .'">'.$room['BranchID'].'</span>)</h6>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="mb-0" style="font-size: 0.9rem">Status</h6>
                                    <h6 class="text-body mb-0" style="font-size: 0.9rem">
                                    (<span id="RoomStatus'. $roomInd .'">'.$room['Status'].'</span>)</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }else if ($room['Capacity'] == 'Double'){
                $rooms .= '<i class="fas fa-user-friends text-primary me-2"></i><span id="RoomCapacity'. $roomInd .'">'. $room['Capacity'] .'</span></small>
    
                                <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                            </div>
                            <div class="d-flex justify-content-between m-4">
                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="mb-0" style="font-size: 0.9rem">Branch</h6>
                                    <h6 class="text-body mb-0" style="font-size: 0.9rem">
                                    (<span id="RoomBranchID'. $roomInd .'">'.$room['BranchID'].'</span>)</h6>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="mb-0" style="font-size: 0.9rem">Status</h6>
                                    <h6 class="text-body mb-0" style="font-size: 0.9rem">(<span id="RoomStatus'. $roomInd .'">'.$room['Status'].'</span>)</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
    
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }else{
                $rooms .= '<i class="fas fa-users text-primary me-2"></i><span id="RoomCapacity'. $roomInd .'">'. $room['Capacity'] .'</span></small>
    
                                <small><i class="fa fa-wifi text-primary me-2"></i>Wifi</small>
                            </div>
                            <div class="d-flex justify-content-between m-4">
                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="mb-0" style="font-size: 0.9rem">Branch</h6>
                                    <h6 class="text-body mb-0" style="font-size: 0.9rem">
                                    (<span id="RoomBranchID'. $roomInd .'">'.$room['BranchID'].'</span>)</h6>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <h6 class="mb-0" style="font-size: 0.9rem">Status</h6>
                                    <h6 class="text-body mb-0" style="font-size: 0.9rem">(<span id="RoomStatus'. $roomInd .'">'.$room['Status'].'</span>)</h6>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
    
                                <a class="btn btn-sm btn-dark rounded py-2 px-4" href="">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            $roomInd++;
            $animationNum++;
        }
        $roomInd--;
    }
    function refreshEmployees(){
        global $conn, $employees, $SelectingAllEmployeeFullName, $isLoggedIn, $GetEmployeeLoggedIn, $isLoggedInAsEmployee, $empNo;
        $Emp_query_run = $conn->query($SelectingAllEmployeeFullName);
        $employees = "";
        $imageNum = 1;$animationNum = 1;
        $empNo = 1;
        while($emp = $Emp_query_run->fetch_assoc()) {
            if ($imageNum == 5){
                $imageNum = 1;
            }
            $employees .= '<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.'. $animationNum .'s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="img/team-'. $imageNum .'.jpg" alt="">';
            if ($isLoggedIn and $isLoggedInAsEmployee and isset($conn->query($GetEmployeeLoggedIn)->fetch_assoc()['RoleName']) and
                $conn->query($GetEmployeeLoggedIn)->fetch_assoc()['RoleName'] == 'Manager'){
                $employees .= '<a id="pen'. $empNo .'" class="edit-icon position-absolute top-0 end-0 p-2">
                            <i class="fas fa-pencil-alt"></i>
                        </a>';
            }
            $employees .= '
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">' .$emp['FName'] . ' ' . $emp['LName']. '</h5>
                        </h5>
                        <small>' . $emp['RoleName'] . '</small>
                    </div>
                </div>
            </div>';
            $imageNum++;
            $animationNum++;
            $empNo++;
        }
        $empNo--;
    }
?>
