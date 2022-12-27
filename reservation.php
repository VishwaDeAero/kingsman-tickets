<?php
session_start();
$_SESSION["pagename"] = "moviedetails";
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
                                <label for="seatsCount" class="form-label">Select Date</label>
                                <input type="text" class="form-control" id="reserveDate" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="seatsCount" class="form-label">Select Time</label>
                                <input type="number" class="form-control" id="seatsCount" required disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="seatsCount" class="form-label">Seats Count</label>
                                <input type="number" class="form-control" id="seatsCount" required disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="seatsCount" class="form-label">Select Seats</label>
                                <input type="number" class="form-control" id="seatsCount" required disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-end">
                            <button type="button" class="btn btn-dark">Book Seats</button>
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
        var dataid = urlParams.get('id');

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
                        console.log("test", response.result);
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
    });
    </script>
</body>

</html>