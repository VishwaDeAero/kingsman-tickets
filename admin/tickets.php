<?php
session_start();
$_SESSION["pagename"] = "adminTickets";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php') ?>
    <title><?php echo $sitename; ?> - Tickets</title>
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
                    <h3 class="mx-2 mx-md-4 col">Tickets Information</h3>
                </div>

                <div class="container-fluid p-2 p-md-4 my-3">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Customer</th>
                                <th>Movie</th>
                                <th>Seats</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- <tbody>
                        </tbody> -->
                    </table>
                </div>
            </main>
        </div>
    </div>
    <?php include('master/jslinks.php') ?>
    <script type="text/javascript">
    $(document).ready(function() {

        function showTickets() {
            var getData = new FormData();
            getData.append('function', 'list');
            $.ajax({
                type: "POST",
                url: '../controllers/tickets.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    if (response.result) {
                        console.log(response.result)
                        if ($.fn.DataTable.isDataTable("#example")) {
                            $('#example').DataTable().clear().destroy();
                        }
                        $('#example').DataTable({
                            data: response.result,
                            columns: [{
                                    data: 'id'
                                },
                                {
                                    data: 'customer'
                                },
                                {
                                    data: 'movie'
                                },
                                {
                                    data: 'seats'
                                },
                                {
                                    data: 'price'
                                },
                                {
                                    data: 'date'
                                },
                                {
                                    data: 'time'
                                },
                                {
                                    data: 'action'
                                }
                            ]
                        });
                    } else {
                        Swal.fire({
                            title: 'Table Error!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        }
        showTickets();
    });
    </script>
</body>

</html>