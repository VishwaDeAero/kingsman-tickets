<?php
session_start();
$_SESSION["pagename"] = "register";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title><?php echo $sitename; ?> - Register</title>

    <style>
    .h-custom {
        /* height: 80vh; */
    }

    @media (max-width: 1000px) {
        .h-custom {
            height: 100%;
        }
    }
    </style>
</head>

<body>
    <?php include('master/header.php'); ?>

    <!-- Register -->
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                        <p class="text-center h2 fw-bold mx-1 mx-md-4 mt-4">Register</p>
                        <hr class="mx-1 mx-md-4">
                        <form id="regFrom" class="mx-1 mx-md-4">
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-font fa-lg me-3 mb-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="firstName">First Name</label>
                                    <input type="text" id="firstName" class="form-control" required/>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-font fa-lg me-3 mb-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="lastName">Last Name</label>
                                    <input type="text" id="lastName" class="form-control" required/>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-user fa-lg me-3 mb-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="username">Userame</label>
                                    <input type="text" id="username" class="form-control" required/>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-id-card fa-lg me-3 mb-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="NIC">NIC Number</label>
                                    <input type="text" id="NIC" class="form-control" required />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-venus-mars fa-lg me-3 mb-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="gender">Gender</label>
                                    <select class="form-select" aria-label="Gender" id="gender" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-calendar-days fa-lg me-3 mb-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="DOB">Date of Birth</label>
                                    <input type="date" max="<?php echo date('Y-m-d'); ?>" id="DOB"
                                        class="form-control" required/>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-envelope fa-lg me-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" class="form-control" required/>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-phone fa-lg me-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="contactNo">Contact No</label>
                                    <input type="text" id="contactNo" class="form-control" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-key fa-lg me-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" class="form-control password-input" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-end mb-4">
                                <i class="fas fa-lock fa-lg me-3 mb-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <label class="form-label" for="matchPassword">Repeat your password</label>
                                    <input type="password" id="matchPassword" class="form-control password-input" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button id="regBtn" type="button" class="btn btn-warning btn-lg">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                        <img src="assets/images/login/register-img.webp" class="img-fluid" alt="Register image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register End -->

    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>
    <script type="text/javascript">
    $(document).ready(function() {
        var passwordMatch = true;

        // Check Passwords Match
        $(".password-input").keyup(function(event) {
            if ($('#password').val() != $('#matchPassword').val()) {
                $(".password-input").addClass("border-danger");
                passwordMatch = false;
            } else {
                $(".password-input").removeClass("border-danger");
                passwordMatch = true;
            }
        });

        // Email Validate
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        // Add Users
        $('#regBtn').click(function(e) {
            e.preventDefault();
            if ((!passwordMatch) || $('#password').val() == "") {
                Swal.fire({
                    title: 'Password Mismatch!',
                    text: 'Please enter same password in each box',
                    icon: 'error',
                    showConfirmButton: true
                });
                return false;
            }
            // Block if email not valid
            if (!isEmail($('#email').val())) {
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
            // Append User Info
            sendData.append('firstname', $('#firstName').val());
            sendData.append('lastname', $('#lastName').val());
            sendData.append('nic', $('#NIC').val());
            sendData.append('gender', $('#gender').val());
            sendData.append('dob', $('#DOB').val());
            sendData.append('contact_no', $('#contactNo').val());
            sendData.append('email', $('#email').val());
            sendData.append('username', $('#username').val());
            sendData.append('password', $('#password').val());
            sendData.append('user_type', 'user');
            sendData.append('active', 1);
            console.log("sendData", sendData);
            $.ajax({
                type: "POST",
                url: 'controllers/users.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    console.log(response);
                    if ((!response.error) && response.result) {
                        $('#regFrom').trigger('reset');
                        Swal.fire({
                            title: 'Registration Successful!',
                            text: 'Please Login to Continue',
                            icon: 'success',
                        }).then((result) => {
                            window.location.href = "login.php";
                        });
                    } else {
                        Swal.fire({
                            title: 'Registration Failed!',
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