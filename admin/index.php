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
                    <dv class="row">
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="container shadow bg-body rounded p-3">
                                <h5 class="h5">Movies This Month</h3>
                                    <hr>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="container shadow bg-body rounded p-3">
                                <h5 class="h5">Movie Hall Capacity</h3>
                                    <hr>
                                    <canvas id="hallCapacity"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="container shadow bg-body rounded p-3">
                                <h5 class="h5">Seat Bookings This Month</h3>
                                    <hr>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="container shadow bg-body rounded p-3">
                                <h5 class="h5">Movie Reservations</h3>
                                    <hr>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="container shadow bg-body rounded p-3">
                                <h5 class="h5">Movie Cancellations</h3>
                                    <hr>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="container shadow bg-body rounded p-3">
                                <h5 class="h5">Bookings by Seat Type</h3>
                                    <hr>
                            </div>
                        </div>
                    </dv>
                </div>

                <!-- User Information -->
                <div class="container-fluid shadow p-2 p-md-3 mb-3 bg-body rounded">
                    <div class="row">
                        <di class="col">
                            <h2>User Profile</h2>
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
        
        const hallCapacity = $('#hallCapacity');

        new Chart(hallCapacity, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    })
    </script>
</body>

</html>