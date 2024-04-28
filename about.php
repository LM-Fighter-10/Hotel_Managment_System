<!DOCTYPE html>
<html lang="en">
<?php
include 'codeBlocks.php';
refreshEmployees();
$result = $conn->query("SELECT * FROM HotelStatusCounts");
while ($row = $result->fetch_assoc()) {
    $roomCount = $row['RoomsCount'];
    $employeeCount = $row['EmployeesCount'];
    $customerCount = $row['CustomersCount'];
}
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
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
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/picture.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-xxl py-5" style="margin-bottom: 200px;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Team</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Staffs</span></h1>
            </div>
            <div class="row g-4 justify-content-center">
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
    $("#navbarCollapse a").each(function () {
        if ($(this).html() === "About"){
            $(this).addClass("active");
        }else{
            $(this).removeClass("active");
        }
    });
</script>
</html>