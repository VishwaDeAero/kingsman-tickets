<?php
session_start();
$_SESSION["pagename"] = "adminDashboard";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php') ?>
    <title><?php echo $sitename; ?> - Dashboard</title>

    <style>
    </style>
</head>

<body>
    <!-- Header bar -->
    <?php include('master/header.php') ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Side bar -->
            <?php include('master/sidebar.php') ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 working-area">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar" class="align-text-bottom"></span>
                            This week
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include('master/jslinks.php') ?>
    <script type="text/javascript">
    $(document).ready(function() {

        const user_id = <?php echo $_SESSION["user"]["id"] ?>;
        const hallCapacity = $('#hallCapacity');
        const movieReservation = $('#movieReservation');
        const movieCancellation = $('#movieCancellation');
        const bookingSeats = $('#bookingSeats');
        var passwordMatch = true;

        // Check Passwords Match
        $(".password-input").keyup(function(event) {
            if ($('#updatePassword').val() != $('#updateMatchPassword').val()) {
                $(".password-input").addClass("border-danger");
                passwordMatch = false;
            } else {
                $(".password-input").removeClass("border-danger");
                passwordMatch = true;
            }
        });

        //Update Password
        $('#updatePasswordForm').submit(function(e) {
            e.preventDefault();
            if ((!passwordMatch) || $('#updatePassword').val() == "") {
                Swal.fire({
                    title: 'Password Mismatch!',
                    text: 'Please enter same password in each box',
                    icon: 'error',
                    showConfirmButton: true
                });
                return false;
            }
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            var sendData = new FormData();
            // Append Function to Call
            sendData.append('function', 'password');
            // Append Update Info
            sendData.append('oldPassword', $('#oldPassword').val());
            sendData.append('updatePassword', $('#updatePassword').val());
            sendData.append('id', user_id);
            console.log("sendData", sendData);
            $.ajax({
                type: "POST",
                url: '../controllers/users.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    console.log(response);
                    if ((!response.error) && response.result) {
                        $('#updatePasswordForm').trigger('reset');
                        Swal.fire({
                            title: 'Password Updated!',
                            text: 'Please login again',
                            icon: 'success',
                        }).then((result) => {
                            window.location.href = "../login.php";
                        });
                    } else {
                        $('#updatePasswordForm').trigger('reset');
                        Swal.fire({
                            title: 'Password Update Failed!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        })


        //Update Account Info
        $('#updateUserForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            var sendData = new FormData();
            // Append Function to Call
            sendData.append('function', 'update');
            // Append Update Info
            sendData.append('firstname', $('#updateFirstName').val());
            sendData.append('lastname', $('#updateLastName').val());
            sendData.append('nic', $('#updateNIC').val());
            sendData.append('gender', $('#updateGender').val());
            sendData.append('dob', $('#updateDOB').val());
            sendData.append('contactno', $('#updateContactNo').val());
            sendData.append('email', $('#updateEmail').val());
            sendData.append('id', user_id);
            console.log("sendData", sendData);
            $.ajax({
                type: "POST",
                url: '../controllers/users.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    console.log(response);
                    if ((!response.error) && response.result) {
                        $('#updateUserForm').trigger('reset');
                        Swal.fire({
                            title: 'Profile Updated!',
                            text: 'Please login again to validate changes',
                            icon: 'success',
                        }).then((result) => {
                            $("#updateUserFormModal").modal('hide');
                            window.location.href = "../login.php";
                        });
                    } else {
                        $('#updateUserForm').trigger('reset');
                        Swal.fire({
                            title: 'Profile Update Failed!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        })

        function showLatestMovies() {
            var getData = new FormData();
            getData.append('function', 'latestmovies');
            $.ajax({
                type: "POST",
                url: '../controllers/charts.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    if (!response.error) {
                        var movie_string = "";
                        response.result.forEach(element => {
                            var movie = element.movie;
                            var category = element.category[0];
                            movie_string += `<div class="card flex-row news-card mb-2">
                                                <div class="col-4">
                                                    <img class="card-img-left w-100 h-100"
                                                        src="../assets/images/movies/${movie.img_path}" />
                                                </div>
                                                <div class="card-body col-8 p-2">
                                                    <h5 class="card-title">${movie.name}</h5>
                                                    <label class="card-title">${category.name}</label>
                                                    <p class="card-text small muted">${(movie.description.length > 100)? movie.description.substring(0,100): movie.description}</p>
                                                </div>
                                            </div>`;
                        });
                        $("#newMoviesSection").empty().append(movie_string);
                    } else {
                        Swal.fire({
                            title: 'Error Loading Movies!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        }
        showLatestMovies();

        function showStats() {
            var getData = new FormData();
            getData.append('function', 'stats');
            $.ajax({
                type: "POST",
                url: '../controllers/charts.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    if (!response.error) {
                        console.log(response);
                        var cancellations = 0;
                        var reservations = 0;
                        response.countcancellations.forEach(element => {
                            cancellations += parseFloat(element.cancellations);
                        });
                        response.reservations.forEach(element => {
                            reservations += parseFloat(element.reservations);
                        });
                        $("#seatsBooked").empty().append(reservations);
                        $("#seatsCancelled").empty().append(cancellations);
                        $("#newUsers").empty().append(response.newusers.length);
                        $("#totalUsers").empty().append(response.users.length);
                        $("#totalScreens").empty().append(response.screens.length);

                        new Chart(movieReservation, {
                            type: 'line',
                            data: {
                                datasets: [{
                                    backgroundColor: '#22CFCF',
                                    borderColor: '#22CFCF',
                                    label: 'Reservations',
                                    data: response.reservations,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                parsing: {
                                    xAxisKey: 'date',
                                    yAxisKey: 'reservations'
                                }
                            }
                        });

                        new Chart(movieCancellation, {
                            type: 'line',
                            data: {
                                datasets: [{
                                    backgroundColor: '#FF6384',
                                    borderColor: '#FF6384',
                                    label: 'Cancellations',
                                    data: response.countcancellations,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                parsing: {
                                    xAxisKey: 'date',
                                    yAxisKey: 'cancellations'
                                }
                            }
                        });

                        new Chart(hallCapacity, {
                            type: 'pie',
                            data: {
                                labels: ['Balcony Seats', 'Box Seats', 'ODC Seats'],
                                datasets: [{
                                    label: 'Seats',
                                    data: response.seats,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                parsing: {
                                    key: 'count'
                                }
                            }
                        });

                        new Chart(bookingSeats, {
                            type: 'bar',
                            data: {
                                datasets: [{
                                    label: 'Bookings Made',
                                    data: response.bookingseats,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                parsing: {
                                    xAxisKey: 'seat_category',
                                    yAxisKey: 'count'
                                }
                            }
                        });

                    } else {
                        Swal.fire({
                            title: 'Error Loading Stats!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        }
        showStats();

    })
    </script>
</body>

</html>