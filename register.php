<?php
session_start();
$_SESSION["pagename"] = "register";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title><?php echo $sitename; ?> - Register</title>

    <style>
    .h-custom {
        height: 80vh;
    }

    @media (max-width: 1000px) {
        .h-custom {
            height: 100%;
        }
    }
    </style>
</head>

<body>
    <?php include('master/header.php'); ?>

    <!-- Register -->
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                        <p class="text-center h2 fw-bold mx-1 mx-md-4 mt-4">Register</p>
                        <hr class="mx-1 mx-md-4">
                        <form class="mx-1 mx-md-4">
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-user fa-lg me-3 mb-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="form3Example1c">Your Name</label>
                                    <input type="text" id="form3Example1c" class="form-control" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-envelope fa-lg me-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="form3Example3c">Your Email</label>
                                    <input type="email" id="form3Example3c" class="form-control" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-lock fa-lg me-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="form3Example4c">Password</label>
                                    <input type="password" id="form3Example4c" class="form-control" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-key fa-lg me-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                    <input type="password" id="form3Example4cd" class="form-control" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="button" class="btn btn-warning btn-lg">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                        <img src="assets/images/login/register-img.webp" class="img-fluid" alt="Register image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register End -->

    <?php include('master/footer.php'); ?>

    <?php include('master/jslinks.php'); ?>

</body>

</html>