<?php
session_start();
$_SESSION["pagename"] = "myaccount";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php'); ?>
    <title>
        <?php echo $sitename; ?> - My Account
    </title>
</head>

<body>
    <?php include('master/header.php'); ?>

    <!-- User Information -->
    <div class="container shadow p-4 p-md-5 mb-5 mt-3 bg-body rounded">
        <div class="row">
            <di class="col">
                <h2>User Profile</h2>
            </di>
        </div>
        <hr class="mt-0">
        <div class="user-info">
            <div class="row g-md-4 g-3">
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        First Name :
                    </label>
                    <p class="h4">Vishwa Nipun</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Last Name :
                    </label>
                    <p class="h4">Srimal</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Mobile Number :
                    </label>
                    <p class="h4">0777123454</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Email :
                    </label>
                    <p class="h4">test@kingman.lk</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Date of Birth :
                    </label>
                    <p class="h4">14-07-1999</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        NIC Number :
                    </label>
                    <p class="h4">199919603197</p>
                </div>
            </div>
            <div class="d-grid gap-2 d-sm-block mt-4 d-md-flex justify-content-md-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#updateUserFormModal" class="btn btn-dark text-light">Update Profile</button>
                <button type="button" data-bs-toggle="modal" data-bs-target="#updatePasswordFormModal" class="btn btn-warning text-dark">Change Password</button>
            </div>
        </div>
    </div>
    <!-- User Information End -->

    <!-- Update Password Modal -->
    <div class="modal fade" id="updatePasswordFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="userFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePasswordFormLabel">Update Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updatePasswordForm" name="updatePasswordForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Old Password</label>
                            <input type="password" class="form-control password-input" id="oldPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="updatePassword" class="form-label">New Password</label>
                            <input type="password" class="form-control password-input" id="updatePassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateMatchPassword" class="form-label">Re-enter New Password</label>
                            <input type="password" class="form-control password-input" id="updateMatchPassword"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="updatePasswordBtn" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Update Password Modal End -->

    <!-- Update User Modal -->
    <div class="modal fade" id="updateUserFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="userFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateUserFormLabel">Update Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateUserForm" name="updateUserForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="updateFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="updateFirstName" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="updateLastName" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateNIC" class="form-label">NIC Number</label>
                            <input type="text" class="form-control" id="updateNIC" required>
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
                            <input type="date" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="updateDOB"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="updateContactNo" class="form-label">Contact No</label>
                            <input type="text" class="form-control" id="updateContactNo">
                        </div>
                        <div class="mb-3">
                            <label for="updateEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="updateEmail">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="updateUserBtn" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Update User Modal End -->

    <!-- Tickets Reserved -->
    <div class="container mb-5 mt-3">
        <div class="row">
            <di class="col">
                <h2 class="px-3 px-md-4">Tickets History</h2>
            </di>
        </div>

        <!-- Ticket Line -->
        <div id="ticket_line" class="row gap-2">
            <!-- Fully Cancelled Ticket -->
            <div class="container ticket shadow bg-body rounded p-4 col-12">
                <div class="row d-flex align-items-center">
                    <div class="col-md-3">
                        <p class="h4 fw-bold"><i class="fa-solid fa-ticket me-2"></i>19991960</p>
                        <p class="h5"><i class="fa-solid fa-film me-2"></i>Spider Man - No way home</p>
                        <p class="text-muted m-0"><i class="fa-solid fa-calendar-days me-2"></i>28/10/2022 16:00</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row mt-3 mt-md-2 mt-sm-0">
                            <div class="col-auto d-flex align-items-md-center">
                                <p class="h5 lh-base mb-0">Seats :</p>
                            </div>
                            <div class="col row d-flex align-items-center gap-2">
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3 mt-md-2 mt-sm-0 d-flex justify-content-center justify-content-md-end">
                        <label class="text-muted h5">
                            Cancelled
                        </label>
                    </div>
                </div>
            </div>
            <!-- Fully Cancelled Ticket End -->

            <!-- Watched Ticket -->
            <div class="container ticket shadow bg-body rounded p-4 col-12">
                <div class="row d-flex align-items-center">
                    <div class="col-md-3">
                        <p class="h4 fw-bold"><i class="fa-solid fa-ticket me-2"></i>19991960</p>
                        <p class="h5"><i class="fa-solid fa-film me-2"></i>Spider Man - No way home</p>
                        <p class="text-muted m-0"><i class="fa-solid fa-calendar-days me-2"></i>28/10/2022 16:00</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row mt-3 mt-md-2 mt-sm-0">
                            <div class="col-auto d-flex align-items-md-center">
                                <p class="h5 lh-base mb-0">Seats :</p>
                            </div>
                            <div class="col row d-flex align-items-center gap-2">
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3 mt-md-2 mt-sm-0 d-flex justify-content-center justify-content-md-end">
                        <label class="text-success h5">
                            Watched
                        </label>
                    </div>
                </div>
            </div>
            <!-- Watched Ticket End -->

            <!-- Future Ticket - w/ Cancel Btn -->
            <div class="container ticket shadow bg-body rounded p-4 col-12">
                <div class="row d-flex align-items-center">
                    <div class="col-md-3">
                        <p class="h4 fw-bold"><i class="fa-solid fa-ticket me-2"></i>19991960</p>
                        <p class="h5"><i class="fa-solid fa-film me-2"></i>Spider Man - No way home</p>
                        <p class="text-muted m-0"><i class="fa-solid fa-calendar-days me-2"></i>28/10/2022 16:00</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row mt-3 mt-md-2 mt-sm-0">
                            <div class="col-auto d-flex align-items-md-center">
                                <p class="h5 lh-base mb-0">Seats :</p>
                            </div>
                            <div class="col row d-flex align-items-center gap-2">
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                                <span class="bg-dark col-auto text-light px-2 py-1 rounded">A1</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3 mt-md-2 mt-sm-0 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-outline-danger">Cancel</button>
                    </div>
                </div>
            </div>
            <!-- Future Ticket End -->
        </div>
        <!-- Ticket Line End -->
    </div>

    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>
    <script type="text/javascript">
    $(document).ready(function() {

        function showAllTickets() {
            var getData = new FormData();
            getData.append('function', 'alltickets');
            getData.append('user_id', '1');
            $.ajax({
                type: "POST",
                url: 'controllers/reservation.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    if (!response.error) {
                        var tickets_string = "";
                        response.result.forEach(element => {
                            var ticket = element.ticket;
                            var movie = element.movie;
                            var screen = element.screen;
                            var seats = element.seats;
                            var seat_string = "";
                            seats.forEach(seat => {
                                seat_string += `<span class="bg-dark col-auto text-light px-2 py-1 rounded" data-id="${seat[0].id}" title="${seat[0].seat_category}">${seat[0].code}</span>`;
                            });
                            tickets_string += `<div class="container ticket shadow bg-body rounded p-4 col-12">
                                                    <div class="row d-flex align-items-center">
                                                        <div class="col-md-3">
                                                            <p class="h4 fw-bold"><i class="fa-solid fa-ticket me-2"></i>${ticket.id}</p>
                                                            <p class="h5"><i class="fa-solid fa-film me-2"></i>${movie.name}</p>
                                                            <p class="text-muted m-0"><i class="fa-solid fa-calendar-days me-2"></i>${screen.date} ${screen.time}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row mt-3 mt-md-2 mt-sm-0">
                                                                <div class="col-auto d-flex align-items-md-center">
                                                                    <p class="h5 lh-base mb-0">Seats :</p>
                                                                </div>
                                                                <div class="col row d-flex align-items-center gap-2">
                                                                    ${seat_string}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-3 mt-md-2 mt-sm-0 d-grid gap-2 d-md-flex justify-content-md-end">
                                                            <label class="text-success h5">
                                                                ${ticket.status}
                                                            </label>
                                                            <button class="btn btn-outline-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>`;
                        });
                        $('#ticket_line').empty().append(tickets_string);
                    } else {
                        Swal.fire({
                            title: 'Error Loading Tickets!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        }
        showAllTickets();
    });
    </script>
</body>

</html>