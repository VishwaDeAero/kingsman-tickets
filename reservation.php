<?php
session_start();
$_SESSION["pagename"] = "reservation";

// Redirect to Login If User not Logged in
if(!isset($_SESSION["user"])){
    header('Location: login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <link
        href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css”
        rel=”stylesheet”>
    <title>
        <?php echo $sitename; ?> - Reservation
    </title>
    <style>
    .layout-img {
        max-height: 30rem;
    }
    </style>
</head>

<body>
    <?php include('master/header.php'); ?>

    <div class="container p-3 p-sm-4 p-lg-4 mt-lg-4 shadow-sm bg-body rounded">
        <div class="row">
            <div class="col">
                <h2 id="news_title" class="display-5 my-2 my-sm-1">Order Your Tickets</h2>
                <hr class="mt-0 mt-sm-2 mb-lg-4">
                <div class="img-container text-center">
                    <img id="news_img" class="img-thumbnail img-fluid layout-img"
                        src="assets/images/seat_layout/seat_layout.png" alt="Layout Image">
                </div>
            </div>
        </div>
    </div>

    <div class="container p-0">
        <div class="row g-2">
            <div class="col-sm-4">
                <div class="p-3 p-sm-4 p-lg-4 mt-2 shadow-sm mb-5 bg-body rounded">
                    <div class="img-container">
                        <img id="movie_img" class="img-thumbnail img-fluid" src="assets/images/movies/sample.png">
                    </div>
                    <h2 id="movie_title" class="display-5 my-2 my-sm-1">Sample Movie</h2>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="p-3 p-sm-4 p-lg-4 mt-2 shadow-sm mb-5 bg-body rounded">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="reserveDate" class="form-label">Select Date</label>
                                <select class="form-select reserve-dates-list" aria-label="Select Movie Date"
                                    id="reserveDate" required>
                                    <option value="-1" Disabled>No Dates Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="reserveTime" class="form-label">Select Time</label>
                                <select class="form-select reserve-times-list" aria-label="Select Screen Time"
                                    id="reserveTime" required disabled>
                                    <option value="-1" Disabled>No Screens Available</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-6">
                            <div class="mb-3">
                                <label for="seatsCount" class="form-label">Seats Count</label>
                                <input type="number" class="form-control" id="seatsCount" required disabled>
                            </div>
                        </div> -->
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="reservedSeats" class="form-label">Select Seats</label>
                                <!-- <input type="number" class="form-control" id="seatsCount" required disabled> -->
                                <select class="form-select" multiple aria-label="multiple select example"
                                    id="reservedSeats" required disabled>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-end">
                            <button id="bookSeatsBtn" type="button" class="btn btn-dark">Book Seats</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>

    <script type="text/javascript">
    $(document).ready(function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const dataid = urlParams.get('id');

        $('#reservedSeats').select2({
            theme: "bootstrap-5",
            maximumSelectionLength: 2
        });

        function loadMovie(id) {
            var getData = new FormData();
            getData.append('function', 'single');
            getData.append('id', id);
            $.ajax({
                type: "POST",
                url: 'controllers/movie.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    if (!response.error) {
                        var img_path = 'assets/images/movies/' + response.result.movie[0].img_path;
                        $("#movie_title").text(response.result.movie[0].name);
                        // $("#movie_desc").text(response.result.movie[0].description);
                        // $("#movie_category").text(response.result.category[0].name);
                        $("#movie_img").attr("src", img_path);
                    } else {
                        Swal.fire({
                            title: 'Movie Loading Error!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        }
        loadMovie(dataid);

        $('#reserveDate').on('change', function() {
            getScreens();
        });
        $('#reserveTime').on('change', function() {
            getSeats();
        });

        function getDates() {
            $('#reservedSeats').prop('disabled', true);
            $('#reserveTime').prop('disabled', true);
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            var getData = new FormData();
            getData.append('function', 'datelist');
            getData.append('id', dataid);
            $.ajax({
                type: "POST",
                url: 'controllers/reservation.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    if (!response.error) {
                        if (response.result.length > 0) {
                            var reserveDateSelect = $("#reserveDate");
                            reserveDateSelect.empty(); // remove old options
                            response.result.forEach(element => {
                                reserveDateSelect.append($("<option></option>").attr(
                                    "value", element.date).text(element.date));
                            });
                        }
                        Swal.close();
                        getScreens();
                    } else {
                        Swal.fire({
                            title: 'Date Loading Error!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        }
        getDates();

        function getScreens() {
            $('#reserveTime').prop('disabled', false);
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            var getData = new FormData();
            getData.append('function', 'screenlist');
            getData.append('id', dataid);
            getData.append('date', $('#reserveDate').val());
            $.ajax({
                type: "POST",
                url: 'controllers/reservation.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    if (!response.error) {
                        if (response.result.length > 0) {
                            var reserveScreenselect = $("#reserveTime");
                            reserveScreenselect.empty(); // remove old options
                            response.result.forEach(element => {
                                reserveScreenselect.append($("<option></option>").attr(
                                    "value", element.id).text(element.time));
                            });
                        }
                        Swal.close();
                        getSeats();
                    } else {
                        Swal.fire({
                            title: 'Screens Loading Error!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        }

        function getSeats() {
            $('#reservedSeats').prop('disabled', false);
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            var getData = new FormData();
            getData.append('function', 'seatslist');
            getData.append('id', dataid);
            getData.append('screen', $('#reserveTime').val());
            $.ajax({
                type: "POST",
                url: 'controllers/reservation.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    if (!response.error) {
                        if (response.result.length > 0) {
                            $("#reservedSeats").select2("destroy");
                            var reserveSeatSelect = $("#reservedSeats");
                            reserveSeatSelect.empty(); // remove old options
                            response.result.forEach(element => {
                                reserveSeatSelect.append($("<option></option>").attr(
                                    "value", element.id).text(element.code));
                            });
                            $('#reservedSeats').select2({
                                theme: "bootstrap-5",
                                maximumSelectionLength: 10
                            });
                        } else {
                            $("#reservedSeats").empty();
                            $('#reservedSeats').select2({
                                theme: "bootstrap-5",
                                placeholder: "No seats available",
                                disabled: true
                            });
                        }
                        Swal.close();
                    } else {
                        Swal.fire({
                            title: 'Seats Loading Error!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        }

        // Reserve Seats
        $("#bookSeatsBtn").click(function() {
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            var seats = $('#reservedSeats').select2('data');

            // If no seats selected show error
            if (seats === undefined || seats.length == 0) {
                Swal.fire({
                    title: 'No Seats Selected',
                    text: 'Please Select Your Seats to Reserve',
                    icon: 'error',
                    showConfirmButton: true
                });
                return false;
            }

            var movie_id = dataid;
            var screen_id = $('#reserveTime').val();
            const user_id = <?php echo $_SESSION["user"]["id"] ?>;
            var seats_id = [];
            seats.forEach(element => {
                seats_id.push(element.id);
            });

            var sendData = new FormData();
            sendData.append('function', 'add');
            sendData.append('movie_id', movie_id);
            sendData.append('screen_id', screen_id);
            sendData.append('user_id', user_id);
            sendData.append('seats_id', seats_id);
            $.ajax({
                type: "POST",
                url: 'controllers/reservation.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    if (!response.error) {
                        Swal.fire({
                            title: 'Reservation Successful!',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then((result) => {
                            getSeats();
                        });
                    } else {
                        Swal.fire({
                            title: 'Seats Loading Error!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        }).then((result) => {
                            getSeats();
                        });
                    }
                }
            });
        });
        // -------------------------------------------------------
    });
    </script>
</body>

</html>