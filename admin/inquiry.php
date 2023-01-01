<?php
session_start();
$_SESSION["pagename"] = "adminInquiry";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php') ?>
    <title><?php echo $sitename; ?> - Inquiries</title>
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

                <!-- Add New Modal -->
                <div class="modal fade" id="viewInquiryModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="viewInquiryLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ViewInquiryTitle">Email Subject</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button> -->
                                <button type="button" id="markRepliedBtn" class="btn btn-dark">Mark as Replied</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add News Modal End -->

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="mx-2 mx-md-4 col">Customer Inquiries</h3>
                </div>

                <div class="container-fluid p-2 p-md-4 my-3">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created Date</th>
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


        function showInquiries() {
            var getData = new FormData();
            getData.append('function', 'list');
            $.ajax({
                type: "POST",
                url: '../controllers/inquiry.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    console.log(response.result)
                    if (response.result) {
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
                                    data: 'name'
                                },
                                {
                                    data: 'email'
                                },
                                {
                                    data: 'subject'
                                },
                                {
                                    data: 'description'
                                },
                                {
                                    data: 'created_at'
                                },
                                {
                                    data: 'action_buttons'
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
        showInquiries();

        // Change Status

        // ----------------------------------------------
    });
    </script>
</body>

</html>