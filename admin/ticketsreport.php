<?php
session_start();
$_SESSION["pagename"] = "reportTickets";
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
                    <h3 class="mx-2 mx-md-4 col">Tickets Report</h3>
                </div>

                <div class="container-fluid p-2 p-md-4 my-3">
                    <div class="row mb-5">
                        <div class="col">
                            <div class="d-flex">
                                <label for="startDate" class="form-label col-auto me-2 mb-0 align-self-center">Start Date</label>
                                <input type="date" value="<?php echo date('Y-m-01'); ?>" class="form-control col" id="startDate" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex">
                                <label for="endDate" class="form-label col-auto me-2 mb-0 align-self-center">End Date</label>
                                <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control col" id="endDate" required>
                            </div>
                        </div>
                        <div class="col text-center text-sm-start">
                            <div class="">
                                <button type="button" id="searchTickets" class="btn btn-dark">Search</button>
                            </div>
                        </div>
                    </div>
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
                                <th>Status</th>
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

        $('#searchTickets').click(function(){
            showTickets();
        })

        function showTickets() {
            var getData = new FormData();
            getData.append('function', 'tickets');
            getData.append('startdate', $('#startDate').val());
            getData.append('enddate', $('#endDate').val());
            $.ajax({
                type: "POST",
                url: '../controllers/reports.php',
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
                            responsive: true,
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