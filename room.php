<!DOCTYPE html>
<html lang="en">
<?php
    include 'codeBlocks.php';
    refreshRooms();
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Rooms</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a style="color: #FEA116">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Rooms</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
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

        <?=$footerBlock?>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?=$scriptBlock?>
</body>
<script>
    $("#navbarCollapse a").each(function () {
        if ($(this).html() === "Rooms"){
            $(this).addClass("active");
        }else{
            $(this).removeClass("active");
        }
    });
</script>
    <?=editRoom()?>
</html>