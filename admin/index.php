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
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <!-- Charts and Things -->
                <div class="container-fluid p-0">
                    <dv class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="container h-100 shadow bg-body rounded p-3">
                                <h5 class="h5">Latest Movies</h3>
                                    <hr>
                                    <div id="newMoviesSection" class="new-movies-section">
                                        <div class="card flex-row news-card mb-2">
                                            <div class="col-4">
                                                <img class="card-img-left w-100 h-100"
                                                    src="https://picsum.photos/400/350" />
                                            </div>
                                            <div class="card-body col-8 p-2">
                                                <h5 class="card-title">Left image</h5>
                                                <label class="card-title">Category</label>
                                                <p class="card-text small muted">This is a longer card with supporting
                                                    text below as a natural
                                                    lead-in to additional content. This content is a little bit longer.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container h-100 shadow bg-body rounded p-3">
                                <h5 class="h5">Movies by Category</h3>
                                    <hr>
                                    <canvas id="movieCategory"></canvas>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container h-100 shadow bg-body rounded p-3">
                                <h5 class="h5">Stats This Month</h3>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <label class="h4 mb-0">
                                                Seats Booked :
                                            </label>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label id="seatsBooked" class="h4 mb-0">
                                                0
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <label class="h4 mb-0">
                                                Seats Cancelled :
                                            </label>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label id="seatsCancelled" class="h4 mb-0">
                                                0
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <label class="h4 mb-0">
                                                New Users :
                                            </label>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label id="newUsers" class="h4 mb-0">
                                                0
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <label class="h4 mb-0">
                                                Total Users :
                                            </label>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label id="totalUsers" class="h4 mb-0">
                                                0
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-8">
                                            <label class="h4 mb-0">
                                                Screening Movies :
                                            </label>
                                        </div>
                                        <div class="col-4 text-end">
                                            <label id="totalScreens" class="h4 mb-0">
                                                0
                                            </label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container h-100 shadow bg-body rounded p-3">
                                <h5 class="h5">Movie Reservations</h3>
                                    <hr>
                                    <canvas id="movieReservation"></canvas>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container h-100 shadow bg-body rounded p-3">
                                <h5 class="h5">Movie Cancellations</h3>
                                    <hr>
                                    <canvas id="movieCancellation"></canvas>
                            </div>
                        </div>
                        <div class="col">
                            <div class="container h-100 shadow bg-body rounded p-3">
                                <h5 class="h5">Bookings by Seat Type</h3>
                                    <hr>
                                    <canvas id="bookingSeats"></canvas>
                            </div>
                        </div>
                    </dv>
                </div>

                <!-- User Information -->
                <div class="container-fluid shadow p-2 p-md-3 my-3 bg-body rounded">
                    <div class="row">
                        <di class="col">
                            <h4>User Information</h4>
                        </di>
                    </div>
                    <hr class="mt-0">
                    <div class="user-info">
                        <div class="row g-md-4 g-3">
                            <div class="col-md-6 col-lg-3">
                                <label class="h6 mb-0">
                                    First Name :
                                </label>
                                <p class="h4"><?php echo $_SESSION["user"]["first_name"] ?></p>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <label class="h6 mb-0">
                                    Last Name :
                                </label>
                                <p class="h4"><?php echo $_SESSION["user"]["last_name"] ?></p>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <label class="h6 mb-0">
                                    Mobile Number :
                                </label>
                                <p class="h4"><?php echo $_SESSION["user"]["contact_no"] ?></p>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <label class="h6 mb-0">
                                    Email :
                                </label>
                                <p class="h4"><?php echo $_SESSION["user"]["email"] ?></p>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <label class="h6 mb-0">
                                    Date of Birth :
                                </label>
                                <p class="h4"><?php echo $_SESSION["user"]["dob"] ?></p>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <label class="h6 mb-0">
                                    NIC Number :
                                </label>
                                <p class="h4"><?php echo $_SESSION["user"]["nic"] ?></p>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-sm-block mt-4 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-dark text-light">Update Profile</button>
                            <button type="button" class="btn btn-primary text-light">Change Password</button>
                        </div>
                    </div>
                </div>
                <!-- User Information End -->
            </main>
        </div>
    </div>
    <?php include('master/jslinks.php') ?>
    <script type="text/javascript">
    $(document).ready(function() {

        const movieCategory = $('#movieCategory');
        const movieReservation = $('#movieReservation');
        const movieCancellation = $('#movieCancellation');
        const bookingSeats = $('#bookingSeats');

        new Chart(movieCategory, {
            type: 'pie',
            data: {
                labels: ['ODC', 'Balcony', 'Box'],
                datasets: [{
                    label: 'Seats',
                    data: [20, 20, 5],
                    borderWidth: 1
                }]
            }
        });

        new Chart(bookingSeats, {
            type: 'bar',
            data: {
                labels: ['ODC', 'Balcony', 'Box'],
                datasets: [{
                    label: 'Bookings Made',
                    data: [12, 19, 3],
                    borderWidth: 1
                }]
            }
        });

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
                        console.log(response)
                        $("#seatsBooked").empty().append(response.bookings.length);
                        $("#seatsCancelled").empty().append(response.cancellations.length);
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