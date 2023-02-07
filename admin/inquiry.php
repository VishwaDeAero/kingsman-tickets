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

                <!-- View Email Modal -->
                <div class="modal fade" id="viewInquiryModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="InquiryModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewInquiryLabel">View Email</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="fromEmail" class="form-label fw-bold">From :</label>
                                    <p id="fromEmail"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="nameEmail" class="form-label fw-bold">Name :</label>
                                    <p id="nameEmail"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="subjectEmail" class="form-label fw-bold">Subject :</label>
                                    <p id="subjectEmail"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="descriptionEmail" class="form-label fw-bold">Description :</label>
                                    <p id="descriptionEmail"></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a type="button" id="sendEmailReply" href="#" class="btn btn-dark">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- View Email Modal End -->

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

        // Email Modal on Popup
        $('#viewInquiryModal').on('show.bs.modal', function(e) {
            var btn = e.relatedTarget;
            var email_id = btn.attributes['data-id'].value;
            var data_set = JSON.parse(btn.attributes['data-set'].value);
            console.log(data_set);
            $('#fromEmail').text(data_set.email);
            $('#nameEmail').text(data_set.name);
            $('#subjectEmail').text(data_set.subject);
            $('#descriptionEmail').text(data_set.message);
            $("#sendEmailReply").attr("href", "mailto:"+data_set.email);
        })
        // ----------------------------------------------


        // Load Inquiries in a Table
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
        showInquiries();

        // Delete Movie Screen
        $(document).on('click', '.delete-inquiry-btn', function(e) {
            e.preventDefault();
            var inquiry_id = this.attributes['data-id'].value;
            console.log(inquiry_id)
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this Inquiry?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
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
                    sendData.append('function', 'delete');
                    // Append Update Info
                    sendData.append('id', inquiry_id);
                    $.ajax({
                        type: "POST",
                        url: '../controllers/inquiry.php',
                        processData: false,
                        contentType: false,
                        data: sendData,
                        success: function(response) {
                            console.log(response);
                            if ((!response.error) && response.result) {
                                Swal.fire(
                                    'Deleted!',
                                    'Inquiry has been deleted.',
                                    'success'
                                ).then((result) => {
                                    showInquiries();
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