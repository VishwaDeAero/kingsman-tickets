<?php
session_start();
$_SESSION["pagename"] = "myaccount";

// Redirect to Login If User not Logged in
if(!isset($_SESSION["user"])){
    header('Location: login.php');
    die();
}
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
                    <p class="h4"><?php echo $_SESSION["user"]["first_name"] ?></p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Last Name :
                    </label>
                    <p class="h4"><?php echo $_SESSION["user"]["last_name"] ?></p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Mobile Number :
                    </label>
                    <p class="h4"><?php echo $_SESSION["user"]["contact_no"] ?></p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Email :
                    </label>
                    <p class="h4"><?php echo $_SESSION["user"]["email"] ?></p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        Date of Birth :
                    </label>
                    <p class="h4"><?php echo $_SESSION["user"]["dob"] ?></p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <label class="h6 mb-0">
                        NIC Number :
                    </label>
                    <p class="h4"><?php echo $_SESSION["user"]["nic"] ?></p>
                </div>
            </div>
            <div class="d-grid gap-2 d-sm-block mt-4 d-md-flex justify-content-md-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#updateUserFormModal"
                    class="btn btn-dark text-light">Update Profile</button>
                <button type="button" data-bs-toggle="modal" data-bs-target="#updatePasswordFormModal"
                    class="btn btn-warning text-dark">Change Password</button>
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
                            <input type="password" class="form-control" id="oldPassword" required>
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
                            <input type="text" class="form-control" id="updateFirstName" value="<?php echo $_SESSION["user"]["first_name"] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="updateLastName" value="<?php echo $_SESSION["user"]["last_name"] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateNIC" class="form-label">NIC Number</label>
                            <input type="text" class="form-control" id="updateNIC" value="<?php echo $_SESSION["user"]["nic"] ?>" required>
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
                            <input type="date" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="updateDOB" value="<?php echo $_SESSION["user"]["dob"] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateContactNo" class="form-label">Contact No</label>
                            <input type="text" class="form-control" id="updateContactNo" value="<?php echo $_SESSION["user"]["contact_no"] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="updateEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="updateEmail" value="<?php echo $_SESSION["user"]["email"] ?>">
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

    <!-- Cancellation Modal -->
    <div class="modal fade" id="cancelTicketsFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="cancelTicketsFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelTicketsFormLabel">Cancel Tickets</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="cancelTicketsForm" name="cancelTicketsForm" enctype="multipart/form-data">
                    <input type="hidden" id="cancelUserId" value="">
                    <input type="hidden" id="cancelReservationId" value="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="selectTickets" class="form-label">Select Tickets to Cancel</label>
                        </div>
                        <div id="bookedSeatsCancel" class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">2</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Exit</button>
                        <button type="submit" id="cancelTicketsBtn" class="btn btn-dark">Cancel Tickets</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Cancellation Modal End -->

    <?php include('master/footer.php'); ?>
    <?php include('master/jslinks.php'); ?>
    <script type="text/javascript">
    $(document).ready(function() {
        const user_id = <?php echo $_SESSION["user"]["id"] ?>;

        function showAllTickets() {
            var getData = new FormData();
            getData.append('function', 'alltickets');
            getData.append('user_id', user_id);
            $.ajax({
                type: "POST",
                url: 'controllers/reservation.php',
                processData: false,
                contentType: false,
                data: getData,
                success: function(response) {
                    console.log(response)
                    if (!response.error) {
                        var tickets_string = "";
                        response.result.forEach(element => {
                            var ticket = element.ticket;
                            var movie = element.movie;
                            var screen = element.screen;
                            var seats = element.seats;
                            var seat_string = "";
                            var seatcancel = [];
                            var seatcancelid = [];
                            seats.forEach(seat => {
                                seatcancel.push(seat.code);
                                seatcancelid.push(seat.id);
                                seat_string +=
                                    `<span class="bg-dark col-auto text-light px-2 py-1 rounded" data-id="${seat.id}" title="${seat.seat_category}">${seat.code}</span>`;
                            });
                            tickets_string += `<div class="container ticket shadow bg-body rounded p-4 col-12">
                                                    <div class="row d-flex align-items-center">
                                                        <div class="col-md-3">
                                                            <p class="h4 fw-bold"><i class="fa-solid fa-ticket me-2"></i>${ticket.id}</p>
                                                            <p class="h5"><i class="fa-solid fa-film me-2"></i>${movie.name}</p>
                                                            <p class="text-muted"><i class="fa-solid fa-calendar-days me-2"></i>${screen.date} ${screen.time}</p>
                                                            <p class="h4 m-0 fw-bold">Rs.${parseFloat(element.price).toFixed(2)}</p>
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
                                                            <button class="btn btn-outline-danger" data-bs-toggle="modal" data-res="${ticket.id}" data-set="${seatcancel}" data-id-set="${seatcancelid}"
                                                                data-bs-target="#cancelTicketsFormModal">Cancel</button>
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

        var passwordMatch = true;

        // Check Passwords Match
        $(".password-input").keyup(function(event) {
            if ($('#updatePassword').val() != $('#updateMatchPassword').val()) {
                $(".password-input").addClass("border-danger");
                passwordMatch = false;
            } else {
                $(".password-input").removeClass("border-danger");
                passwordMatch = true;
            }
        });

        //Update Password
        $('#updatePasswordForm').submit(function(e) {
            e.preventDefault();
            if ((!passwordMatch) || $('#updatePassword').val() == "") {
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
            sendData.append('function', 'password');
            // Append Update Info
            sendData.append('oldPassword', $('#oldPassword').val());
            sendData.append('updatePassword', $('#updatePassword').val());
            sendData.append('id', user_id);
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
                        $('#updatePasswordForm').trigger('reset');
                        Swal.fire({
                            title: 'Password Updated!',
                            text: 'Please login again',
                            icon: 'success',
                        }).then((result) => {
                            window.location.href = "login.php";
                        });
                    } else {
                        $('#updatePasswordForm').trigger('reset');
                        Swal.fire({
                            title: 'Password Update Failed!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        })

        //Update Account Info
        $('#updateUserForm').submit(function(e) {
            e.preventDefault();
            // if ($('#updatePassword').val() == "") {
            //     Swal.fire({
            //         title: 'Data Incomplete!',
            //         text: 'Please complete info and try again',
            //         icon: 'error',
            //         showConfirmButton: true
            //     });
            //     return false;
            // }
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
            sendData.append('id', user_id);
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
                        $('#updateUserForm').trigger('reset');
                        Swal.fire({
                            title: 'Profile Updated!',
                            text: 'Please login again to validate changes',
                            icon: 'success',
                        }).then((result) => {
                            $("#updateUserFormModal").modal('hide');
                            window.location.href = "login.php";
                        });
                    } else {
                        $('#updateUserForm').trigger('reset');
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

        // Update Cancellation Modal on Popup
        $('#cancelTicketsFormModal').on('show.bs.modal', function(e) {
            var btn = e.relatedTarget;
            var seatcodes = (btn.attributes['data-set'].value).split(",");
            var seatids = (btn.attributes['data-id-set'].value).split(",");
            var cancelseats = "";
            var seatcount = 0;
            if (seatcodes == "") {
                Swal.fire({
                    title: 'No Seats to Cancel!',
                    icon: 'error',
                    showConfirmButton: true
                });
                return false;
            }
            seatcodes.forEach(seat => {
                cancelseats +=
                    `<div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="${seatids[seatcount]}" value="${seatids[seatcount]}">
                        <label class="form-check-label" for="${seatids[seatcount]}">${seat}</label>
                    </div>`;
                seatcount++;
            });
            $('#bookedSeatsCancel').empty().append(cancelseats);
            $('#cancelReservationId').val(btn.attributes['data-res'].value);
            $('#cancelUserId').val(user_id);
        })
        // ----------------------------------------------

        // Cancel Tickets
        $('#cancelTicketsForm').submit(function(e) {
            e.preventDefault();
            var selected = [];
            $('#bookedSeatsCancel input:checked').each(function() {
                selected.push($(this).attr('value'));
            });
            var sendData = new FormData();
            sendData.append('function', 'cancel');
            sendData.append('reservation', $('#cancelReservationId').val());
            sendData.append('seats', selected);
            $.ajax({
                type: "POST",
                url: 'controllers/reservation.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    console.log(response)
                    if (!response.error) {
                        Swal.fire({
                            title: 'Seats Cancelled',
                            text: response.result,
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then((result) => {
                            $("#cancelTicketsFormModal").modal('hide');
                            showAllTickets();
                        });
                    } else {
                        Swal.fire({
                            title: 'Seats Cancellation Error!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        });
    });
    </script>
</body>

</html>