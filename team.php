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

<div id="backgroundCover" class="background-cover"></div>
        <!-- Page Header End -->
        <form class="employeeEditForm" id="EmployeeEditForm" method="POST">
            <div class="d-flex justify-content-between user-select-none">
                <p class="employeeEditTitle">EDIT Employee details</p>
              <p class="crossExitEdit" id="exitEdit">✖</p>
            </div>
            <div id="EditErrorMsg" class="alert alert-danger" role="alert"></div>
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

<script>

    const employeeEditForm = document.getElementById('EmployeeEditForm');
    const employeeEditBackgroundDiv = document.getElementById('backgroundCover');
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
        document.getElementById('exitEdit').onclick = function () {
            if (employeeEditForm.classList.contains('showEmployeeEditForm'))
                employeeEditForm.classList.remove('showEmployeeEditForm');
            if (employeeEditBackgroundDiv.classList.contains('showBackground-cover'))
                employeeEditBackgroundDiv.classList.remove('showBackground-cover');
            document.body.style.overflow = '';
            document.getElementById('EditErrorMsg').classList.remove('showEditErrorMsg');

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
        for (let x = 1; x <= <?=$empNo?>; x++) {
            // const penElement = document.getElementById("pen" + x);
            // if(penElement !== null)
            document.getElementById("pen" + x).onclick = function () {
                selectedEmployeeNum = document.getElementById("Employeeid"+x).innerHTML;
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

    var fname_errMsg="", lname_errMsg="", Rname_errMsg="",workingh_ErrorMsg = "", salary_errorMsg=""
    country_errMsg="", city_errMsg="", state_errMsg ="", zipcode_errMsg="", phone_errMsg="", email_errMsg="", email_empty_errMsg="", serviceId_errMsg = "", restaurantId_errMsg = "";

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
            if (data.workingh_error || data.FirstName_error || data.LastName_error || data.RoleName_error || data
                    .salary_error|| data.country_error || data.email_error || data.restaurantId_error ||
                    data.serviceId_error || data.city_error || data.state_error|| data.zipcode_error
                    || data.phone_error) {
                document.getElementById('EditErrorMsg').classList.add('showEditErrorMsg');

                if (data.workingh_error){
                    workingh_ErrorMsg = data.workingh_ErrorMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.workingh_ErrorMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.workingh_ErrorMsg + "</span>";
                    }
                    if (workinghours.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>Working hours cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + workingh_ErrorMsg + "</span>", "");
                }


                if (data.salary_error){
                    salary_errorMsg = data.salary_errorMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.salary_errorMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.salary_errorMsg + "</span>";
                    }
                    if (salary.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>Salary cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + salary_errorMsg + "</span>", "");
                }

                if (data.FirstName_error){
                    fname_errMsg = data.fname_errMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.fname_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.fname_errMsg + "</span>";
                    }
                    if (fname.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>First Name cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + fname_errMsg + "</span>", "");
                }

                if (data.RoleName_error){
                    Rname_errMsg= data.Rname_errMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.Rname_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.Rname_errMsg + "</span>";
                    }
                    if (rolename.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>Role Name cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + Rname_errMsg + "</span>", "");
                }

                if (data.city_error){
                    city_errMsg = data.city_errMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.city_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.city_errMsg + "</span>";
                    }
                    if (city.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>City cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + city_errMsg + "</span>", "");
                }
                if (data.state_error){
                    state_errMsg = data.state_errMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.state_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.state_errMsg + "</span>";
                    }
                    if (state.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>State cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + state_errMsg + "</span>", "");
                }

                if (data.zipcode_error){
                   zipcode_errMsg = data.zipcode_errMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.zipcode_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.zipcode_errMsg + "</span>";
                    }
                    if (zipcode.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>Zip code cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + zipcode_errMsg + "</span>", "");
                }

                if (data.phone_error){
                   phone_errMsg = data.phone_errMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.phone_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.phone_errMsg + "</span>";
                    }
                    if (phone.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>Phone Number cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + phone_errMsg + "</span>", "");
                }

                if (data.LastName_error){
                    lname_errMsg = data.lname_errMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.lname_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.lname_errMsg + "</span>";
                    }
                    if (lname.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>Last Name cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                        document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + lname_errMsg + "</span>", "");
                }

                if (data.email_error){
                    email_errMsg= data.email_errorMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + email_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + email_errMsg + "</span>";
                    }
                    if (email.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>Email cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + email_errMsg + "</span>", "");
                }

                if (data.country_error){
                    country_errMsg = data.country_errMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.country_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.country_errMsg + "</span>";
                    }
                    if (country.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>Country cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + country_errMsg + "</span>", "");
                }

                if (data.serviceId_error){
                    serviceId_errMsg = data.serviceId_errorMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + serviceId_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + serviceId_errMsg + "</span>";
                    }
                    if (serviceID.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>Services id cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + serviceId_errMsg + "</span>", "");
                }

                if (data.restaurantId_error){
                    restaurantId_errMsg = data.restaurantId_errorMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + restaurantId_errMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + restaurantId_errMsg + "</span>";
                    }
                    if (restaurantID.value !== ""){
                        document.getElementById('EditErrorMsg').innerHTML =
                            document.getElementById('EditErrorMsg').innerHTML
                                .replace("<span>Restaurant id cannot be empty</span>", "");
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                    document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + restaurantId_errMsg + "</span>", "");
                }

            } else {
                document.getElementById('EditErrorMsg').classList.remove('showEditErrorMsg');
                document.getElementById('EditErrorMsg').innerHTML = "";
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
        if (document.getElementById('EditErrorMsg').innerHTML === "") {
            if (document.getElementById('EditErrorMsg').innerHTML === "") {
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
                            document.getElementById('exitEdit').click();
                            document.getElementById('employeesContainer').innerHTML = data.employee;
                            EmployeeScript();
                        }
                    });
            }
        }
    }
</script>
</html>
