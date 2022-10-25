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
                    <h3 class="mx-2 mx-md-4">Categories</h3>
                </div>
                <div class="container-fluid p-2 px-md-4 pt-2 my-3">
                    <div class="row gap-1 m-0">
                        <!-- Category Item -->
                        <div class="col-auto border rounded-3 bg-dark text-light p-2">
                            <div class="row gap-1">
                                <div class="col-auto"><h5 class="m-0">Marvel</h5></div>
                                <div class="col">
                                    <a class="btn btn-sm p-0 text-light" title="edit"><i class="fa-solid fa-pen"></i></a>
                                    <a class="btn btn-sm p-0 ms-2 text-light " title="delete"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid d-md-block gap-2 my-2">
                        <button class="btn btn-sm btn-outline-dark fw-bold"><i class="fa-solid fa-plus me-2"></i>Add New Category</button>
                    </div>
                </div>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="mx-2 mx-md-4">Movies</h3>
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