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
    $e = "";
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
            <div class="Login-container">
                <div class="heading">Sign In</div>
                <?=$erroDiv?>
                <form id="LoginForm22" class="Login-form" method="POST">
                    <input required="" class="input" type="text" name="userId" id="userId" placeholder="User ID">
                    <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
                    <input class="login-button" type="submit" value="Sign In">
                </form>
                <div class="social-account-container">
                    <a href="signUp.php" class="social-account-container-a">Don't Have An Accout?</a>
                </div>
            </div>
        </div>
        <?=$footerBlock?>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- Scripts -->
    <?=$scriptBlock?>
    <script>
        var LoginError = "";
        var ErrorDiv = document.getElementById('#LoginErrorMsg');
        document.getElementsByClassName("login-button").onclick = function(){
            ErrorDiv.innerHTML = "";
            var form = document.getElementById('LoginForm22');
            var formData = new FormData(form);
            formData.append('email', document.getElementById('#email').value());
            formData.append('userId', document.getElementById('#userId').value());
            fetch('login.php', {
                method: 'POST',
                body: form
            })
        };
        $("#navbarCollapse a").each(function () {
            $(this).removeClass("active");
        });
    </script>
</body1>
