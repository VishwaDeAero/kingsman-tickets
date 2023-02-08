<?php
session_start();
$_SESSION["pagename"] = "adminStaff";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php') ?>
    <title><?php echo $sitename; ?> - Staff</title>
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

                <!-- Add New Staff Modal -->
                <div class="modal fade" id="addStaffFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staffFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addStaffFormLabel">New Staff</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="addStaffForm" name="addStaffForm" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="addFirstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="addFirstName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addLastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="addLastName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="addUsername" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control password-input" id="addPassword"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addMatchPassword" class="form-label">Re-enter Password</label>
                                        <input type="password" class="form-control password-input" id="addMatchPassword"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addNIC" class="form-label">NIC Number</label>
                                        <input type="text" class="form-control" id="addNIC" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addGender" class="form-label">Gender</label>
                                        <select class="form-select" aria-label="Gender" id="addGender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addDOB" class="form-label">Date of Birth</label>
                                        <input type="date" max="<?php echo date('Y-m-d'); ?>" class="form-control"
                                            id="addDOB" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addContactNo" class="form-label">Contact No</label>
                                        <input type="text" class="form-control" id="addContactNo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="addEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="addEmail" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-check-label" for="addActive">User Active</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="addActive"
                                                checked>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="addStaffBtn" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add New Staff Modal End -->

                <!-- Update Staff Modal -->
                <div class="modal fade" id="updateStaffFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="userFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateStaffFormLabel">Update Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="updateStaffForm" name="updateStaffForm" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" id="updateId" value="" required>
                                    <div class="mb-3">
                                        <label for="updateFirstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="updateFirstName" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateLastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="updateLastName" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateNIC" class="form-label">NIC Number</label>
                                        <input type="text" class="form-control" id="updateNIC" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateGender" class="form-label">Gender</label>
                                        <select class="form-select" aria-label="Gender" id="updateGender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateDOB" class="form-label">Date of Birth</label>
                                        <input type="date" max="<?php echo date('Y-m-d'); ?>" class="form-control"
                                            id="updateDOB" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateContactNo" class="form-label">Contact No</label>
                                        <input type="text" class="form-control" id="updateContactNo" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="updateEmail" value="" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="updateStaffBtn" class="btn btn-warning">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Update Staff Modal End -->

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="mx-2 mx-md-4 col">Staff Information</h3>
                    <div class="col-auto">
                        <button class="btn btn-outline-dark fw-bold" data-bs-toggle="modal"
                            data-bs-target="#addStaffFormModal"><i class="fa-solid fa-plus me-2"></i>Add New
                            Staff</button>
                    </div>
                </div>

                <div class="container-fluid p-2 p-md-4 my-3">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>NIC</th>
                                <th>Gender</th>
                                <th>Birth Date</th>
                                <th>Contact No</th>
                                <th>Email</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- <tbody>
                            <tr>
                                <td>
                                    <a class="btn py-0 text-warning col-auto" title="edit"><i
                                            class="fa-solid fa-pen"></i></a>
                                    <a class="btn py-0 text-danger col-auto" title="delete"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody> -->
                    </table>
                </div>
            </main>
        </div>
    </div>
    <?php include('master/jslinks.php') ?>
    <script type="text/javascript">
    $(document).ready(function() {
        var passwordMatch = true;

        // Email Validate
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        // Check Passwords Match
        $(".password-input").keyup(function(event) {
            if ($('#addPassword').val() != $('#addMatchPassword').val()) {
                $(".password-input").addClass("border-danger");
                passwordMatch = false;
            } else {
                $(".password-input").removeClass("border-danger");
                passwordMatch = true;
            }
        });

        // Active - Deactive User
        $(document).on('change', '.staff-active', function(e) {
            e.preventDefault();
            var user_id = this.attributes['data-id'].value;
            var checked = $(this).is(":checked");
            if (user_id) {
                Swal.fire({
                    title: 'Please Wait',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                });
                Swal.showLoading();
                var sendData = new FormData();
                // Append Function to Call
                sendData.append('function', 'active');
                // Append Update Info
                sendData.append('id', user_id);
                sendData.append('checked', checked);
                $.ajax({
                    type: "POST",
                    url: '../controllers/users.php',
                    processData: false,
                    contentType: false,
                    data: sendData,
                    success: function(response) {
                        console.log(response);
                        if ((!response.error) && response.result) {
                            Swal.close();
                        } else {
                            Swal.fire(
                                'Oops!',
                                'Something went wrong',
                                'error'
                            );
                        }
                    }
                });
            } else {
                if (checked) {
                    $(this).prop('checked', true);
                } else {
                    $(this).prop('checked', false);
                }
                Swal.fire({
                    title: 'Oops',
                    text: 'Something Went Wrong.',
                    icon: 'error',
                    showConfirmButton: true
                });
            }
        });

        // Update Staff Modal on Popup
        $('#updateStaffFormModal').on('show.bs.modal', function(e) {
            var btn = e.relatedTarget;
            var user_id = btn.attributes['data-id'].value;
            var data_set = JSON.parse(btn.attributes['data-set'].value);
            $('#updateId').val(data_set.id);
            $('#updateFirstName').val(data_set.first_name);
            $('#updateLastName').val(data_set.last_name);
            $('#updateNIC').val(data_set.nic);
            $('#updateGender').val(data_set.gender);
            $('#updateDOB').val(data_set.dob);
            $('#updateContactNo').val(data_set.contact_no);
            $('#updateEmail').val(data_set.email);
        })
        // ----------------------------------------------

        //Update Account Info
        $('#updateStaffForm').submit(function(e) {
            // Block if email not valid
            if (!isEmail($('#updateEmail').val())) {
                Swal.fire({
                    title: 'Incorrect Email',
                    text: 'Please Enter Correct Email',
                    icon: 'error',
                    showConfirmButton: true
                });
                return;
            }
            e.preventDefault();
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            var sendData = new FormData();
            // Append Function to Call
            sendData.append('function', 'update');
            // Append Update Info
            sendData.append('firstname', $('#updateFirstName').val());
            sendData.append('lastname', $('#updateLastName').val());
            sendData.append('nic', $('#updateNIC').val());
            sendData.append('gender', $('#updateGender').val());
            sendData.append('dob', $('#updateDOB').val());
            sendData.append('contactno', $('#updateContactNo').val());
            sendData.append('email', $('#updateEmail').val());
            sendData.append('id', $('#updateId').val());
            console.log("sendData", sendData);
            $.ajax({
                type: "POST",
                url: '../controllers/users.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    console.log(response);
                    if ((!response.error) && response.result) {
                        $('#updateStaffForm').trigger('reset');
                        showStaffs();
                        Swal.fire({
                            title: 'Staff Updated!',
                            text: 'Staff Information Changed',
                            icon: 'success',
                        }).then((result) => {
                            $("#updateStaffFormModal").modal('hide');
                        });
                    } else {
                        $('#updateStaffForm').trigger('reset');
                        Swal.fire({
                            title: 'Profile Update Failed!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        })

        // Delete Staff
        $(document).on('click', '.delete-user-btn', function(e) {
            e.preventDefault();
            var user_id = this.attributes['data-id'].value;
            console.log(user_id)
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this user?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
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
                    sendData.append('id', user_id);
                    $.ajax({
                        type: "POST",
                        url: '../controllers/users.php',
                        processData: false,
                        contentType: false,
                        data: sendData,
                        success: function(response) {
                            console.log(response);
                            if ((!response.error) && response.result) {
                                Swal.fire(
                                    'Deleted!',
                                    'Staff has been deleted.',
                                    'success'
                                ).then((result) => {
                                    showStaffs();
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

        function showStaffs() {
            var getData = new FormData();
            getData.append('function', 'stafflist');
            $.ajax({
                type: "POST",
                url: '../controllers/users.php',
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
                                    data: 'name'
                                },
                                {
                                    data: 'username'
                                },
                                {
                                    data: 'nic'
                                },
                                {
                                    data: 'gender'
                                },
                                {
                                    data: 'dob'
                                },
                                {
                                    data: 'contact_no'
                                },
                                {
                                    data: 'email'
                                },
                                {
                                    data: 'active'
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
                        }).then((result) => {
                            window.location.href = "../login.php";
                        });
                    }
                }
            });
        }
        showStaffs();

        // Add Staffs
        $('#addStaffForm').submit(function(e) {
            e.preventDefault();
            if (!passwordMatch || $('#addPassword').val() == "") {
                Swal.fire({
                    title: 'Password Mismatch!',
                    text: 'Please enter same password in each box',
                    icon: 'error',
                    showConfirmButton: true
                });
                return false;
            }
            // Block if email not valid
            if (!isEmail($('#addEmail').val())) {
                Swal.fire({
                    title: 'Incorrect Email',
                    text: 'Please Enter Correct Email',
                    icon: 'error',
                    showConfirmButton: true
                });
                return;
            }
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            var sendData = new FormData();
            // Append Function to Call
            sendData.append('function', 'add');
            // Append Staff Info
            sendData.append('firstname', $('#addFirstName').val());
            sendData.append('lastname', $('#addLastName').val());
            sendData.append('nic', $('#addNIC').val());
            sendData.append('gender', $('#addGender').val());
            sendData.append('dob', $('#addDOB').val());
            sendData.append('contact_no', $('#addContactNo').val());
            sendData.append('email', $('#addEmail').val());
            sendData.append('username', $('#addUsername').val());
            sendData.append('password', $('#addPassword').val());
            sendData.append('user_type', 'staff');
            sendData.append('active', ($('#addActive').is(":checked")) ? 1 : 0);
            console.log("sendData", sendData);
            $.ajax({
                type: "POST",
                url: '../controllers/users.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    console.log(response);
                    if ((!response.error) && response.result) {
                        $('#addStaffForm').trigger('reset');
                        Swal.fire({
                            title: 'Insert Successful!',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then((result) => {
                            $("#addStaffFormModal").modal('hide');
                            showStaffs();
                        });
                    } else {
                        Swal.fire({
                            title: 'Insert Failed!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        });
        // ----------------------------------------------
    });
    </script>
</body>

</html>