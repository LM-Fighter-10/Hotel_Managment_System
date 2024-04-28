<?php
    include_once "connect.php";
    include 'Queries.php';
    $branches = refreshBranches();
    $info = getBranchInfo(reset($branches)['BranchID']);
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
                            <p class="mb-0"><i class="fa-solid fa-signature fa-lg me-1" style="color: #FEA116"></i>
                                    <span id="BR-Name">'.$info['Name'].'</span>
                                </p>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center py-2">
                            <p class="mb-0"><i class="fa fa-phone-alt text-primary me-2"></i>
                            <span id="BR-PhNumber"> '.$info["ContactNumber"].'</span></p>
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
    <link href="fontawesome-free-6.5.2-web/css/all.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">';
    $footerBlock = '
    <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer wow" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-7">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt" style="margin-right: 8px !important;
                        margin-left: 3.5px !important;"></i>
                        <span>'. $info['StreetNum'] .' '. $info['City'] .', '. $info['Country'] .'</span></p>
                        <p class="mb-2"><i class="fa fa-phone-alt" style="margin-right: 8px !important;"></i>
                            <span id="BR-PhNumber"> '.$info["ContactNumber"].'</span></p>
                        <p class="mb-2"><i class="fa fa-envelope" style="margin-right: 8px !important;"></i>
                        <span>hotelier997@gmail.com</span></p>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="row gy-5 g-4">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Company</h6>
                                <a class="btn btn-link" href="about.php">About Us</a>
                                <a class="btn btn-link" href="contact.php">Contact Us</a>
                            </div>
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">Services</h6>';
    $services = $conn->query($SelectingAllServices);
    while ($service = $services->fetch_assoc()){
        $footerBlock .= '<a class="btn btn-link" href="service.php">'.$service['Name'].'</a>';
    }
    $footerBlock .= '</div>
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

    function refreshRooms() {
        global $conn, $rooms, $SelectingRoomStatus, $isLoggedIn, $isLoggedInAsEmployee, $roomInd;
        $resultStatus =$conn->query($SelectingRoomStatus);
        $rooms = "";
        $roomInd = 1;
        while($room =$resultStatus->fetch_assoc()){
            if ($roomInd == 4){
                $roomInd = 1;
            }
            $rooms = $rooms.
                '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.'. $roomInd .'s">
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
                                <a id="penR'. $roomInd .'" class="edit-icon top-0 end-0 p-0">
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
        }
        $roomInd--;
    }

    function refreshEmployees() {
        global $conn, $employees, $SelectingAllEmployeeFullName, $isLoggedIn, $GetEmployeeLoggedIn, $isLoggedInAsEmployee, $empNo;
        $Emp_query_run = $conn->query($SelectingAllEmployeeFullName);
        $employees = "";
        $imageNum = 1;$animationNum = 1;
        $empNo = 1;
        while($emp = $Emp_query_run->fetch_assoc()) {
            if ($imageNum == 7){
                $imageNum = 1;
            }
            $employees .= '<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.'. $animationNum .'s">
                <div class="rounded shadow overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="img/team-'. $imageNum .'.jpg" alt="">
                        ';          
            if ($isLoggedIn and $isLoggedInAsEmployee and isset($conn->query($GetEmployeeLoggedIn)->fetch_assoc()['RoleName']) and
                $conn->query($GetEmployeeLoggedIn)->fetch_assoc()['RoleName'] == 'Manager'){
                
                $employees .= ' 
                            <a id="penE'. $empNo .'" class="edit-icon position-absolute top-0 end-0 p-2">
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
                    <div class="text-center p-4 mt-3" id="Fullname">
                        <h5 class="fw-bold mb-0"  id="FN'.$empNo.'">' .$emp['FName'] . '</h5>
                        <h5 class="fw-bold mb-0"  id="LN'.$empNo.'">' .$emp['LName'] . '</h5>
                        </h5>
                    </div>
                    <div class="text-center p-4 mt-3 d-none">   
                    <span id="Employeeid'. $empNo .'">'.$emp["EID"].'</span><br>
                    <span id="RN'. $empNo .'">'.$emp["RoleName"].'</span><br>
                    <span id="Working_hours'. $empNo .'">'.$emp["WorkingHours"].'</span><br>
                    <span id="phoneNum'. $empNo .'">'.$emp["Phone"].'</span><br>
                    <span id="Email'. $empNo .'">'.$emp["Email"].'</span><br>
                    <span id="Salary'. $empNo .'">'.$emp["Salary"].'</span><br>
                    <span id="City'. $empNo .'">'.$emp["City"].'</span>
                    <span id="Country'. $empNo .'">'.$emp["Country"].'</span> <br>
                    <span id="State'. $empNo .'">'.$emp["State"].'</span>
                    <span id="Zip_Code'. $empNo .'">'.$emp["ZipCode"].'</span>
                    <span id="service-ID'. $empNo .'">'.$emp["ServiceID"].'</span><br>
                    <span id="restaurant-ID'. $empNo .'">'.$emp["RestaurantID"].'</span>
                       
                    </div>
                </div>
            </div>';
            $imageNum++;
            $animationNum++;
            $empNo++;
        }
        $empNo--;
    }

    function refreshServices() {
        global $conn, $services, $SelectingAllServices, $serviceInd;
        $resultServices = $conn->query($SelectingAllServices);
        $services = "";
        $serviceInd = 1;
        $icons = array("fa-futbol", "fa-birthday-cake", "fa-spa", "fa-dumbbell", "fa-utensils", "fa-hotel");
        while($service =$resultServices->fetch_assoc()){
            if ($serviceInd == 7){
                $serviceInd = 1;
            }
            $services .=
                '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.'. $serviceInd .'s">
                        <div class="service-item rounded user-select-none">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa '. $icons[$serviceInd-1] .' fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">'. $service['Name'] .'</h5><div class="d-flex justify-content-around m-2">';
            if ($service['isExternal'] == 1){
                $services .= '<span> <i class="fa-solid fa-square-up-right p-1 fa-lg" style="color: #fea116;"></i>
                                <span style="padding-left: 0.4rem">External</span>';
            }else{
                $services .= '<span> <i class="fa-solid fa-square-up-right p-1 fa-lg fa-rotate-180" 
                                style="color: #fea116;"></i><span style="padding-left: 0.4rem">Internal</span>';
            }
            $services .=        '</span><span><i class="fa-solid fa-code-branch fa-lg p-1" style="color: #fea116;"></i>
                                <span>'. $service['BranchID'] .'</span></span>
                                </div>
                                <span class="m-2"><i class="fa-solid fa-business-time p-1 fa-lg" style="color: #fea116;"></i>
                                <span class="m-2">'. $service['OperatingHours'] .'</span></span>
                                <span class="m-2"><i class="fa-solid fa-location-crosshairs fa-lg p-1" style="color: #fea116;"></i>
                                <span class="m-2">'. $service['Location'] .'</span></span>
                                <div class="d-flex justify-content-around m-2">
                                    <span><i class="fa-solid fa-phone fa-lg p-1" style="color: #fea116;"></i>
                                    <span>'. $service['ContactNumber'] .'</span></span>
                                    <span><i class="fa-solid fa-money-bill p-1" style="color: #fea116;"></i>
                                    <span>'. $service['PriceRange'] .'</span></span>
                                </div>
                            </div>
                        </div>';
            $serviceInd++;
        }
        $serviceInd--;
    }

    function refreshBranches() {
        global $conn;
        $result = $conn->query("SELECT BranchID, Name FROM Hotel");
        if ($result->num_rows > 0) {
            $branches = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $branches;
    }

    function getBranchInfo($BranchID) {
        global $conn;
        $query = "SELECT StreetNum,City, Country, ContactNumber, Name FROM Hotel WHERE BranchID = '$BranchID'";
        $result = $conn->query($query);
        return (mysqli_fetch_assoc($result));
    }

    function editRoom() {
        global $roomInd;
        return "<script>
    const roomEditForm = document.getElementById('RoomEditForm');
    const roomEditBackgroundDiv = document.getElementById('backgroundCover');
    const roomNumber = document.getElementById('roomNumber');
    const branchId = document.getElementById('branchId');
    const pricePerNight = document.getElementById('pricePerNight');
    const roomCapacit = document.getElementById('roomCapacity');
    const roomStatus = document.getElementById('status');
    var selectedRoomNum = '';

    function roomsScript() {
        document.getElementById('exitEdit1').onclick = function () {
            if (roomEditForm.classList.contains('showRoomEditForm'))
                roomEditForm.classList.remove('showRoomEditForm');
            if (roomEditBackgroundDiv.classList.contains('showBackground-cover'))
                roomEditBackgroundDiv.classList.remove('showBackground-cover');
            document.body.style.overflow = '';
            document.getElementById('EditErrorMsg1').classList.remove('showEditErrorMsg');
            // roomNumber.value = ''; branchId.value = ''; pricePerNight.value = '';
            roomNumber.parentNode.children[1].style.color = '';
            branchId.parentNode.children[1].style.color = '';
            pricePerNight.parentNode.children[1].style.color = '';
            roomCapacit.selectedIndex = 0;
            roomStatus.selectedIndex = 0;
        }
        for (let x = 1; x <= $roomInd; x++) {
            document.getElementById(\"penR\" + x).onclick = function () {
                document.getElementById('EditErrorMsg1').classList.remove('showEditErrorMsg');
                document.getElementById('EditErrorMsg1').innerHTML = '';
                selectedRoomNum = this.parentNode.children[0].innerHTML.replace('Room ', '')
                roomEditForm.classList.add('showRoomEditForm');
                roomNumber.value = selectedRoomNum;
                roomNumber.focus();
                branchId.value = document.getElementById('RoomBranchID' + x).innerHTML;
                pricePerNight.value = document.getElementById('RoomPricePerNight' + x).innerHTML;
                if (document.getElementById('RoomCapacity' + x).innerHTML === 'Single') {
                    roomCapacit.selectedIndex = 0;
                } else if (document.getElementById('RoomCapacity' + x).innerHTML === 'Double') {
                    roomCapacit.selectedIndex = 1;
                } else if (document.getElementById('RoomCapacity' + x).innerHTML === 'Triple') {
                    roomCapacit.selectedIndex = 2;
                } else if (document.getElementById('RoomCapacity' + x).innerHTML === 'Suite') {
                    roomCapacit.selectedIndex = 3;
                }
                if (document.getElementById('RoomStatus' + x).innerHTML === 'Available') {
                    roomStatus.selectedIndex = 0;
                } else if (document.getElementById('RoomStatus' + x).innerHTML === 'Occupied') {
                    roomStatus.selectedIndex = 1;
                } else if (document.getElementById('RoomStatus' + x).innerHTML === 'Under Maintenance') {
                    roomStatus.selectedIndex = 2;
                }

                roomEditBackgroundDiv.classList.add('showBackground-cover');
                document.body.style.overflow = 'hidden';
            }
        }
    }

    var pricePerNightErrorMsg = '', branchIdErrorMsg = '', roomNumberErrorMsg = '';
    // Function to validate input fields
    function validateInputs() {

        // Send data to PHP script for validation via fetch
        fetch('validateEditRoom.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                roomNumber: roomNumber.value,
                branchId: branchId.value,
                pricePerNight: pricePerNight.value
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.branchIdError || data.pricePerNightError) {
                document.getElementById('EditErrorMsg1').classList.add('showEditErrorMsg');
                if (data.branchIdError){
                    branchIdErrorMsg = data.branchIdErrorMsg;
                    if (!document.getElementById('EditErrorMsg1').innerHTML
                        .includes('<span>' + data.branchIdErrorMsg + '</span>')){
                        document.getElementById('EditErrorMsg1').innerHTML +=
                            '<span>' + data.branchIdErrorMsg + '</span>';
                    }
                } else{
                    document.getElementById('EditErrorMsg1').innerHTML =
                        document.getElementById('EditErrorMsg1').innerHTML
                            .replace('<span>' + branchIdErrorMsg + '</span>', '');
                }
                if (data.pricePerNightError){
                    pricePerNightErrorMsg = data.pricePerNightErrorMsg;
                    if (!document.getElementById('EditErrorMsg1').innerHTML
                        .includes('<span>' + data.pricePerNightErrorMsg + '</span>')){
                        document.getElementById('EditErrorMsg1').innerHTML +=
                            '<span>' + data.pricePerNightErrorMsg + '</span>';
                    }
                } else{
                    document.getElementById('EditErrorMsg1').innerHTML =
                        document.getElementById('EditErrorMsg1').innerHTML
                            .replace('<span>' + pricePerNightErrorMsg + '</span>', '');
                }
            } else {
                document.getElementById('EditErrorMsg1').classList.remove('showEditErrorMsg');
                document.getElementById('EditErrorMsg1').innerHTML = '';
            }
            // Update label colors based on validation results
            document.getElementById('branchIdLabel').style.color = data.branchIdError ? 'red' : '';
            document.getElementById('pricePerNightLabel').style.color = data.pricePerNightError ? 'red' : '';
        });
    }

    roomsScript();

    // Add event listeners to input fields to trigger validation
    document.getElementById('branchId').addEventListener('input', validateInputs);
    document.getElementById('pricePerNight').addEventListener('input', validateInputs);

    document.getElementById('roomEditSubmitBtn').onclick = function () {
        validateInputs();
        if (document.getElementById('EditErrorMsg1').innerHTML === ''){
            fetch('roomEditSubmit.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    roomNumber: selectedRoomNum,
                    branchId: branchId.value,
                    pricePerNight: pricePerNight.value,
                    capacity: roomCapacit.value,
                    status: roomStatus.value
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success){
                    document.getElementById('exitEdit1').click();
                    // location.reload();
                    document.getElementById('roomsContainer').innerHTML = data.rooms;
                    roomsScript();
                }
            });
        }
    }
    </script>";
    }

    function editEmployee() {
        global $empNo;
       return "<script>

    const employeeEditForm = document.getElementById('EmployeeEditForm');
    const employeeEditBackgroundDiv = document.getElementById('backgroundCover2');
    const employeeNumber = document.getElementById('employeeNumber');
    const fname = document.getElementById('fname');
    const lname = document.getElementById('lname');
    const rolename = document.getElementById('rolename');
    const workinghours =document.getElementById('workinghours');
    const salary =document.getElementById('salary');

    const phone =document.getElementById('phone');
    const email =document.getElementById('email');
    const country =document.getElementById('country');
    const city =document.getElementById('city');
    const state =document.getElementById('state');
    const zipcode =document.getElementById('zipcode');
    const serviceID =document.getElementById('serviceID');
    const restaurantID =document.getElementById('restaurantID');
    var selectedEmployeeNum = '';


    function EmployeeScript() {
        document.getElementById('exitEdit2').onclick = function () {
            if (employeeEditForm.classList.contains('showEmployeeEditForm'))
                employeeEditForm.classList.remove('showEmployeeEditForm');
            if (employeeEditBackgroundDiv.classList.contains('showBackground-cover'))
                employeeEditBackgroundDiv.classList.remove('showBackground-cover');
            document.body.style.overflow = '';
            document.getElementById('EditErrorMsg2').classList.remove('showEditErrorMsg');

            employeeNumber.parentNode.children[1].style.color = '';
            fname.parentNode.children[1].style.color = '';
            lname.parentNode.children[1].style.color = '';
            rolename.parentNode.children[1].style.color = '';
            workinghours.parentNode.children[1].style.color = '';
            salary.parentNode.children[1].style.color='';
            phone.parentNode.children[1].style.color ='';
            country.parentNode.children[1].style.color ='';
            city.parentNode.children[1].style.color ='';
            state.parentNode.children[1].style.color ='';
            zipcode.parentNode.children[1].style.color ='';
            restaurantID.parentNode.children[1].style.color ='';
            serviceID.parentNode.children[1].style.color ='';

        }
        for (let x = 1; x <= $empNo; x++) {
            // const penElement = document.getElementById('penE' + x);
            // if(penElement !== null)
            document.getElementById('penE' + x).onclick = function () {
                document.getElementById('EditErrorMsg2').classList.remove('showEditErrorMsg');
                document.getElementById('EditErrorMsg2').innerHTML = '';
                selectedEmployeeNum = document.getElementById('Employeeid'+x).innerHTML;
                employeeEditForm.classList.add('showEmployeeEditForm');
                employeeNumber.value = selectedEmployeeNum;
                employeeNumber.focus();
                fname.value = document.getElementById('FN' + x).innerHTML;
                lname.value = document.getElementById('LN' + x).innerHTML;
                rolename.value =document.getElementById('RN' + x).innerHTML;
                workinghours.value =document.getElementById('Working_hours' + x).innerHTML;
                salary.value=document.getElementById('Salary' + x).innerHTML;
                phone.value =document.getElementById('phoneNum' + x).innerHTML;
                email.value =document.getElementById('Email' + x).innerHTML;
                country.value =document.getElementById('Country' + x).innerHTML;
                city.value =document.getElementById('City' + x).innerHTML;
                state.value =document.getElementById('State' + x).innerHTML;
                zipcode.value =document.getElementById('Zip_Code' + x).innerHTML;
                serviceID.value =document.getElementById('service-ID' + x).innerHTML;
                restaurantID.value =document.getElementById('restaurant-ID' + x).innerHTML;

                employeeEditBackgroundDiv.classList.add('showBackground-cover');
                document.body.style.overflow = 'hidden';
            }
        }
    }

    var fname_errMsg='', lname_errMsg='', Rname_errMsg='',workingh_ErrorMsg = '', salary_errorMsg=''
    country_errMsg='', city_errMsg='', state_errMsg ='', zipcode_errMsg='', phone_errMsg='', email_errMsg='', email_empty_errMsg='', serviceId_errMsg = '', restaurantId_errMsg = '';

    function validateInputs() {

    // Send data to PHP script for validation via fetch
        fetch('validateEditEmployee.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                employeeNumber: employeeNumber.value,
                fname:fname.value,
                lname:lname.value,
                rolename:rolename.value,
                workinghours:workinghours.value,
                phone:phone.value,
                email:email.value,
                salary:salary.value,
                city:city.value,
                state:state.value,
                country:country.value,
                zipcode:zipcode.value,
                serviceID:serviceID.value,
                restaurantID:restaurantID.value
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.restaurantId_error);
            if (data.workingh_error || data.FirstName_error || data.LastName_error || data.RoleName_error || data
                    .salary_error|| data.country_error || data.email_error || data.restaurantId_error ||
                    data.serviceId_error || data.city_error || data.state_error|| data.zipcode_error
                    || data.phone_error) {
                document.getElementById('EditErrorMsg2').classList.add('showEditErrorMsg');

                if (data.workingh_error){
                    workingh_ErrorMsg = data.workingh_ErrorMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + data.workingh_ErrorMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + data.workingh_ErrorMsg + '</span>';
                    }
                    if (workinghours.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>Working hours cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + workingh_ErrorMsg + '</span>', '');
                }


                if (data.salary_error){
                    salary_errorMsg = data.salary_errorMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + data.salary_errorMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + data.salary_errorMsg + '</span>';
                    }
                    if (salary.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>Salary cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + salary_errorMsg + '</span>', '');
                }

                if (data.FirstName_error){
                    fname_errMsg = data.fname_errMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + data.fname_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + data.fname_errMsg + '</span>';
                    }
                    if (fname.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>First Name cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + fname_errMsg + '</span>', '');
                }

                if (data.RoleName_error){
                    Rname_errMsg= data.Rname_errMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + data.Rname_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + data.Rname_errMsg + '</span>';
                    }
                    if (rolename.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>Role Name cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + Rname_errMsg + '</span>', '');
                }

                if (data.city_error){
                    city_errMsg = data.city_errMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + data.city_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + data.city_errMsg + '</span>';
                    }
                    if (city.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>City cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + city_errMsg + '</span>', '');
                }
                if (data.state_error){
                    state_errMsg = data.state_errMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + data.state_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + data.state_errMsg + '</span>';
                    }
                    if (state.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>State cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + state_errMsg + '</span>', '');
                }

                if (data.zipcode_error){
                   zipcode_errMsg = data.zipcode_errMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + data.zipcode_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + data.zipcode_errMsg + '</span>';
                    }
                    if (zipcode.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>Zip code cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + zipcode_errMsg + '</span>', '');
                }

                if (data.phone_error){
                   phone_errMsg = data.phone_errMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + data.phone_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + data.phone_errMsg + '</span>';
                    }
                    if (phone.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>Phone Number cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + phone_errMsg + '</span>', '');
                }

                if (data.LastName_error){
                    lname_errMsg = data.lname_errMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + data.lname_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + data.lname_errMsg + '</span>';
                    }
                    if (lname.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>Last Name cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                        document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + lname_errMsg + '</span>', '');
                }

                if (data.email_error){
                    email_errMsg= data.email_errorMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + email_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + email_errMsg + '</span>';
                    }
                    if (email.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>Email cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + email_errMsg + '</span>', '');
                }

                if (data.country_error){
                    country_errMsg = data.country_errMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + data.country_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + data.country_errMsg + '</span>';
                    }
                    if (country.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>Country cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + country_errMsg + '</span>', '');
                }

                if (data.serviceId_error){
                    serviceId_errMsg = data.serviceId_errorMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + serviceId_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + serviceId_errMsg + '</span>';
                    }
                    if (serviceID.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>Services id cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + serviceId_errMsg + '</span>', '');
                }

                if (data.restaurantId_error){
                    restaurantId_errMsg = data.restaurantId_errorMsg;
                    if (!document.getElementById('EditErrorMsg2').innerHTML
                        .includes('<span>' + restaurantId_errMsg + '</span>')){
                        document.getElementById('EditErrorMsg2').innerHTML +=
                            '<span>' + restaurantId_errMsg + '</span>';
                    }
                    if (restaurantID.value !== ''){
                        document.getElementById('EditErrorMsg2').innerHTML =
                            document.getElementById('EditErrorMsg2').innerHTML
                                .replace('<span>Restaurant id cannot be empty</span>', '');
                    }
                } else{
                    document.getElementById('EditErrorMsg2').innerHTML =
                    document.getElementById('EditErrorMsg2').innerHTML
                            .replace('<span>' + restaurantId_errMsg + '</span>', '');
                }

            } else {
                document.getElementById('EditErrorMsg2').classList.remove('showEditErrorMsg');
                document.getElementById('EditErrorMsg2').innerHTML = '';
            }
            // Update label colors based on validation results
            document.getElementById('workinghlabel').style.color = data.workingh_error ? 'red' : '';
            document.getElementById('FnameLabel').style.color = data.FirstName_error ? 'red' : '';
            document.getElementById('lnameLabel').style.color = data.LastName_error ? 'red' : '';
            document.getElementById('RolenameLabel').style.color = data.RoleName_error ? 'red' : '';
            document.getElementById('salarylabel').style.color = data.salary_error ? 'red' : '';
            document.getElementById('countrylabel').style.color = data.country_error ? 'red' : '';
            document.getElementById('citylabel').style.color = data.city_error ? 'red' : '';
            document.getElementById('statelabel').style.color = data.state_error ? 'red' : '';
            document.getElementById('zipcodelabel').style.color = data.zipcode_error ? 'red' : '';
            document.getElementById('phonelabel').style.color = data.phone_error ? 'red' : '';
            document.getElementById('emaillabel').style.color = data.email_error ? 'red' : '';
            document.getElementById('sidlabel').style.color = data.serviceId_error ? 'red' : '';
            document.getElementById('ridlabel').style.color = data.restaurantId_error ? 'red' : '';
        });
    }

    EmployeeScript();

    fname.addEventListener('input', validateInputs); lname.addEventListener('input', validateInputs);
    email.addEventListener('input', validateInputs); rolename.addEventListener('input', validateInputs);
    workinghours.addEventListener('input', validateInputs); salary.addEventListener('input', validateInputs);
    country.addEventListener('input', validateInputs); city.addEventListener('input', validateInputs);
    state.addEventListener('input', validateInputs); zipcode.addEventListener('input', validateInputs);
    phone.addEventListener('input', validateInputs); serviceID.addEventListener('input', validateInputs);
    restaurantID.addEventListener('input', validateInputs);
    document.getElementById('EmployeeEditSubmitBtn').onclick = function () {
        validateInputs();
        if (document.getElementById('EditErrorMsg2').innerHTML === '') {
            if (document.getElementById('EditErrorMsg2').innerHTML === '') {
                fetch('EmployeeEditSubmit.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        employeeNumber: selectedEmployeeNum,
                        fname: fname.value,
                        lname: lname.value,
                        rolename: rolename.value,
                        workinghours: workinghours.value,
                        salary: salary.value,
                        country: country.value,
                        city: city.value,
                        state: state.value,
                        zipcode: zipcode.value,
                        phone: phone.value,
                        email: email.value,
                        serviceID: serviceID.value,
                        restaurantID: restaurantID.value
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('exitEdit2').click();
                            document.getElementById('employeesContainer').innerHTML = data.employee;
                            EmployeeScript();
                        }
                    });
            }
        }
    }
    </script>";
    }

    function getRoom_Emp_Cust_Count() {
        global $conn, $roomCount, $employeeCount, $customerCount;
        $result = $conn->query("SELECT * FROM HotelStatusCounts");
        while ($row = $result->fetch_assoc()) {
            $roomCount = $row['RoomsCount'];
            $employeeCount = $row['EmployeesCount'];
            $customerCount = $row['CustomersCount'];
        }
    }
?>
