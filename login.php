<!DOCTYPE html>
<html lang="en">
<?php
    include 'codeBlocks.php';
    $loginError = "";
    $script = "";
    $erroDiv = '<div id="LoginErrorMsg" class="alert alert-danger" role="alert"></div>';
    if (!isset($_SESSION['newCust'])){
        $_SESSION['newCust'] = "";
    }
    if (isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $userId = $_POST['userId'];
        $getCustomersForLogIn = "SELECT * FROM `customer` WHERE Email = '$email' AND CustomerID = '$userId'";
        $getEmployeesForLogIn = "SELECT * FROM `employee` WHERE Email = '$email' AND EID = '$userId'";
        $resultEmp = $conn->query($getEmployeesForLogIn);
        $resultCus = $conn->query($getCustomersForLogIn);
        if ($resultCus->num_rows == 0 && $resultEmp->num_rows == 0){
            $loginError = "Wrong Email or User ID";
            $erroDiv = '<div id="LoginErrorMsg" class="alert alert-danger showAlert" role="alert">'
                .$loginError.'</div>';
        }else{
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
        padding-top: 0 !important;
        margin-top: 40px !important;
    }
    .alert{
        border: none !important;
        overflow: hidden !important;
        padding: 0 !important;
        margin-bottom: 0 !important;
        width: 100%;
        text-align: center;
        transition: all 0.3s ease-in-out;
    }
    .showAlert{
        border: 1px solid transparent !important;
        overflow: visible !important;
        padding: 1rem 1rem !important;
        margin-bottom: 1rem !important;
    }
    .social-account-container-a{
        color: #FEA116;
    }
</style>
<body>
    <div class="bg-white p-0">
        <?=$navBarBlock?>
        <div class="login-body">
            <div class="Login-container">
                <div class="heading">Sign In</div>
                <?=$erroDiv?>
                <form id="LoginForm" class="Login-form" method="POST">
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
        const loginContainer = document.querySelector('.Login-container');
        var newUser = "<?=$_SESSION['newCust']?>";
        if (newUser){
            loginContainer.children[1].classList = "alert alert-success showAlert";
            loginContainer.style.padding = "245px 35px";
            loginContainer.children[1].innerHTML = "Welcome " + newUser;
            setTimeout(() => {
                loginContainer.children[1].classList = "alert alert-success";
                loginContainer.style.padding = "";
                <?php unset($_SESSION['newCust']); ?>
            }, 3000);
            setTimeout(() => {
                loginContainer.children[1].classList = "alert alert-danger";
                loginContainer.children[1].innerHTML = "";
            }, 3300);
        } else if (loginContainer.children[1].innerHTML !== ""){
            setTimeout(() => {
                loginContainer.children[1].classList = "alert alert-danger";
                loginContainer.children[1].innerHTML = "";
            }, 3300);
        } else if (loginContainer.children[1].innerHTML === ""){
            loginContainer.children[1].classList = "alert alert-danger";
            loginContainer.children[1].innerHTML = "";
        }
        var LoginError = "";
        var ErrorDiv = document.getElementById('#LoginErrorMsg');
        $("#navbarCollapse a").each(function () {
            $(this).removeClass("active");
        });
    </script>
</body>
