<?php
session_start();
$_SESSION["pagename"] = "adminMovies";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php') ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

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
                                        <select class="form-select" aria-label="Select Movie Category"
                                            id="addMovieCategory" required>
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
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
                                                <input type="datetime-local" class="form-control" id="addMovieDateTime"
                                                    required>
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-dark fw-bold"><i
                                                        class="fa-solid fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div id="screenList" class="row gap-1 mx-0 my-3">
                                            <!-- Screen Time-->
                                            <div class="col-auto border border-dark rounded-3 p-1">
                                                <span class="ps-2">2022-05-10 16:30</span>
                                                <button class="btn btn-sm px-2"><i
                                                        class="fa-solid fa-close"></i></button>
                                            </div>
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
                    <h3 class="mx-2 mx-md-4 col">Movies</h3>
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
                        <tbody>
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
            imagesInputName: 'movie',
            maxFiles: 1
        });

        $('.form-switch .form-check-input').on('change', function() {
            console.log($(this).is(':checked'))
        });

        $('#example').DataTable({
            responsive: true
        });

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

        // Update Modal on Popup
        $('#updateCategoryFormModal').on('show.bs.modal', function(e) {
            var btn = e.relatedTarget;
            $('#updateCategoryName').val(btn.attributes['data-name'].value);
            $('#categoryId').val(btn.attributes['data-id'].value);
        })
        // ----------------------------------------------

        // Load Categories
        function loadCategory() {
            // Swal.fire({
            //     title: 'Please Wait',
            //     allowEscapeKey: false,
            //     allowOutsideClick: false,
            //     showConfirmButton: false
            // });
            // Swal.showLoading();
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
                        });
                        $("#categoryList").html(categoryList);
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