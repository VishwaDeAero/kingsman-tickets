<?php
session_start();
$_SESSION["pagename"] = "contactus";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title><?php echo $sitename; ?> - Contact Us</title>

    <style>
    .map-container-section {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .map-container-section iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }
    </style>
</head>

<body>
    <?php include('master/header.php'); ?>
    <!-- Contact Us -->
    <div class="container p-3 p-sm-2 p-lg-5 my-md-3 m-auto">
        <h3 class="font-weight-bold text-center mb-4">Contact Us</h3>
        <p class="text-center w-responsive mx-auto pb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam
            eum porro a pariatur veniam.</p>
        <div class="row">
            <div class="col-lg-5 mb-lg-0 pb-lg-3 mb-4">
                <!-- Form with header -->
                <div class="card">
                    <div class="card-body">
                        <!-- Header -->
                        <div class="form-header blue accent-1">
                            <h3 class="mt-2">Write To Us</h3>
                        </div>
                        <p class="dark-grey-text">We'll write rarely, but only the best content.</p>
                        <!-- Body -->
                        <form id="inquiryForm" name="inquiryForm" >
                            <div class="md-form">
                                <label class="mt-3 mb-2" for="form-name"><i
                                        class="fas fa-user prefix grey-text me-2"></i> Your name</label>
                                <input type="text" id="form-name" class="form-control" required>
                            </div>
                            <div class="md-form">
                                <label class="mt-3 mb-2" for="form-email"><i
                                        class="fas fa-envelope prefix grey-text me-2"></i> Your email</label>
                                <input type="text" id="form-email" class="form-control" required>
                            </div>
                            <div class="md-form">
                                <label class="mt-3 mb-2" for="form-subject"><i
                                        class="fas fa-tag prefix grey-text me-2"></i> Subject</label>
                                <input type="text" id="form-subject" class="form-control" required>
                            </div>
                            <div class="md-form">
                                <label class="mt-3 mb-2" for="form-text"><i
                                        class="fas fa-pencil-alt prefix grey-text me-2"></i> Send message</label>
                                <textarea id="form-text" class="form-control md-textarea" rows="3" required></textarea>
                            </div>
                            <div class="text-center mt-3 d-grid">
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <!--Google map-->
                <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1177.5429226854717!2d79.9638813380563!3d6.918515576769199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcf0b6ca717e99776!2sHorizon%20Campus%20-%20Faculty%20OF%20Information%20Technology!5e0!3m2!1sen!2slk!4v1665209929182!5m2!1sen!2slk"
                        frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <!-- Buttons-->
                <div class="row text-center">
                    <div class="col-md-4">
                        <a class="btn-floating btn-lg text-dark accent-1">
                            <i class="fas fa-map-marker-alt"></i>
                        </a>
                        <p>No.112, Kaduwela Rd, Malabe.
                            <br>Sri Lanka
                        </p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn-floating btn-lg text-dark accent-1">
                            <i class="fas fa-phone"></i>
                        </a>
                        <p>+ 01 234 567 89
                            <br>+ 01 234 567 89
                        </p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn-floating btn-lg text-dark accent-1">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <p>info@cineflixmovies.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us End-->
    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>
    
    <script type="text/javascript">
    $(document).ready(function() {

        // Add New Inquiry
        $('#inquiryForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            $.ajax({
                type: "POST",
                url: 'controllers/inquiry.php',
                dataType: 'json',
                data: {
                    function: 'add',
                    data: {
                        'name': $('#form-name').val(),
                        'email': $('#form-email').val(),
                        'subject': $('#form-subject').val(),
                        'message': $('#form-text').val(),
                    }
                },
                success: function(response) {
                    console.log(response)
                    if (!response.error) {
                        $('#inquiryForm').trigger('reset');
                        Swal.fire({
                            title: 'Insert Successful!',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        $("#inquiryForm").modal('hide');
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