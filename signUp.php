<!DOCTYPE html>
<html lang="en">
<?php
    include 'codeBlocks.php';
    $script = "";
    if (isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $CustID = getNewCustID($conn);
        $email = $_POST['Email'];
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $Gender = $_POST['Gender'];
        $Phone_Number = $_POST['Phone_Number'];
        $Contact_Number = $_POST['Contact_Number'];
        $Country = $_POST['Country'];
        $City = $_POST['City'];
        $State = $_POST['State'];
        $Zip_Code = $_POST['Zip_Code'];
        AddCustomer($CustID, $Firstname, $Lastname, $Gender, $email, $Phone_Number,
            $Contact_Number, $Country, $City, $State, $Zip_Code, $conn);
        $_SESSION['newCust'] = $Firstname." ".$Lastname;
        header("Location: login.php");
        exit();
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

    .error-label {
        color: red !important;
    }
    .error-input {
        border-color: red !important;
    }
    #RegErrorMsg{
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow: hidden;
        height: 0;
        padding: 0;
        margin-bottom: 0;
        border: none;
        transition: all 0.3s ease-in-out;
    }
    .showRegErrorMsg{
        height: auto !important;
        padding: 1rem 1rem !important;
        margin-bottom: 1rem !important;
        border: 1px solid transparent !important;
    }
    .social-account-container-a{
        color: #FEA116;
    }
</style>
<body>
    <div class="bg-white p-0">
        <?=$navBarBlock?>
        <div class="login-body">
            <div class="signUp-container">
                <div class="heading signUp-heading">Register</div>
                <div id="RegErrorMsg" class="alert alert-danger" role="alert"></div>
                <form method="POST" class="signUp-form" id="registerForm" autocomplete="off">
                    <div class="signUp-flex">
                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" id="Firstname" class="input" name="Firstname">
                            <span class="field-label">Firstname</span>
                        </label>

                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" id="Lastname" class="input" name="Lastname">
                            <span class="field-label">Lastname</span>
                        </label>
                    </div>

                    <label>
                        <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                               placeholder="" type="email" id="Email" class="input error" name="Email">
                        <span class="field-label">Email</span>
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

                        <label style="width: 60.5%;">
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" id="Phone Number" class="input" name="Phone Number">
                            <span class="field-label">Phone Number</span>
                        </label>
                    </div>

                    <label>
                        <input aria-autocomplete="none" autocomplete="nothing"
                               placeholder="" type="text" id="Contact Number" class="input" name="Contact Number">
                        <span class="field-label">Contact Number (Optional)</span>
                    </label>
                    <div class="signUp-flex">
                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" id="Country" class="input" name="Country">
                            <span class="field-label">Country</span>
                        </label>

                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" id="City" class="input" name="City">
                            <span class="field-label">City</span>
                        </label>
                    </div>
                    <div class="signUp-flex">
                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" id="State" class="input" name="State">
                            <span class="field-label">State</span>
                        </label>

                        <label>
                            <input aria-autocomplete="none" autocomplete="one-time-code" required=""
                                   placeholder="" type="text" id="Zip_Code" class="input" name="Zip Code">
                            <span class="field-label">Zip Code</span>
                        </label>
                    </div>
                    <button id="signUpSubmit" type="submit" class="signUp-submit">Submit</button>
<!--                    <p class="alreadHaveAccount">Already have an acount ? <a href="login.php">Sign In</a> </p>-->
                    <div class="social-account-container">
                        <a href="login.php" class="social-account-container-a">Don't Have An Accout?</a>
                    </div>
                </form>
            </div>
        </div>
        <?=$footerBlock?>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <!-- Scripts -->
    <?=$scriptBlock?>
    <script> // FORM VALIDATION
        const form = document.querySelector('.signUp-form');
        const inputs = form.querySelectorAll('input');
        const errorList = document.querySelector('#RegErrorMsg');
        errorList.innerHTML = "";

        // Function to validate email
        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        // Function to display error message
        function showError(input, message) {
            if (!errorList.innerHTML.includes('<span>' + message + '</span>')) {
                errorList.innerHTML += '<span>' + message + '</span>';
            }
            input.classList.add('error-input');
            const parent = input.parentNode;
            const errorElement = parent.querySelector('.field-label');
            if (!errorElement.classList.contains('error-label')) {
                errorElement.classList.add('error-label');
            }
            if (errorList.innerHTML !== ""){
                errorList.classList.add('showRegErrorMsg');
            } else {
                errorList.classList.remove('showRegErrorMsg');
            }
        }

        function clearErrorMessage(input, message) {
            if (errorList.innerHTML.includes('<span>' + message + '</span>')) {
                errorList.innerHTML = errorList.innerHTML.replace('<span>' + message + '</span>', '');
            }
            input.classList.remove('error-input');
            const parent = input.parentNode;
            const errorElement = parent.querySelector('.field-label');
            if (errorElement.classList.contains('error-label')) {
                errorElement.classList.remove('error-label');
            }
            if (errorList.innerHTML !== ""){
                errorList.classList.add('showRegErrorMsg');
            } else {
                errorList.classList.remove('showRegErrorMsg');
            }
        }

        // Function to clear error message
        function clearError(input) {
            // errorList.classList.remove('showRegErrorMsg');
            input.classList.remove('error-input');
            const parent = input.parentNode;
            const errorElement = parent.querySelector('.field-label');
            if (errorElement.classList.contains('error-label')) {
                errorElement.classList.remove('error-label');
            }
        }

        function checkValidInput(input, mode) {
            if (!input.value && input.name !== 'Contact Number') {
                showError(input, input.name + ' field is required');
                if (mode === 'submit')
                    return false;
            } else if (input.value) {
                clearErrorMessage(input, input.name + ' field is required');
                if (input.name === 'Email' && !validateEmail(input.value)) {
                    showError(input, 'Please enter a valid email');
                    if (mode === 'submit')
                        return false;
                } else if (input.name === 'Email' && validateEmail(input.value)) {
                    clearErrorMessage(input, 'Please enter a valid email');
                }
                if (input.name === 'Firstname' && /\d/.test(input.value)) {
                    showError(input, 'Firstname must not contain any numbers');
                    if (mode === 'submit')
                        return false;
                } else if (input.name === 'Firstname' && !/\d/.test(input.value)) {
                    clearErrorMessage(input, 'Firstname must not contain any numbers');
                }
                if (input.name === 'Lastname' && /\d/.test(input.value)) {
                    showError(input, 'Lastname must not contain any numbers');
                    if (mode === 'submit')
                        return false;
                } else if (input.name === 'Lastname' && !/\d/.test(input.value)) {
                    clearErrorMessage(input, 'Lastname must not contain any numbers');
                }
                if (input.name === 'Phone Number' && !/^(?:\+?\d+\.?\d*|\d*\.?\d+)$/.test(input.value)) {
                    showError(input, 'Phone Number must contain only numbers');
                    if (mode === 'submit')
                        return false;
                } else if (input.name === 'Phone Number' && /^(?:\+?\d+\.?\d*|\d*\.?\d+)$/.test(input.value)) {
                    clearErrorMessage(input, 'Phone Number must contain only numbers');
                }
                if (input.name === 'Contact Number' && !/^(?:\+?\d+\.?\d*|\d*\.?\d+)$/.test(input.value)) {
                    showError(input, 'Contact Number must contain only numbers');
                    if (mode === 'submit')
                        return false;
                } else if (input.name === 'Contact Number' && /^(?:\+?\d+\.?\d*|\d*\.?\d+)$/.test(input.value)) {
                    clearErrorMessage(input, 'Contact Number must contain only numbers');
                }
                if (input.name === 'Country' && /\d/.test(input.value)) {
                    showError(input, 'Country must not contain any numbers');
                    if (mode === 'submit')
                        return false;
                } else if (input.name === 'Country' && !/\d/.test(input.value)) {
                    clearErrorMessage(input, 'Country must not contain any numbers');
                }
                if (input.name === 'City' && /\d/.test(input.value)) {
                    showError(input, 'City must not contain any numbers');
                    if (mode === 'submit')
                        return false;
                } else if (input.name === 'City' && !/\d/.test(input.value)) {
                    clearErrorMessage(input, 'City must not contain any numbers');
                }
                if (input.name === 'State' && /\d/.test(input.value)) {
                    showError(input, 'State must not contain any numbers');
                    if (mode === 'submit')
                        return false;
                } else if (input.name === 'State' && !/\d/.test(input.value)) {
                    clearErrorMessage(input, 'State must not contain any numbers');
                }
            }
            return true;
        }

        // Event listeners for each input
        inputs.forEach(input => {
            input.addEventListener('input', () => {
                // clearError(input);
                checkValidInput(input, '');
            });
        });
        const Gender = document.getElementById('selectedG');
        // Form Submission
        document.getElementById("signUpSubmit").onclick = function(){
            let validForm = false;
            inputs.forEach(input => {
                // clearError(input);
                validForm = checkValidInput(input, 'submit');
            });
            if (validForm && Gender.innerHTML !== "Gender") {
                errorList.classList.remove('showRegErrorMsg');
            } else if (Gender.innerHTML === "Gender"){
                Gender.classList.add('error-label');
                Gender.parentElement.classList.add('error-input');
                errorList.innerHTML += '<span>Please Select a Gender</span>';
                errorList.classList.add('showRegErrorMsg');
            } else{
                errorList.classList.add('showRegErrorMsg');
            }
        };
    </script>
    <script>
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
            if (errorList.innerHTML.includes('<span>Please Select a Gender</span>')) {
                errorList.innerHTML = errorList.innerHTML.replace('<span>Please Select a Gender</span>', '');
            }
            Gender.classList.remove('error-label');
            Gender.style.color = "Black";
            Gender.parentElement.classList.remove('error-input');
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
</body>
