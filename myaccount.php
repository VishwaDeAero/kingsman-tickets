<?php
session_start();
$_SESSION["pagename"] = "myaccount";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title>
        <?php echo $sitename; ?> - My Account
    </title>
</head>

<body>
    <?php include('master/header.php'); ?>

    <!-- User Information -->
    <div class="container shadow p-4 p-md-5 mb-5 mt-3 bg-body rounded">
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
                    <p class="h4">Vishwa Nipun</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Last Name :
                    </label>
                    <p class="h4">Srimal</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Mobile Number :
                    </label>
                    <p class="h4">0777123454</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Email :
                    </label>
                    <p class="h4">test@kingman.lk</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Date of Birth :
                    </label>
                    <p class="h4">14-07-1999</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        NIC Number :
                    </label>
                    <p class="h4">199919603197</p>
                </div>
            </div>
            <div class="d-grid gap-2 d-sm-block mt-4 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-dark text-light">Update Profile</button>
                <button type="button" class="btn btn-warning text-dark">Change Password</button>
            </div>
        </div>
    </div>
    <!-- User Information End -->

    <!-- Tickets Reserved -->
    <div class="container mb-5 mt-3">
        <div class="row">
            <di class="col">
                <h2 class="px-3 px-md-4">Tickets History</h2>
            </di>
        </div>

        <!-- Ticket Line -->
        <div class="row gap-2">
            <!-- Fully Cancelled Ticket -->
            <div class="container ticket shadow bg-body rounded p-4 col-12">
                <div class="row d-flex align-items-center">
                    <div class="col-md-3">
                        <p class="h4 fw-bold"><i class="fa-solid fa-ticket me-2"></i>19991960</p>
                        <p class="h5"><i class="fa-solid fa-film me-2"></i>Spider Man - No way home</p>
                        <p class="text-muted m-0"><i class="fa-solid fa-calendar-days me-2"></i>28/10/2022 16:00</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row mt-3 mt-md-2 mt-sm-0">
                            <div class="col-auto d-flex align-items-md-center">
                                <p class="h5 lh-base mb-0">Seats :</p>
                            </div>
                            <div class="col row d-flex align-items-center gap-2">
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3 mt-md-2 mt-sm-0 d-flex justify-content-center justify-content-md-end">
                        <label class="text-muted h5">
                            Cancelled
                        </label>
                    </div>
                </div>
            </div>
            <!-- Fully Cancelled Ticket End -->

            <!-- Watched Ticket -->
            <div class="container ticket shadow bg-body rounded p-4 col-12">
                <div class="row d-flex align-items-center">
                    <div class="col-md-3">
                        <p class="h4 fw-bold"><i class="fa-solid fa-ticket me-2"></i>19991960</p>
                        <p class="h5"><i class="fa-solid fa-film me-2"></i>Spider Man - No way home</p>
                        <p class="text-muted m-0"><i class="fa-solid fa-calendar-days me-2"></i>28/10/2022 16:00</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row mt-3 mt-md-2 mt-sm-0">
                            <div class="col-auto d-flex align-items-md-center">
                                <p class="h5 lh-base mb-0">Seats :</p>
                            </div>
                            <div class="col row d-flex align-items-center gap-2">
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3 mt-md-2 mt-sm-0 d-flex justify-content-center justify-content-md-end">
                        <label class="text-success h5">
                            Watched
                        </label>
                    </div>
                </div>
            </div>
            <!-- Watched Ticket End -->

            <!-- Future Ticket - w/ Cancel Btn -->
            <div class="container ticket shadow bg-body rounded p-4 col-12">
                <div class="row d-flex align-items-center">
                    <div class="col-md-3">
                        <p class="h4 fw-bold"><i class="fa-solid fa-ticket me-2"></i>19991960</p>
                        <p class="h5"><i class="fa-solid fa-film me-2"></i>Spider Man - No way home</p>
                        <p class="text-muted m-0"><i class="fa-solid fa-calendar-days me-2"></i>28/10/2022 16:00</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row mt-3 mt-md-2 mt-sm-0">
                            <div class="col-auto d-flex align-items-md-center">
                                <p class="h5 lh-base mb-0">Seats :</p>
                            </div>
                            <div class="col row d-flex align-items-center gap-2">
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3 mt-md-2 mt-sm-0 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-outline-danger">Cancel</button>
                    </div>
                </div>
            </div>
            <!-- Future Ticket End -->
        </div>
        <!-- Ticket Line End -->
    </div>

    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>
</body>

</html>