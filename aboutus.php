<?php
session_start();
$_SESSION["pagename"] = "aboutus";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title>
        <?php echo $sitename; ?> - About Us
    </title>
</head>

<body>
    <?php include('master/header.php'); ?>

    <!-- About Us -->
    <div class="bg-light">
        <div class="container py-2 py-md-5">
            <div class="row h-100 align-items-center py-2 py-md-5">
                <div class="col-lg-6">
                    <h2 class="fw-bold">About Us</h2>
                    <p class="lead text-muted mb-0">Cineflix Movies is a state-of-the-art movie theater that provides the ultimate movie-going experience. We opened our doors in 2020 and have quickly become one of the most highly rated movie theaters in the industry. We are dedicated to providing our customers with the best possible experience, from the comfort of our luxurious seating to the latest audio and visual technology. Whether you’re in the mood for a classic film or up-to-the-minute blockbuster, we have something for everyone.</p>
                    </p>
                </div>
                <div class="col-lg-6 d-none d-lg-block"><img
                        src="assets/images/about/main-img.png" alt="" class="img-fluid"></div>
            </div>
        </div>
    </div>

    <!-- Team Info -->
    <div class="bg-light py-2 py-md-5">
        <div class="container py-2 py-md-5">
            <div class="row mb-4 text-center">
                <div class="col-lg-7 mx-auto">
                    <h2 class="fw-bold">Our team</h2>
                    <p class="font-italic text-muted">Our team is dedicated to providing the best movie booking experience possible. Our goal is to make sure that everyone can find the perfect movie for them in a few simple clicks. We strive to provide a hassle-free, secure and convenient movie booking experience that will keep you coming back for more. With our customer-centric approach, we make sure that every movie booking experience is enjoyable and memorable.</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="assets/images/about/avatar-d.png" alt="Dulmini" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Dulmini Kariyawasam</h5><span class="small text-uppercase text-muted">Manager -
                            Social Affairs</span>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="assets/images/about/avatar-u.png" alt="Ushan" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Ushan Dilshara</h5><span class="small text-uppercase text-muted">Manager -
                            Human Resources</span>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img
                            src="assets/images/about/avatar-v.png" alt="Vishwa" width="100"
                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Vishwa Nipun</h5><span class="small text-uppercase text-muted">Manager -
                            Technical</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>
</body>

</html>