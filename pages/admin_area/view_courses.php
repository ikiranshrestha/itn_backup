<?php
include_once('../../db_queries/Db_queries.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
</head>

<body>
<div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="http://localhost/itn/">
                    <img src="../../assets/images/logo.svg" alt="logo" /> </a>
                <a class="navbar-brand brand-logo-mini" href="http://localhost/itn/">
                    <img src="../../assets/images/logo-mini.svg" alt="logo" /> </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php require_once('../../partials/customSidebar.php'); ?>
            <div class="main-panel">
                <div class="content-wr">
                    <div class="col-lg-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Students Table</h4>
                                <!-- <p class="card-description"> Add class <code>.table-{color}</code> </p> -->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Course Name </th>
                                            <th> Course Cost </th>
                                            <th> Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $fire = $query->select("tbl_courses");
                                        if (mysqli_num_rows($fire) > 0) {
                                            while ($row = mysqli_fetch_assoc($fire)) { ?>

                                                <tr class="table-info">
                                                    <td> <?= $row['cid']; ?> </td>
                                                    <td> <?= $row['c_name']; ?> </td>
                                                    <td> Rs. <?= $row['c_cost']; ?>.00 </td>

                                                    <?php
                                                    $c_status = $row['c_status'];
                                                    if ($c_status == "available") { ?>
                                                        <td> <input type="button" value="<?= $c_status; ?>" name="c_status" class="btn btn-success" disabled> </td>
                                                    <?php } else { ?>
                                                        <td> <input type='button' value='<?= $c_status; ?>' name='c_status' class='btn btn-danger' disabled> </td>
                                                    <?php }
                                                    ?>

                                                </tr>

                                        <?php }
                                        }
                                        ?>
                                        <!-- <tr class="table-warning">
                                            <td> 2 </td>
                                            <td> PHP </td>
                                            <td> Rs 30,000</td>
                                            <td> <input type="button" value="Available" class="btn btn-success" disabled> </td>
                                        </tr>
                                        <tr class="table-danger">
                                            <td> 3 </td>
                                            <td> Mobile Development (Android-Java) </td>
                                            <td> Rs 70,000 </td>
                                            <td> <input type="button" value="Unavailable" class="btn btn-danger" disabled> </td>
                                        </tr>
                                        <tr class="table-success">
                                            <td> 4 </td>
                                            <td> Mobile Development (iOS-Swift) </td>
                                            <td> Rs 1.00,000 </td>
                                            <td> <input type="button" value="Unavailable" class="btn btn-danger" disabled> </td>
                                        </tr>
                                        <tr class="table-primary">
                                            <td> 5 </td>
                                            <td> Python </td>
                                            <td> Rs 40,000 </td>
                                            <td> <input type="button" value="Available" class="btn btn-success" disabled> </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once('../../partials/_footer.html') ?>

    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../../assets/js/shared/off-canvas.js"></script>
    <script src="../../assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../assets/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script src="../../assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>