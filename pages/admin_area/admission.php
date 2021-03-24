<?php
session_start();

require_once('../../db_queries/Db_queries.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $data = $_POST;
    $fire = $query->insert("tbl_courses", $data);
    $date = date('Y-m-d');
    if ($fire) {
        // echo $name = $_POST['s_fname'];
        $name = $_SESSION['pass'];
        // header('location: http://localhost/itn2/pages/forms/view_courses.php');

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IT Training Nepal</title>
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
                <a class="navbar-brand brand-logo" href="http://localhost/itn2/">
                    <img src="../../assets/images/logo.svg" alt="logo" /> </a>
                <a class="navbar-brand brand-logo-mini" href="http://localhost/itn2/">
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
                <!-- <div class="content-wr"> -->
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Enrollment</h4>
                            <p class="card-description"> Student Details </p>
                            <form class="forms-sample" method="POST">
                                <div class="form-group row">
                                    <label for="c_name" class="col-sm-3 col-form-label">Course</label>
                                    <div class="col-sm-9">
                                        <!-- <input type="text" class="form-control" name="c_name" id="cname" value="Your Selected Course" readonly> -->
                                        <select name="c_name" id="" class="form-control form-control-lg">
                                            <option value="" selected disabled>--Select Course--</option>
                                            <?php
                                            $fire = $query->select("tbl_courses");
                                            if (mysqli_num_rows($fire) > 0) {
                                                while ($row = mysqli_fetch_assoc($fire)) { ?>
                                                    <option class="form-control" value="<?php $row['c_id'] ?>"><?= $row['c_name'] ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="s_name" class="col-sm-3 col-form-label">Student's Name</label>
                                    <div class="col-sm-9">
                                        <?php if (!empty($_SESSION)) { ?>
                                            <input type="text" class="form-control" name="c_name" id="cname" value="<?= $_SESSION['pass'] ?>" readonly>

                                        <?php session_destroy();
                                        } else { ?>
                                            <input type="text" class="form-control" name="c_name" id="cname" value="Student's name" readonly>

                                        <?php      } ?>
                                        <!-- <?php
                                                $fire = $query->select("tbl_students");
                                                if (mysqli_num_rows($fire) > 0) {
                                                    while ($row = mysqli_fetch_assoc($fire)) { ?>
                                                    <option class="form-control" value="<?php $row['sid'] ?>"><?= $row['c_fname'] ?></option>
                                            <?php }
                                                }
                                            ?> -->

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_payable_amount" class="col-sm-3 col-form-label">Payable Amount</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="c_payable_amount" id="c_payable_amount" placeholder="Total Payable Cost for the student">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- <label for="a_date" class="col-sm-3 col-form-label">Admission Date</label> -->
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="a_date" id="a_date" value="<?= date('Y-m-d') ?>" hidden>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2" name="submit">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- </div> -->

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
</body>

</html>