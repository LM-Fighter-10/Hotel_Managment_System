<!DOCTYPE html>
<html lang="en">
<?php
    include_once "connect.php";
    include 'Queries.php';
    include 'codeBlocks.php';
    $loginError = "";
    $script = "";
    $erroDiv = '<div style="display: none" id="LoginErrorMsg" class="alert alert-danger" role="alert"></div>';
    if (isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $userId = $_POST['userId'];
        echo $email;
        $getCustomersForLogIn = "SELECT * FROM `customer` WHERE Email = '$email' AND CustomerID = '$userId'";
        $getEmployeesForLogIn = "SELECT * FROM `employee` WHERE Email = '$email' AND EID = '$userId'";
        $resultEmp = $conn->query($getEmployeesForLogIn);
        $resultCus = $conn->query($getCustomersForLogIn);
        if ($resultCus->num_rows == 0 && $resultEmp->num_rows == 0){
            $loginError = "Wrong Email or User ID";
            $erroDiv = '<div style="display: block" id="LoginErrorMsg" class="alert alert-danger" role="alert">'
                .$loginError.'</div>';
        }else{
            echo "Session Started";
            $_SESSION['username'] = $userId;
            $loginError = "";
            $erroDiv = '<div style="display: none" id="LoginErrorMsg" class="alert alert-danger" role="alert"></div>';
            header("Location: index.php");
            exit();
        }
    }
?>
<head>
    <?=$headerBlock?>
</head>
<style>
    .login_RegBtn{
        display: none !important;
    }
    .login-body{
        background-image: url(img/login_cover.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        position: relative; /* Ensure positioning context for pseudo-element */
    }
    .footer{
        padding-top: 0px !important;
        margin-top: 40px !important;
    }
    .alert{
        width: 100%;
        text-align: center;
    }
    .social-account-container-a{
        color: #FEA116;
    }
</style>
<body1>
    <div class="bg-white p-0">
        <?=$navBarBlock?>
        <div class="login-body">
            <div class="signUp-container">
                <div class="heading signUp-heading">Register</div>
                <?=$erroDiv?>
                <form class="signUp-form" autocomplete="off">
                    <div class="signUp-flex">
                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" class="input">
                            <span>Firstname</span>
                        </label>

                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" class="input">
                            <span>Lastname</span>
                        </label>
                    </div>

                    <label>
                        <input aria-autocomplete="none" autocomplete="one-time-code"
                               required="" placeholder="" type="email" class="input error">
                        <span class="">Email</span>
                    </label>

                    <div class="signUp-flex">
                        <label style="width: 36%">
                            <div class="paste-button">
                                <button type="button" class="button"><span id="selectedG">Gender</span><span>▼</span></button>
                              <div class="dropdown-content">
                                <button type="button" id="top">Male</button>
                                <button type="button" id="middle">Female</button>
                              </div>
                            </div>
                        </label>

                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" class="input">
                            <span>Phone Number</span>
                        </label>
                    </div>

                    <label>
                        <input aria-autocomplete="none" autocomplete="nothing"
                               required="" placeholder="" type="text" class="input">
                        <span>Contact Number</span>
                    </label>
                    <div class="signUp-flex">
                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" class="input">
                            <span>Country</span>
                        </label>

                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" class="input">
                            <span>City</span>
                        </label>
                    </div>
                    <div class="signUp-flex">
                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" class="input">
                            <span>State</span>
                        </label>

                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" class="input">
                            <span>Zip Code</span>
                        </label>
                    </div>
                    <button class="signUp-submit">Submit</button>
                    <p class="alreadHaveAccount">Already have an acount ? <a href="login.php">Sign In</a> </p>
                </form>
            </div>
        </div>
        <?=$footerBlock?>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- Scripts -->
    <?=$scriptBlock?>
    <script>
        const inputLabels = $(".signUp-form label .input + span");
        const inputFields = $(".signUp-form label .input");
        document.getElementsByClassName("signUp-submit").onclick = function(){
            let error = false;
            inputFields.each(function(){
                if ($(this).val() === ""){
                    error = true;
                    $(this).addClass("error");
                    $(this).next().addClass("error");
                }else{
                    $(this).removeClass("error");
                    $(this).next().removeClass("error");
                }
            });
            if (!error){
                let data = {
                    firstname: inputFields[0].val(),
                    lastname: inputFields[1].val(),
                    email: inputFields[2].val(),
                    password: inputFields[3].val(),
                    confirmPassword: inputFields[4].val()
                }
                var form = document.getElementById('LoginForm22');
                var formData = new FormData(form);
                formData.append('fName', data.firstname);
                formData.append('lName', data.lastname);
                formData.append('email', data.email);
                formData.append('password', data.password);
                fetch('login.php', {
                    method: 'POST',
                    body: form
                })
            }
        };
        $("#navbarCollapse a").each(function () {
            $(this).removeClass("active");
        });
        $(document).on('mousedown', function (ev) {
            if (!$(ev.target).closest('.button, #top, #middle').length) {
                $(".dropdown-content").hide();
                if ($('.button').hasClass("showGenderButtonBorder"))
                    $('.button').removeClass("showGenderButtonBorder");
            }
        })
        $("#top, #middle").on('click', function(){
            $("#selectedG").text($(this).text());
            $(".dropdown-content").hide();
                if ($('.button').hasClass("showGenderButtonBorder"))
                    $('.button').removeClass("showGenderButtonBorder");
        });
        $(".button").click(function(){
            $(this).toggleClass("showGenderButtonBorder");
            $(".dropdown-content").toggle();
        });
    </script>
</body1>
