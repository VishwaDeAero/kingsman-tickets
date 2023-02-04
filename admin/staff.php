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
                                        <input type="date" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="addDOB" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addContactNo" class="form-label">Contact No</label>
                                        <input type="text" class="form-control" id="addContactNo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="addEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="addEmail">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-check-label" for="addActive">User Active</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="addActive" checked>
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
            console.log("sendData",sendData);
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