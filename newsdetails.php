<?php
session_start();
$_SESSION["pagename"] = "newsdetails";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title>
        <?php echo $sitename; ?> - News Details
    </title>
    <style>
        .news-img{
            max-height: 30rem;
        }
    </style>
</head>

<body>
    <?php include('master/header.php'); ?>

    <div class="container p-3 p-sm-4 p-lg-4 mt-lg-4 shadow-sm p-3 mb-5 bg-body rounded">
        <div class="row">
            <div class="col">
                <h2 id="news_title" class="display-5 my-2 my-sm-1">Sample Title</h2>
                <hr class="mt-0 mt-sm-2 mb-lg-4">
                <div class="img-container text-center">
                    <img id="news_img" class="img-thumbnail img-fluid news-img" src="assets/images/movies/spider-man.jpg" alt="News Image">
                </div>
                <div class="pt-3">
                    <p id="news_desc" class="lead">
                        News
                    </p>
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

        function loadNews(id) {
            var getData = new FormData();
            getData.append('function', 'single');
            getData.append('id', id);
            $.ajax({
                type: "POST",
                url: 'controllers/news.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    if (!response.error) {
                        console.log("test", response.result);
                        var img_path = 'assets/images/news/'+response.result[0].img_path;
                        $("#news_title").text(response.result[0].title);
                        $("#news_desc").text(response.result[0].description);
                        $("#news_img").attr("src",img_path);
                    } else {
                        Swal.fire({
                            title: 'News Loading Error!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        }
        loadNews(dataid);
    });
    </script>
</body>

</html>