<?php
session_start();
$_SESSION["pagename"] = "moviedetails";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title>
        <?php echo $sitename; ?> - Movie Details
    </title>
</head>

<body>
    <?php include('master/header.php'); ?>

    <div class="container p-3 p-sm-4 p-lg-4 mt-lg-4 shadow-sm p-3 mb-5 bg-body rounded">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="img-container">
                    <img class="img-thumbnail img-fluid" src="assets/images/movies/spider-man.jpg" alt="spiderman">
                </div>
            </div>
            <div class="col">
                <h2 class="display-5 my-2 my-sm-1">Spider Man - No way home</h2>
                <hr class="mt-0 mt-sm-2 mb-lg-4">
                <div class="row">
                    <div class="col col-sm-6 col-md-12">
                        <small class="bg-warning p-2 rounded-3 align-middle">
                            <span class="d-none d-md-inline">Rating:&nbsp;</span>
                            <span class="fw-bold">4.8/5</span>
                        </small>
                    </div>
                    <div
                        class="col col-sm-6 col-md-12 d-flex justify-content-end justify-content-md-start mt-md-4 mt-0 h4">
                        <span class="">Category:&nbsp;</span>
                        <span class="fw-bold">Action</span>
                    </div>
                </div>
                <div class="pt-3">
                    <!-- <h4>Description:</h4> -->
                    <p class="lead">
                        Spider-Man: No Way Home is a 2021 American superhero film based on the Marvel Comics character
                        Spider-Man, co-produced by Columbia Pictures and Marvel Studios and distributed by Sony Pictures
                        Releasing. It is the sequel to Spider-Man: Homecoming (2017) and Spider-Man: Far From Home
                        (2019), and the 27th film in the Marvel Cinematic Universe (MCU). The film was directed by Jon
                        Watts and written by Chris McKenna and Erik Sommers. It stars Tom Holland as Peter Parker /
                        Spider-Man alongside Zendaya, Benedict Cumberbatch, Jacob Batalon, Jon Favreau, Jamie Foxx,
                        Willem Dafoe, Alfred Molina, Benedict Wong, Tony Revolori, Marisa Tomei, Andrew Garfield, and
                        Tobey Maguire. In the film, Parker asks Dr. Stephen Strange (Cumberbatch) to use magic to make
                        his identity as Spider-Man a secret again following its public revelation at the end of Far From
                        Home. When the spell goes wrong because of Parker's actions, the multiverse is broken open,
                        which allows visitors from alternate realities to enter Parker's universe.
                    </p>
                </div>
                <div class="d-grid gap-2 d-sm-block">
                    <button type="button" class="btn btn-lg btn-dark text-light">Buy Tickets</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>
</body>

</html>