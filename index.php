<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php') ?>
    <title>Kingsman Tickets</title>
</head>

<body>
    <?php include('master/header.php'); ?>
    <!-- Main Slider -->
    <div id="carouselExampleCaptions" class="carousel slide main-slider mb-lg-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/main_slider/movies_1315_633145515b98f_naane_varu_sd.jpg" class="d-block w-100"
                    alt="Naane Varuen">
                <div class="carousel-caption d-none d-md-block">
                    <h1>First slide label</h1>
                    <h3>Some representative placeholder content for the first slide.</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/main_slider/movies_1170_6045ea459dd42_sinam_sd.jpg" class="d-block w-100"
                    alt="sinam">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Second slide label</h1>
                    <h3>Some representative placeholder content for the second slide.</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/images/main_slider/movies_1301_62f6378b2572d_thiruchi_sd.jpg" class="d-block w-100"
                    alt="thiruchan">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Third slide label</h1>
                    <h3>Some representative placeholder content for the third slide.</h3>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Main Slider End -->

    <!-- Latest Movies Section -->
    <div class="container-fluid p-lg-5">
        <div class="row">
            <div class="col">
                <h2>Latest Movies to Watch</h2>
            </div>
        </div>
        <hr class="mb-lg-4">
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="https://picsum.photos/350/400" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-auto">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="">Category</h6>
                            </div>
                            <div class="col text-end align-items-center d-flex justify-content-lg-end">
                                <small class="bg-warning p-2 rounded-3 align-middle">
                                    <span class="d-none d-md-inline">Rating:</span>
                                    <span>
                                        4.8/5</span>
                                </small>
                            </div>
                        </div>
                        <hr>
                        <p class="card-text"><small class="text-muted">This is a longer card with supporting text below
                                as a natural lead-in to
                                additional content. This content is a little bit longer.</small></p>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-lg btn-dark text-light">Buy Tickets</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Movies Section End-->

    <?php include('master/footer.php'); ?>

    <!-- Javascript -->
    <?php include('master/jslinks.php'); ?>
</body>

</html>