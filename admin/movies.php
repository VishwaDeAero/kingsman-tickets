<?php
session_start();
$_SESSION["pagename"] = "adminMovies";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php') ?>
    <title><?php echo $sitename; ?> - Movies</title>

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
                    <h3 class="mx-4">Movies</h3>
                </div>

                <div class="container-fluid p-2 p-md-4 my-3">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Show Date</th>
                                <th>Time</th>
                                <th>Active</th>
                                <th>Change</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Spider Man - No way home</td>
                                <td>Marvel</td>
                                <td>30-10-2022</td>
                                <td>14:30</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" value="-1" type="checkbox" id="activeSwitch"
                                            checked>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn py-0 text-warning col-auto" title="edit"><i
                                            class="fa-solid fa-pen"></i></a>
                                    <a class="btn py-0 text-danger col-auto" title="delete"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <?php include('master/jslinks.php') ?>
    <script type="text/javascript">
    $(document).ready(function() {

        $('.form-switch .form-check-input').on('change', function() {
            console.log($(this).is(':checked'))
        });

        $('#example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>