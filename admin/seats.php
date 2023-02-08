<?php
session_start();
$_SESSION["pagename"] = "adminSeats";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php') ?>
    <title><?php echo $sitename; ?> - Seats</title>
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

                <!-- Change Layout Modal -->
                <div class="modal fade" id="changeLayoutFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="seatsFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changeLayoutFormLabel">Update Layout</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="changeLayoutForm" name="changeLayoutForm" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="formupload" class="form-label">Upload Seats Layout Image</label>
                                        <div class="input-images"></div>
                                    </div>
                                    <span class="text-danger">* Image must be in png file format</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="changeLayoutBtn" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Change Layout Modal End -->

                <!-- Add Price Modal -->
                <div class="modal fade" id="addPriceFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="priceFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addPriceFormLabel">Update Ticket Price</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="addPriceForm" name="addPriceForm">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="addPriceCategory" class="form-label">Seat Category</label>
                                        <select class="form-select seat-category-list" aria-label="Select Seat Category"
                                            id="addPriceCategory" required>
                                            <option value="ODC">ODC</option>
                                            <option value="BAL">Balcony</option>
                                            <option value="BOX">Box</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addPricePrice" class="form-label">Ticket Price</label>
                                        <input type="number" class="form-control" id="addPricePrice" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="addPriceBtn" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add Price Modal End -->

                <!-- Add Seats Modal -->
                <div class="modal fade" id="addSeatsFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="seatsFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addSeatFormLabel">New Seat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="addSeatsForm" name="addSeatsForm">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="addSeatCode" class="form-label">Seat Code</label>
                                        <input type="text" class="form-control" id="addSeatCode" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addSeatCategory" class="form-label">Seat Category</label>
                                        <select class="form-select seat-category-list" aria-label="Select Seat Category"
                                            id="addSeatCategory" required>
                                            <option value="ODC">ODC</option>
                                            <option value="BAL">Balcony</option>
                                            <option value="BOX">Box</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-check-label" for="addSeatActive">Seat Availability</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="addSeatActive" checked>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="addSeatsBtn" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add Seats Modal End -->

                <!-- Update Seats Modal -->
                <div class="modal fade" id="updateSeatFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="seatsFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateSeatFormLabel">New Seat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="updateSeatForm" name="updateSeatForm">
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" id="updateSeatId" value="-1" required>
                                    <div class="mb-3">
                                        <label for="updateSeatCode" class="form-label">Seat Code</label>
                                        <input type="text" class="form-control" id="updateSeatCode" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="updateSeatCategory" class="form-label">Seat Category</label>
                                        <select class="form-select seat-category-list" aria-label="Select Seat Category"
                                            id="updateSeatCategory" required>
                                            <option value="ODC">ODC</option>
                                            <option value="BAL">Balcony</option>
                                            <option value="BOX">Box</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-check-label" for="updateSeatActive">Seat Availability</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="updateSeatActive">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="updateSeatsBtn" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Update Seat Modal End -->

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="mx-2 mx-md-4 col">Seat Layout</h3>
                    <div class="col-auto">
                        <button class="btn btn-outline-dark fw-bold" data-bs-toggle="modal"
                            data-bs-target="#changeLayoutFormModal"><i class="fa-solid fa-plus me-2"></i>Change
                            Layout</button>
                    </div>
                </div>

                <!-- Seat Layout Image -->
                <div class="container-fluid p-2 p-md-4 my-3 text-center">
                    <img class="img-thumbnail layout-img" src="../assets/images/seat_layout/seat_layout.png" />
                </div>

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="mx-2 mx-md-4 col">Active Seats</h3>
                    <div class="col-auto">
                        <button class="btn btn-outline-dark fw-bold" data-bs-toggle="modal" data-bs-target="#addSeatsFormModal"><i class="fa-solid fa-plus me-2"></i>Add Seats</button>
                        <button class="btn btn-dark text-light fw-bold" data-bs-toggle="modal" data-bs-target="#addPriceFormModal"><i class="fa-solid fa-pen me-2"></i>Change Prices</button>
                    </div>
                </div>

                <!-- Seats Information -->
                <div class="container-fluid p-2 p-md-4 my-3">

                    <!-- ODC List -->
                    <h5 class="fw-bold">ODC Seats - Rs.<span id="odcPrice">0.00</span></h5>
                    <div id="odcList" class="row gap-1 mx-0 mb-4">
                        <!-- ODC Item Sample-->
                        <div class="col-auto border rounded-3 border-primary text-primary p-2">
                            <div class="row gap-1">
                                <div class="col-auto">
                                    <h5 class="m-0">ODC 1</h5>
                                </div>
                                <div class="col">
                                    <a class="btn btn-sm p-0 text-primary updateCategoryBtn" data-bs-toggle="modal"
                                        data-bs-target="#updateCategoryFormModal" data-name="ODC-01" data-id="ODC01"
                                        title="edit">
                                        <i class="fa-solid fa-pen"></i></a>
                                    <a class="btn btn-sm p-0 ms-2 text-primary deleteCategoryBtn" data-name="ODC-01"
                                        data-id="ODC01" title="delete">
                                        <i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto border rounded-3 bg-primary text-light p-2">
                            <div class="row gap-1">
                                <div class="col-auto">
                                    <h5 class="m-0">ODC 2</h5>
                                </div>
                                <div class="col">
                                    <a class="btn btn-sm p-0 text-light updateCategoryBtn" data-bs-toggle="modal"
                                        data-bs-target="#updateCategoryFormModal" data-name="ODC-02" data-id="ODC02"
                                        title="edit">
                                        <i class="fa-solid fa-pen"></i></a>
                                    <a class="btn btn-sm p-0 ms-2 text-light deleteCategoryBtn" data-name="ODC-02"
                                        data-id="ODC02" title="delete">
                                        <i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Balcony List -->
                    <h5 class="fw-bold">Balcony Seats - Rs.<span id="balPrice">0.00</span></h5>
                    <div id="balList" class="row gap-1 mx-0 mb-4">
                        <!-- Balcony Item Sample-->
                        <div class="col-auto border rounded-3 border-warning text-warning p-2">
                            <div class="row gap-1">
                                <div class="col-auto">
                                    <h5 class="m-0">BAL 1</h5>
                                </div>
                                <div class="col">
                                    <a class="btn btn-sm p-0 text-warning updateCategoryBtn" data-bs-toggle="modal"
                                        data-bs-target="#updateCategoryFormModal" data-name="BAL-01" data-id="BAL01"
                                        title="edit">
                                        <i class="fa-solid fa-pen"></i></a>
                                    <a class="btn btn-sm p-0 ms-2 text-warning deleteCategoryBtn" data-name="BAL-01"
                                        data-id="BAL01" title="delete">
                                        <i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto border rounded-3 bg-warning text-light p-2">
                            <div class="row gap-1">
                                <div class="col-auto">
                                    <h5 class="m-0">BAL 2</h5>
                                </div>
                                <div class="col">
                                    <a class="btn btn-sm p-0 text-light updateCategoryBtn" data-bs-toggle="modal"
                                        data-bs-target="#updateCategoryFormModal" data-name="BAL-02" data-id="BAL02"
                                        title="edit">
                                        <i class="fa-solid fa-pen"></i></a>
                                    <a class="btn btn-sm p-0 ms-2 text-light deleteCategoryBtn" data-name="BAL-02"
                                        data-id="BAL02" title="delete">
                                        <i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Box List -->
                    <h5 class="fw-bold">Box Seats - Rs.<span id="boxPrice">0.00</span></h5>
                    <div id="boxList" class="row gap-1 mx-0 mb-4">
                        <!-- Box Item Sample-->
                        <div class="col-auto border rounded-3 border-danger text-danger p-2">
                            <div class="row gap-1">
                                <div class="col-auto">
                                    <h5 class="m-0">BOX 1</h5>
                                </div>
                                <div class="col">
                                    <a class="btn btn-sm p-0 text-danger updateCategoryBtn" data-bs-toggle="modal"
                                        data-bs-target="#updateCategoryFormModal" data-name="BOX-01" data-id="BOX01"
                                        title="edit">
                                        <i class="fa-solid fa-pen"></i></a>
                                    <a class="btn btn-sm p-0 ms-2 text-danger deleteCategoryBtn" data-name="BOX-01"
                                        data-id="BOX01" title="delete">
                                        <i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto border rounded-3 bg-danger text-light p-2">
                            <div class="row gap-1">
                                <div class="col-auto">
                                    <h5 class="m-0">BOX 2</h5>
                                </div>
                                <div class="col">
                                    <a class="btn btn-sm p-0 text-light updateCategoryBtn" data-bs-toggle="modal"
                                        data-bs-target="#updateCategoryFormModal" data-name="BOX-02" data-id="BOX02"
                                        title="edit">
                                        <i class="fa-solid fa-pen"></i></a>
                                    <a class="btn btn-sm p-0 ms-2 text-light deleteCategoryBtn" data-name="BOX-02"
                                        data-id="BOX02" title="delete">
                                        <i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </main>
        </div>
    </div>
    <?php include('master/jslinks.php') ?>
    <script type="text/javascript">
    $(document).ready(function() {

        // Initial Load
        $('.input-images').imageUploader({
            imagesInputName: 'images',
            maxFiles: 1
        });

        // Show Seats
        function showSeats() {
            $.ajax({
                type: "POST",
                url: '../controllers/seats.php',
                dataType: 'json',
                data: {
                    function: 'list'
                },
                success: function(response) {
                    console.log(response);
                    if(response.price){
                        $('#odcPrice').text(parseFloat(response.price.odc).toFixed(2));
                        $('#balPrice').text(parseFloat(response.price.bal).toFixed(2));
                        $('#boxPrice').text(parseFloat(response.price.box).toFixed(2));
                    }
                    if (response.result != undefined || response.result.length != 0) {
                        var ODClist = "";
                        var BALlist = "";
                        var BOXlist = "";
                        var dataArray = response.result;
                        dataArray.forEach(element => {
                            var seatType = element.seat_category;
                            var seatActive = element.active;
                            var color = "secondary";
                            switch (seatType) {
                                case "ODC":
                                    color = "primary";
                                    break;

                                case "BAL":
                                    color = "warning";
                                    break;

                                case "BOX":
                                    color = "danger";
                                    break;

                                default:
                                    break;
                            }
                            // Seat Code
                            var singleSeat;
                            if (seatActive == '1') {
                                singleSeat = `<div class="col-auto border rounded-3 bg-${color} text-light p-2">
                                                <div class="row gap-1">
                                                    <div class="col-auto">
                                                        <h5 class="m-0">${element.code}</h5>
                                                    </div>
                                                    <div class="col">
                                                        <a class="btn btn-sm p-0 text-light updateSeatBtn" data-bs-toggle="modal"
                                                            data-bs-target="#updateSeatFormModal" data-code="${element.code}" data-active="${element.active}" data-category="${element.seat_category}" data-id="${element.id}"
                                                            title="edit">
                                                            <i class="fa-solid fa-pen"></i></a>
                                                        <a class="btn btn-sm p-0 ms-2 text-light deleteSeatBtn" data-code="${element.code}"
                                                            data-id="${element.id}" title="delete">
                                                            <i class="fa-solid fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>`;
                            } else {
                                singleSeat = `<div class="col-auto border rounded-3 border-${color} text-${color} p-2">
                                                <div class="row gap-1">
                                                    <div class="col-auto">
                                                        <h5 class="m-0">${element.code}</h5>
                                                    </div>
                                                    <div class="col">
                                                        <a class="btn btn-sm p-0 text-${color} updateSeatBtn" data-bs-toggle="modal"
                                                            data-bs-target="#updateSeatFormModal" data-code="${element.code}" data-active="${element.active}" data-category="${element.seat_category}" data-id="${element.id}"
                                                            title="edit">
                                                            <i class="fa-solid fa-pen"></i></a>
                                                        <a class="btn btn-sm p-0 ms-2 text-${color} deleteSeatBtn" data-code="${element.code}"
                                                            data-id="${element.id}" title="delete">
                                                            <i class="fa-solid fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>`;
                            }

                            switch (seatType) {
                                case "ODC":
                                    ODClist += singleSeat;
                                    break;

                                case "BAL":
                                    BALlist += singleSeat;
                                    break;

                                case "BOX":
                                    BOXlist += singleSeat;
                                    break;

                                default:
                                    break;
                            }
                        });
                        $('#odcList').html(ODClist);
                        $('#balList').html(BALlist);
                        $('#boxList').html(BOXlist);
                        // Swal.close();
                    } else {
                        Swal.fire({
                            title: 'Loading Failed!',
                            text: response,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        }
        showSeats();

        // Add New Layout
        $('#changeLayoutForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            var sendData = new FormData();
            // Get the Image
            let form = $(this);
            let files = form.find('input[name^="images"]')[0].files;
            // Append Function to Call
            sendData.append('function', 'layout');
            if (files.length > 0) {
                sendData.append('image', files[0]);
            } else {
                Swal.fire({
                    title: 'No Cover Photo Selected',
                    text: 'Please upload a cover photo',
                    icon: 'error',
                    showConfirmButton: true
                });
            }
            $.ajax({
                type: "POST",
                url: '../controllers/seats.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    console.log(response);
                    if (!response.error) {
                        $('#changeLayoutForm').trigger('reset');
                        Swal.fire({
                            title: 'Layout Changed Succefully',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then((result) => {
                            location.reload();
                        });
                        $("#changeLayoutForm").modal('hide');
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

        // Add Price
        $('#addPriceForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            $.ajax({
                type: "POST",
                url: '../controllers/seats.php',
                dataType: 'json',
                data: {
                    function: 'addprice',
                    data: {
                        'type': $('#addPriceCategory').val(),
                        'price': $('#addPricePrice').val()
                    }
                },
                success: function(response) {
                    if (!response.error) {
                        $('#addPriceForm').trigger('reset');
                        Swal.fire({
                            title: 'Ticket Price Updated!',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        showSeats();
                        $("#addPriceFormModal").modal('hide');
                    } else {
                        Swal.fire({
                            title: 'Price Update Failed!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                }
            });
        });
        // ----------------------------------------------

        // Add New Seat
        $('#addSeatsForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            $.ajax({
                type: "POST",
                url: '../controllers/seats.php',
                dataType: 'json',
                data: {
                    function: 'add',
                    data: {
                        'code': $('#addSeatCode').val(),
                        'seat_category': $('#addSeatCategory').val(),
                        'active': ($('#addSeatActive').is(":checked")) ? 1 : 0
                    }
                },
                success: function(response) {
                    if (!response.error) {
                        $('#addSeatsForm').trigger('reset');
                        Swal.fire({
                            title: 'Insert Successful!',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        showSeats();
                        $("#addSeatsFormModal").modal('hide');
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

        // Update Seat
        $('#updateSeatForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            $.ajax({
                type: "POST",
                url: '../controllers/seats.php',
                dataType: 'json',
                data: {
                    function: 'edit',
                    data: {
                        'id': $('#updateSeatId').val(),
                        'code': $('#updateSeatCode').val(),
                        'seat_category': $('#updateSeatCategory').val(),
                        'active': ($('#updateSeatActive').is(":checked")) ? 1 : 0
                    }
                },
                success: function(response) {
                    if (!response.error) {
                        $('#updateSeatForm').trigger('reset');
                        Swal.fire({
                            title: 'Update Successful!',
                            icon: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            title: 'Update Failed!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                    showSeats();
                    $("#updateSeatFormModal").modal('hide');
                }
            });
        });
        // ----------------------------------------------

        // Delete Seat
        $(document).on("click", ".deleteSeatBtn", function(e) {
            var btn = e.currentTarget;
            var dataId = btn.attributes['data-id'].value;
            var dataCode = btn.attributes['data-code'].value;
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to delete ${dataCode} Seat? You cannot undone this.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: '../controllers/seats.php',
                        dataType: 'json',
                        data: {
                            function: 'delete',
                            data: {
                                'id': dataId,
                            }
                        },
                        success: function(response) {
                            if (!response.error) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your seat has been deleted.',
                                    'success',
                                )
                            } else {
                                Swal.fire({
                                    title: 'Delete Failed!',
                                    text: response.error,
                                    icon: 'error',
                                    showConfirmButton: true
                                });
                            }
                            showSeats();
                        }
                    });
                }
            })
        });
        // ----------------------------------------------

        // Update Seat Modal on Popup
        $('#updateSeatFormModal').on('show.bs.modal', function(e) {
            var btn = e.relatedTarget;
            $('#updateSeatId').val(btn.attributes['data-id'].value);
            $('#updateSeatCode').val(btn.attributes['data-code'].value);
            $('#updateSeatCategory').val(btn.attributes['data-category'].value);
            console.log(btn.attributes['data-active'].value)
            if(btn.attributes['data-active'].value == 1){
                $('#updateSeatActive').prop('checked', true);
            }else{
                $('#updateSeatActive').prop('checked', false);
            }
        })
        // ----------------------------------------------
    });
    </script>
</body>

</html>