<?php
session_start();
$_SESSION["pagename"] = "adminNews";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('master/headlinks.php') ?>
    <title><?php echo $sitename; ?> - News</title>
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

                <!-- Add New Modal -->
                <div class="modal fade" id="addNewsFormModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="newsFormLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addNewsFormLabel">New News</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="addNewsForm" name="addNewsForm" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="addNewsTitle" class="form-label">News Title</label>
                                        <input type="text" class="form-control" id="addNewsTitle" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="addNewsDescription" class="form-label">News Description</label>
                                        <textarea class="form-control" placeholder="Enter Description Here"
                                            id="addNewsDescription" rows="4"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formupload" class="form-label">Upload News Cover</label>
                                        <div class="input-images"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" id="addNewsBtn" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add News Modal End -->

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="mx-2 mx-md-4 col">News Information</h3>
                    <div class="col-auto">
                        <button class="btn btn-outline-dark fw-bold" data-bs-toggle="modal"
                            data-bs-target="#addNewsFormModal"><i class="fa-solid fa-plus me-2"></i>Add News</button>
                    </div>
                </div>

                <div class="container-fluid p-2 p-md-4 my-3">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created Date</th>
                                <th>Change</th>
                            </tr>
                        </thead>
                        <!-- <tbody>
                            <tr>
                                <td>1</td>
                                <td>Spider Man - No way home</td>
                                <td>Lorem ipsum</td>
                                <td>Date</td>
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
        $('.input-images').imageUploader({
            imagesInputName: 'images',
            maxFiles: 1
        });

        function showNews() {
            var getData = new FormData();
            getData.append('function', 'list');
            $.ajax({
                type: "POST",
                url: '../controllers/news.php',
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
                            data: response.result,
                            columns: [{
                                    data: 'news_id'
                                },
                                {
                                    data: 'news_title'
                                },
                                {
                                    data: 'news_description'
                                },
                                {
                                    data: 'created_date'
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
        showNews();

        // Add News
        $('#addNewsForm').submit(function(e) {
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
            // Append News Info
            sendData.append('title', $('#addNewsTitle').val());
            sendData.append('description', $('#addNewsDescription').val());
            console.log(sendData)
            $.ajax({
                type: "POST",
                url: '../controllers/news.php',
                processData: false,
                contentType: false,
                data: sendData,
                success: function(response) {
                    console.log(response);
                    if ((!response.error) && response.result) {
                        $('#addNewsForm').trigger('reset');
                        Swal.fire({
                            title: 'Insert Successful!',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        $("#addNewsFormModal").modal('hide');
                        showNews();
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