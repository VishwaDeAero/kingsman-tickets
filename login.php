<?php
session_start();
$_SESSION["pagename"] = "login";
unset($_SESSION["user"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title><?php echo $sitename; ?> - Login</title>

    <style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: 80vh;
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
    </style>
</head>

<body>
    <?php include('master/header.php'); ?>

    <!-- Login -->
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="assets/images/login/login-img.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form id="loginForm">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <h2 class="text-center fw-bold">Sign In</h2>
                    </div>
                        <hr>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" id="username" class="form-control form-control-lg" placeholder="Enter Your Username" />
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" class="form-control form-control-lg"  placeholder="Enter password" />
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button id="loginBtn" type="button" class="btn btn-warning btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                                class="link-primary">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Login End -->

    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>
    <script type="text/javascript">
    $(document).ready(function() {

        // Add Staffs
        $('#loginBtn').click(function(e) {
            e.preventDefault();
            if ($('#username').val() == "" || $('#password').val() == "") {
                Swal.fire({
                    title: 'Please Fill Username and Password!',
                    text: 'Cant proceed without username and password.',
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
            sendData.append('function', 'login');
            // Append Login Info
            sendData.append('username', $('#username').val());
            sendData.append('password', $('#password').val());
            console.log("sendData",sendData);
            $.ajax({
                type: "POST",
                url: 'controllers/users.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    console.log(response);
                    if ((!response.error) && response.result) {
                        $('#loginForm').trigger('reset');
                        Swal.fire({
                            title: 'Login Successful!',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then((result) => {
                            if(response.result.user_type == 'staff'){
                                window.location.href = "admin/index.php";
                            }else if(response.result.user_type == 'user'){
                                window.location.href = "index.php";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Login Failed!',
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