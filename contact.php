<!DOCTYPE html>
<html lang="en">
<?php
    include 'codeBlocks.php';
    $branches = refreshBranches();
    $info = getBranchInfo(reset($branches)['BranchID']);
?>
<head>
    <?=$headerBlock?>
</head>

<body>

    <?php

    ?>
    <div class="bg-white p-0">
        <?=$navBarBlock?>
        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
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


        <!-- Contact Start -->
        <div class="container-xxl py-5" style="margin-bottom: 135px;">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Contact Us</h6>

                    <h3 class="mb-5"><span class="text-primary text-uppercase">Contact</span> For Any Query</h3>
                </div>
                <div class="row g-4 justify-content-center wow fadeInUp">
                    <!-- Branches List -->
                    <div class="col-md-4 w-auto">
                        <h6 class="section-title text-center text-primary mb-3 text-uppercase w-100">Select Branch</h6>
                        <div class="d-flex flex-wrap flex-column align-items-center w-auto">
                            <?php  foreach ($branches as $branch) : ?>
                                <div class="me-3 mb-3" style="margin-right: 0">
                                    <button id="BR-Btn-<?php echo $branch['BranchID']; ?>" class="BR-button">
                                        <span><?php echo $branch['Name']; ?></span>
                                    </button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4 d-flex justify-content-around mt-4 mb-5">
                            <div class="col-md-4 w-auto wow fadeInLeft">
                                <h6 class="section-title text-start text-primary text-uppercase">Branch Name</h6>
                                <p><i class="fa-solid fa-signature fa-lg me-1" style="color: #FEA116"></i>
                                    <span id="BR-Name"><?php echo $info['Name']; ?></span>
                                </p>
                            </div>

                           <div class="col-md-4 w-auto wow fadeInRight">
                                <h6 class="section-title text-start text-primary text-uppercase">Contact Number</h6>

                               <p><i class="fa fa-phone-alt text-primary me-2"></i><span id="BR-PhNumber"><?php echo $info['ContactNumber']; ?></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 Contact-Map Contact-Map-Show" data-wow-delay="0.1s" id="BR-Map">
                        <iframe class="position-relative rounded w-100 h-100 Contact-Map-iframe"
                        <?php $City = $info['City'];
                            $Country = $info['Country'];
                            $StreetNum = $info['StreetNum'];
                            $address = urlencode("$StreetNum, $City, $Country");
                        ?>
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDoyQ1wd42lR-Bv9MBiwILb5TeuAHGCLU0&q=<?php echo $address?>";
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        <?=$footerBlock?>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- Scripts -->
    <?=$scriptBlock?>
</body>
<script>
    $("#navbarCollapse a").each(function () {
        if ($(this).html() === "Contact"){
            $(this).addClass("active");
        }else{
            $(this).removeClass("active");
        }
    });
</script>
<script>
    <?php  foreach ($branches as $branch) : ?>
        document.getElementById("BR-Btn-<?php echo $branch['BranchID']; ?>").addEventListener
        ("click", function() {
            const mouseoverEvent = new Event('mouseover');
            document.getElementById("BR-Map").classList.remove("Contact-Map-Show");
            setTimeout(() => {
                document.getElementById("BR-Map").classList.add("Contact-Map-Show");
            }, 500);
            document.querySelector("#BR-Name").innerHTML = "<?php echo $branch['Name']; ?>";
            <?php
                $info = getBranchInfo($branch['BranchID']);
                $City = $info['City'];
                $Country = $info['Country'];
                $StreetNum = $info['StreetNum'];
                $address = urlencode("$StreetNum, $City, $Country");
            ?>
            document.querySelector("#BR-PhNumber").innerHTML =
                "<?php echo $info['ContactNumber']; ?>";
            document.getElementById("BR-Map").innerHTML =
                "<iframe class='position-relative rounded w-100 h-100 Contact-Map-iframe' " +
                "src='https://www.google.com/maps/embed/v1/place?key=AIzaSyDoyQ1wd42lR-Bv9MBiwILb5TeuAHGCLU0&q=<?php echo
                $address?>';" +
                "frameborder='0' style='min-height: 350px; border:0;' allowfullscreen='' aria-hidden='false' tabindex='0'>" +
                "</iframe>";
                setTimeout(() => {
                    document.getElementById("BR-Btn-<?php echo $branch['BranchID']; ?>").dispatchEvent(mouseoverEvent);
                }, 3000);
        });
    <?php endforeach; ?>
</script>
</html>