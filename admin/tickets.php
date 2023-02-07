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
                            responsive: true,
                            data: response.result,
                            order: [[5, 'desc']], // Order by Date Descending 
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

        // Mark as Paid
        $(document).on('click', '.mark-paid-btn', function(e) {
            e.preventDefault();
            var reservation_id = this.attributes['data-id'].value;
            console.log(reservation_id)
            Swal.fire({
                title: 'Mark as Paid?',
                text: "You cannot undone this",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Please Wait',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    });
                    Swal.showLoading();
                    var sendData = new FormData();
                    // Append Function to Call
                    sendData.append('function', 'pay');
                    // Append Update Info
                    sendData.append('id', reservation_id);
                    $.ajax({
                        type: "POST",
                        url: '../controllers/tickets.php',
                        processData: false,
                        contentType: false,
                        data: sendData,
                        success: function(response) {
                            console.log(response);
                            if ((!response.error) && response.result) {
                                Swal.fire(
                                    'Paid!',
                                    'Reservation has been marked paid.',
                                    'success'
                                ).then((result) => {
                                    showTickets();
                                });
                            } else {
                                Swal.fire(
                                    'Oops!',
                                    'Something went wrong',
                                    'error'
                                );
                            }
                        }
                    });
                }
            })
        })
        // -------------------------------------------------
    });
    </script>
</body>

</html>