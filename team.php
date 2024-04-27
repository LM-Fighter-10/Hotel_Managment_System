<!DOCTYPE html>
<html lang="en">
<?php
    include 'codeBlocks.php';
    refreshEmployees();
?>
<head>
    <?=$headerBlock?>
</head>

<style>
    .employeeEditForm {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 450px;
        padding: 20px;
        border-radius: 20px;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        z-index: -1;
        background-color: #0F172B;
        color: #FEA116;
        border: 1px solid #FEA116;
        transition: all 0.3s ease-in-out;


    }

    .employeeEditTitle {
        margin-bottom: 10px !important;
        font-size: 28px;
        font-weight: 600;
        letter-spacing: -1px;
        position: relative;
        display: flex;
        align-items: center;
        padding-left: 30px;
        color: #FEA116;
    }

    .crossExitEdit{
        cursor: pointer;
        margin-bottom: 10px !important;
        font-size: 28px;
        font-weight: 600;
        letter-spacing: -1px;
        position: relative;
        display: flex;
        align-items: center;
        color: #FEA116;
    }

    .employeeEditTitle::before {
      width: 18px;
      height: 18px;
    }

    .employeeEditTitle::after {
      width: 18px;
      height: 18px;
      animation: pulse 1s linear infinite;
    }

    .employeeEditTitle::before,
    .employeeEditTitle::after {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      border-radius: 50%;
      left: 0px;
      background-color: #FEA116;
    }

    .employeeEditMessage,
    .employeeEditSignin {
      font-size: 14.5px;
      color: rgba(255, 255, 255, 0.7);
    }

    .employeeEditSignin {
      text-align: center;
    }


    .employeeEditFlex {
        display: flex;
        width: 100%;
        gap: 6px;
        margin: 10px 0px;
    }

    .employeeEditForm label {
      position: relative;
    }

    .employeeEditForm label .input {
      background-color: #333;
      color: #fff;
      width: 100%;
      padding: 20px 05px 05px 10px;
      outline: 0;
      border: 1px solid rgba(105, 105, 105, 0.397);
      border-radius: 10px;
    }

    .employeeEditForm label .input + span {
        user-select: none;
        color: rgba(255, 255, 255, 0.5);
        position: absolute;
        left: 12px;
        top: 8px;
        font-size: 1.4em;
        cursor: text;
        transition: 0.3s ease;
    }

    #EmployeeIDMainLabel, #EmployeeNumber{
        cursor: initial;
        user-select: none;
    }

    #employeeNumber{
            color: #aaaaaa;
    }

    #EmployeeIDLabel{
        color: #FEA116;
        top: 0px;
        font-size: 0.9em;
        font-weight: 600;
    }

    .employeeEditForm label .input:placeholder-shown + span {
      top: 12.5px;
      font-size: 0.9em;
    }

    .employeeEditForm label .input:focus + span,
    .employeeEditForm label .input:valid + span {
      color: #FEA116;
      top: 0px;
      font-size: 0.9em;
      font-weight: 600;
    }

    .input {
      font-size: medium;
    }

    .EmployeeEditSubmit {
        margin-top: 20px;
        border: none;
        outline: none;
        padding: 10px;
        border-radius: 10px;
        color: #fff;
        font-size: 16px;
        transition: .3s ease;
        background-color:#FEA116;
    }

    .EmployeeEditSubmit:hover {
      background-color: #FEA110;
    }

    @keyframes pulse {
      from {
        transform: scale(0.9);
        opacity: 1;
      }

      to {
        transform: scale(1.8);
        opacity: 0;
      }
    }
    .background-cover{
        position: fixed;
        background-color: black;
        opacity: 0;
        z-index: -1;
        top: 0;
        width: 100%;
        height: 100%;
        transition: all 0.3s ease-in-out;
    }
    .showBackground-cover{
        opacity: 0.7;
        z-index: 4;
    }
    .showEmployeeEditForm{
        opacity: 1;
        z-index: 5;
    }
    #EditErrorMsg{
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
    .showEditErrorMsg{
        height: auto !important;
        padding: 1rem 1rem !important;
        margin-bottom: 1rem !important;
        border: 1px solid transparent !important;
    }
    .alert{
        width: 100%;
        text-align: center;
    }
    .form-container {
        overflow-y: scroll;
        height: 500px; /* Adjust the height as needed */
    }
</style>

    <body>
        <div class="bg-white p-0">
            <?=$navBarBlock?>
            <!-- Page Header Start -->
            <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
                <div class="container-fluid page-header-inner py-5">
                    <div class="container text-center pb-5">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Our Team</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center text-uppercase">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Our Team</li>
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

        <!-- JavaScript Libraries -->
        <?=$scriptBlock?>
    </body>
    <script>
        $("#navbarCollapse a").each(function () {
            if ($(this).html() === "Our Team"){
                $(this).addClass("active");
            }else{
                $(this).removeClass("active");
            }
        });
    </script>

<?=editEmployee()?>
</html>
