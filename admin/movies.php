<?php
session_start();
$_SESSION["pagename"] = "adminMovies";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php') ?>
    <title><?php echo $sitename; ?> - Movies</title>
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

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="mx-2 mx-md-4">Categories</h3>
                </div>
                <div class="container-fluid p-2 px-md-4 pt-2 my-3">
                    <div id="categoryList" class="row gap-1 m-0">
                        <!-- Category Item Sample-->
                        <div class="col-auto border rounded-3 bg-dark text-light p-2">
                            <div class="row gap-1">
                                <div class="col-auto">
                                    <h5 class="m-0">No Category Found</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid d-md-block gap-2 my-2">
                        <button class="btn btn-sm btn-outline-dark fw-bold" data-bs-toggle="modal"
                            data-bs-target="#addCategoryFormModal"><i class="fa-solid fa-plus me-2"></i>Add New
                            Category</button>
                    </div>
                </div>


                <!-- Add Category Modal -->
                <div class="modal fade" id="addCategoryFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="categoryFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryFormLabel">Add New Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="addCategoryForm" name="addCategoryForm">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="categoryName" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" id="categoryName" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="addCategoryBtn" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add Category Modal End -->

                <!-- Update Category Modal -->
                <div class="modal fade" id="updateCategoryFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="categoryFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryFormLabel">Update Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="updateCategoryForm" name="updateCategoryForm">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="categoryName" class="form-label">Category Name</label>
                                        <input type="hidden" class="form-control" id="categoryId" value="-1" required>
                                        <input type="text" class="form-control" id="updateCategoryName" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="addCategoryBtn" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Update Category Modal End -->

                <!-- Add Movie Modal -->
                <div class="modal fade" id="addMovieFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="categoryFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addMovieFormLabel">New Movie</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="addMovieForm" name="addMovieForm" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="addMovieName" class="form-label">Movie Name</label>
                                        <input type="text" class="form-control" id="addMovieName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addMovieCategory" class="form-label">Movie Category</label>
                                        <select class="form-select movie-category-list"
                                            aria-label="Select Movie Category" id="addMovieCategory" required>
                                            <option value="-1" Disabled>No Categories</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addMovieDescription" class="form-label">Movie Description</label>
                                        <textarea class="form-control" placeholder="Enter Description Here"
                                            id="addMovieDescription" rows="4"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formupload" class="form-label">Upload Movie Cover</label>
                                        <div class="input-images"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addMovieDateTime" class="form-label">Movie Screen Times</label>
                                        <div class="row">
                                            <div class="col">
                                                <input type="datetime-local" class="form-control" id="addMovieDateTime">
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" id="addNewScreenBtn"
                                                    class="btn btn-dark fw-bold"><i
                                                        class="fa-solid fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div id="screenList" class="row gap-1 mx-0 my-3">
                                            <!-- Screen Time-->
                                            <!-- <div class="col-auto border border-dark rounded-3 p-1">
                                                <span class="ps-2">2022-05-10 16:30</span>
                                                <button type="button" class="deleteScreenBtn btn btn-sm px-2"><i class="fa-solid fa-close"></i></button>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="addMovieBtn" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add Movie Modal End -->

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="mx-2 mx-md-4 col">Screening Movies Details</h3>
                    <div class="col-auto">
                        <button class="btn btn-outline-dark fw-bold" data-bs-toggle="modal"
                            data-bs-target="#addMovieFormModal"><i class="fa-solid fa-plus me-2"></i>Add New
                            Movie</button>
                    </div>
                </div>

                <div class="container-fluid p-2 p-md-4 my-3">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Show Date</th>
                                <th>Time</th>
                                <th>Active</th>
                                <th>Change</th>
                            </tr>
                        </thead>
                        <!-- <tbody>
                            <tr>
                                <td>1</td>
                                <td>Spider Man - No way home</td>
                                <td>Marvel</td>
                                <td>30-10-2022</td>
                                <td>14:30</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" value="-1" type="checkbox" id="activeSwitch"
                                            checked>
                                    </div>
                                </td>
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

        // Initial Load
        loadCategory();
        $('.input-images').imageUploader({
            imagesInputName: 'images',
            maxFiles: 1
        });

        $('.form-switch .form-check-input').on('change', function() {
            console.log($(this).is(':checked'))
        });

        function showMovies() {
            var getData = new FormData();
            getData.append('function', 'list');
            $.ajax({
                type: "POST",
                url: '../controllers/movie.php',
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
                                    data: 'movie_screen_id'
                                },
                                {
                                    data: 'movie_name'
                                },
                                {
                                    data: 'movie_category'
                                },
                                {
                                    data: 'movie_screen_date'
                                },
                                {
                                    data: 'movie_screen_time'
                                },
                                {
                                    data: 'active_switch'
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

        showMovies();
        // $('#example').DataTable({
        //     responsive: true
        // });

        // Screen Times Array
        var ScreenTimes = [];

        // Add New Screen Time - Movie
        $('#addNewScreenBtn').click(function(e) {
            var value = $('#addMovieDateTime').val()
            var date = moment(value).format('YYYY-MM-DD');
            var time = moment(value).format('HH:mm:ss');
            if (!ScreenTimes.includes(value)) {
                ScreenTimes.push(value);
                var screenItem = `<div data-date="${date}" data-time="${time}" data-value="${value}" class="screen-item col-auto border border-dark rounded-3 p-1">
                        <span class="ps-2">${moment(value).format('YYYY-MM-DD HH:mm')}</span>
                        <button type="button" class="btn btn-sm px-2 deleteScreenBtn">
                            <i class="fa-solid fa-close"></i>
                        </button>
                    </div>`;
                $('#screenList').append(screenItem);
            }
            console.log(ScreenTimes)
        });

        // Delete Screen Time - Movie
        $(document).on("click", ".deleteScreenBtn", function(e) {
            var deleteScreen = (e.target.parentElement.parentElement).attributes["data-value"].value;
            const index = ScreenTimes.indexOf(deleteScreen);
            if (index > -1) {
                ScreenTimes.splice(index, 1);
            }
            (e.target.parentElement.parentElement).remove();
            console.log(ScreenTimes);
        });

        // Add New Movie
        $('#addMovieForm').submit(function(e) {
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
            sendData.append('function', 'add');
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
            // Append Movie Info
            sendData.append('name', $('#addMovieName').val());
            sendData.append('category_id', $('#addMovieCategory').val());
            sendData.append('description', $('#addMovieDescription').val());
            sendData.append('screens', ScreenTimes);
            console.log(sendData)
            $.ajax({
                type: "POST",
                url: '../controllers/movie.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    console.log(response);
                    if ((!response.error) && response.movie_result) {
                        $('#addMovieForm').trigger('reset');
                        Swal.fire({
                            title: 'Insert Successful!',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        $("#addMovieFormModal").modal('hide');
                        showMovies();
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

        // Add New Category
        $('#addCategoryForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            $.ajax({
                type: "POST",
                url: '../controllers/category.php',
                dataType: 'json',
                data: {
                    function: 'add',
                    data: {
                        'name': $('#categoryName').val()
                    }
                },
                success: function(response) {
                    if (!response.error) {
                        $('#addCategoryForm').trigger('reset');
                        Swal.fire({
                            title: 'Insert Successful!',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        loadCategory();
                        $("#addCategoryFormModal").modal('hide');
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

        // Update Category
        $('#updateCategoryForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Please Wait',
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
            Swal.showLoading();
            $.ajax({
                type: "POST",
                url: '../controllers/category.php',
                dataType: 'json',
                data: {
                    function: 'edit',
                    data: {
                        'id': $('#categoryId').val(),
                        'name': $('#updateCategoryName').val()
                    }
                },
                success: function(response) {
                    if (!response.error) {
                        $('#updateCategoryForm').trigger('reset');
                        Swal.fire({
                            title: 'Update Successful!',
                            icon: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            title: 'Insert Failed!',
                            text: response.error,
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                    loadCategory();
                    $("#updateCategoryFormModal").modal('hide');
                }
            });
        });
        // ----------------------------------------------

        // Delete Category
        $(document).on("click", ".deleteCategoryBtn", function(e) {
            var btn = e.currentTarget;
            var dataId = btn.attributes['data-id'].value;
            var dataName = btn.attributes['data-name'].value;
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to delete ${dataName} category!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: '../controllers/category.php',
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
                                    'Your file has been deleted.',
                                    'success',
                                )
                            } else {
                                Swal.fire({
                                    title: 'Insert Failed!',
                                    text: response.error,
                                    icon: 'error',
                                    showConfirmButton: true
                                });
                            }
                            loadCategory();
                        }
                    });
                }
            })
        });
        // ----------------------------------------------

        // Update Category Modal on Popup
        $('#updateCategoryFormModal').on('show.bs.modal', function(e) {
            var btn = e.relatedTarget;
            $('#updateCategoryName').val(btn.attributes['data-name'].value);
            $('#categoryId').val(btn.attributes['data-id'].value);
        })
        // ----------------------------------------------

        // Load Categories
        function loadCategory() {
            $.ajax({
                type: "POST",
                url: '../controllers/category.php',
                dataType: 'json',
                data: {
                    function: 'list'
                },
                success: function(response) {
                    if (response.result != undefined || response.result.length != 0) {
                        var categoryList = "";
                        var categoryDropdown = "";
                        var dataArray = response.result;
                        dataArray.forEach(element => {
                            // Category Code
                            var singleCategory = `<div class="col-auto border rounded-3 bg-dark text-light p-2">
                                                    <div class="row gap-1">
                                                        <div class="col-auto">
                                                            <h5 class="m-0">${element.name}</h5>
                                                        </div>
                                                        <div class="col">
                                                            <a class="btn btn-sm p-0 text-light updateCategoryBtn" data-bs-toggle="modal" data-bs-target="#updateCategoryFormModal" data-name="${element.name}" data-id="${element.id}" title="edit">
                                                                <i class="fa-solid fa-pen"></i></a>
                                                            <a class="btn btn-sm p-0 ms-2 text-light deleteCategoryBtn" data-name="${element.name}" data-id="${element.id}" title="delete">
                                                                <i class="fa-solid fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </div>`;
                            categoryList += singleCategory;

                            // Category Dropdown
                            categoryDropdown +=
                                `<option value="${element.id}">${element.name}</option>`;
                        });
                        $('.movie-category-list').empty().append(categoryDropdown);
                        $('#categoryList').html(categoryList);
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
    });
    </script>
</body>

</html>