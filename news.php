<?php
session_start();
$_SESSION["pagename"] = "allnews";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title>
        <?php echo $sitename; ?> - News
    </title>
</head>

<body>
    <?php include('master/header.php'); ?>

    <!-- All Movies -->
    <div class="container p-3 p-sm-4 p-lg-2 mt-lg-4">
        <div class="row">
            <div class="col">
                <h2 class="fw-bold">Cinema News</h2>
            </div>
        </div>
        <hr class="m-0">
    </div>
    <div class="container p-3 p-sm-4 p-lg-2 mt-lg-4">
        <div class="row row-cols-1 row-cols-sm-2 g-4 mb-2">
            <div class="col">
                <div class="card flex-row">
                    <div class="col-4">
                        <img class="card-img-left w-100 h-100" src="https://picsum.photos/400/350" />
                    </div>
                    <div class="card-body col-8 p-2">
                        <h5 class="card-title mb-1 mb-md-3">Left image</h5>
                        <p class="card-text small muted">This is a longer card with supporting text below as a natural
                            lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All Movies End -->

    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>
</body>

</html>