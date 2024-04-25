<!DOCTYPE html>
<html lang="en">
<?php
    include 'codeBlocks.php';
    refreshRooms();
?>
<head>
    <?=$headerBlock?>
</head>

<style>
    .roomEditForm {
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

    .roomEditTitle {
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

    .roomEditTitle::before {
      width: 18px;
      height: 18px;
    }

    .roomEditTitle::after {
      width: 18px;
      height: 18px;
      animation: pulse 1s linear infinite;
    }

    .roomEditTitle::before,
    .roomEditTitle::after {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      border-radius: 50%;
      left: 0px;
      background-color: #FEA116;
    }

    .roomEditMessage,
    .roomEditSignin {
      font-size: 14.5px;
      color: rgba(255, 255, 255, 0.7);
    }

    .roomEditSignin {
      text-align: center;
    }


    .roomEditFlex {
        display: flex;
        width: 100%;
        gap: 6px;
        margin: 10px 0px;
    }

    .roomEditForm label {
      position: relative;
    }

    .roomEditForm label .input {
      background-color: #333;
      color: #fff;
      width: 100%;
      padding: 20px 05px 05px 10px;
      outline: 0;
      border: 1px solid rgba(105, 105, 105, 0.397);
      border-radius: 10px;
    }

    .roomEditForm label .input + span {
        user-select: none;
        color: rgba(255, 255, 255, 0.5);
        position: absolute;
        left: 12px;
        top: 8px;
        font-size: 1.4em;
        cursor: text;
        transition: 0.3s ease;
    }

    #roomNumberMainLabel, #roomNumber{
        cursor: initial;
        user-select: none;
    }

    #roomNumber{
            color: #aaaaaa;
    }

    #roomNumberLabel{
        color: #FEA116;
        top: 0px;
        font-size: 0.9em;
        font-weight: 600;
    }

    .roomEditForm label .input:placeholder-shown + span {
      top: 12.5px;
      font-size: 0.9em;
    }

    .roomEditForm label .input:focus + span,
    .roomEditForm label .input:valid + span {
      color: #FEA116;
      top: 0px;
      font-size: 0.9em;
      font-weight: 600;
    }

    .input {
      font-size: medium;
    }

    .roomEditSubmit {
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

    .dropdownEditRoom{
        font-size: 1.2rem;
        padding: 2.5px 2.5px 2.5px 6px;
    }

    .roomEditSubmit:hover {
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
    .showRoomEditForm{
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
</style>

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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
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
                <p class="crossExitEdit" id="exitEdit">✖</p>
            </div>
            <div id="EditErrorMsg" class="alert alert-danger" role="alert"></div>
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
<script>
    const roomEditForm = document.getElementById('RoomEditForm');
    const roomEditBackgroundDiv = document.getElementById('backgroundCover');
    const roomNumber = document.getElementById('roomNumber');
    const branchId = document.getElementById('branchId');
    const pricePerNight = document.getElementById('pricePerNight');
    const roomCapacit = document.getElementById('roomCapacity');
    const roomStatus = document.getElementById('status');
    var selectedRoomNum = '';

    function roomsScript() {
        document.getElementById('exitEdit').onclick = function () {
            if (roomEditForm.classList.contains('showRoomEditForm'))
                roomEditForm.classList.remove('showRoomEditForm');
            if (roomEditBackgroundDiv.classList.contains('showBackground-cover'))
                roomEditBackgroundDiv.classList.remove('showBackground-cover');
            document.body.style.overflow = '';
            document.getElementById('EditErrorMsg').classList.remove('showEditErrorMsg');
            // roomNumber.value = ''; branchId.value = ''; pricePerNight.value = '';
            roomNumber.parentNode.children[1].style.color = '';
            branchId.parentNode.children[1].style.color = '';
            pricePerNight.parentNode.children[1].style.color = '';
            roomCapacit.selectedIndex = 0;
            roomStatus.selectedIndex = 0;
        }
        for (let x = 1; x <= <?=$roomInd?>; x++) {
            document.getElementById("pen" + x).onclick = function () {
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

    var pricePerNightErrorMsg = "", branchIdErrorMsg = "", roomNumberErrorMsg = "";
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
                document.getElementById('EditErrorMsg').classList.add('showEditErrorMsg');
                if (data.branchIdError){
                    branchIdErrorMsg = data.branchIdErrorMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.branchIdErrorMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.branchIdErrorMsg + "</span>";
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                        document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + branchIdErrorMsg + "</span>", "");
                }
                if (data.pricePerNightError){
                    pricePerNightErrorMsg = data.pricePerNightErrorMsg;
                    if (!document.getElementById('EditErrorMsg').innerHTML
                        .includes("<span>" + data.pricePerNightErrorMsg + "</span>")){
                        document.getElementById('EditErrorMsg').innerHTML +=
                            "<span>" + data.pricePerNightErrorMsg + "</span>";
                    }
                } else{
                    document.getElementById('EditErrorMsg').innerHTML =
                        document.getElementById('EditErrorMsg').innerHTML
                            .replace("<span>" + pricePerNightErrorMsg + "</span>", "");
                }
            } else {
                document.getElementById('EditErrorMsg').classList.remove('showEditErrorMsg');
                document.getElementById('EditErrorMsg').innerHTML = "";
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
        if (document.getElementById('EditErrorMsg').innerHTML === ""){
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
                    document.getElementById('exitEdit').click();
                    // location.reload();
                    document.getElementById('roomsContainer').innerHTML = data.rooms;
                    roomsScript();
                }
            });
        }
    }

</script>
</html>