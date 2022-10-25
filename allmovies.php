<?php
session_start();
$_SESSION["pagename"] = "allmovies";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title>
        <?php echo $sitename; ?> - All Movies
    </title>
</head>

<body>
    <?php include('master/header.php'); ?>

    <!-- All Movies -->
    <div class="container p-3 p-sm-4 p-lg-2 mt-lg-4">
        <div class="row">
            <div class="col">
                <h2 class="fw-bold">Find Now Screening Movies</h2>
            </div>
        </div>
    </div>
    <div class="container mt-lg-4">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Romance</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Thriller</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab" aria-controls="contact" aria-selected="false">Comedy</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active py-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://picsum.photos/350/400" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-auto">
                                        <h5 class="card-title">Card title</h5>
                                        <h6 class="">Category</h6>
                                    </div>
                                    <div class="col text-end align-items-center d-flex justify-content-sm-end">
                                        <small class="bg-warning p-2 rounded-3 align-middle">
                                            <span class="d-none d-md-inline">Rating:</span>
                                            <span>
                                                4.8/5</span>
                                        </small>
                                    </div>
                                </div>
                                <hr>
                                <p class="card-text"><small class="text-muted">This is a longer card with supporting
                                        text below
                                        as a natural lead-in to
                                        additional content. This content is a little bit longer.</small></p>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-lg btn-dark text-light">Buy
                                        Tickets</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>
    <!-- All Movies End -->

    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>
</body>

</html>