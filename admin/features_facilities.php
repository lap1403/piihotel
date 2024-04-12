<?php  require('inc/essentinals.php');
    require('inc/db_config.php');
    adminLogin();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-features_facilities</title>
    <?php
    require('inc/links.php');
    ?>
</head>
<body class="bg-light">
   <?php require('inc/header.php'); ?>

   
   <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Features and Facilities</h3>
                <div class="card boder-0 shadow-sm mb-4" >
                    <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Features</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#features-s">
                            <i class="bi bi-plus-square"></i>ADD
                            </button>
                        </div>
                        <div class="table-responsive-md" style="height: 350px;overflow:scroll;">
                        <table class="table">
                            <thead class="stiky-top">
                                <tr class="bg-dark text-light">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                                <tbody id="features-data"></tbody>
                            </table>
                        </div>                      
                    </div>
                </div>

                <div class="card boder-0 shadow-sm mb-4" >
                    <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Facilities</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facilities-s">
                            <i class="bi bi-plus-square"></i>ADD
                            </button>
                        </div>
                        <div class="table-responsive-md" style="height: 350px;overflow:scroll;">
                        <table class="table">
                            <thead>
                                <tr class="bg-dark text-light">
                                <th scope="col">#</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                                <tbody id="facilities-data"></tbody>
                            </table>
                        </div>                      
                    </div>
                </div>
               
                <!--  -->
            </div>
        </div>
    </div>

    <!--         Features  modal -->
            <div class="modal fade" id="features-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="features_s_form">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Features</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="feature_name"  class="form-control shadow-none" require>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                    </div>
                    </div>
                    </form>
                </div>
            </div>

     <!--         Facilities  modal -->
            <div class="modal fade" id="facilities-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="facilities_s_form">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Team Member</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="facilities_name" class="form-control shadow-none" require>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Icon</label>
                        <input type="file" name="facilities_icon" accept=".svg" class="form-control shadow-none" require>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="facilities_desc" class="form-control shadow-none" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                    </div>
                    </div>
                    </form>
                </div>
                </div>

   
            
    <?php require('inc/scripts.php') ?>
    <script src="script/features_facilities.js"></script>
</body>
</html>