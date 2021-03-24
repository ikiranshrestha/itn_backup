<?php
$sid = $_GET['ref'];
// $fire = '';
include_once('../../db_queries/Db_queries.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ref'])) {
    // $sid = $_GET['ref'];

    $fire = $query->select("tbl_student", "sid", $sid);

    if (mysqli_num_rows($fire) > 0) {
        while ($row = mysqli_fetch_assoc($fire)) {
            $fname = $row['s_fname'];
            $mname = $row['s_mname'];
            $lname = $row['s_lname'];
            $gender = $row['s_gender'];
            $address = $row['s_address'];
            $city = $row['s_city'];
            $email = $row['s_email'];
            $phone = $row['s_phone'];
            $guardian_name = $row['s_guardian_name'];
            $guardian_phone = $row['s_guardian_phone'];
            $guardian_relation = $row['s_guardian_relation'];
            $college_name = $row['s_college'];
            $academic_level = $row['s_academic_level'];
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $fire = $query->update("tbl_student", $_POST, "sid", $sid);
    if ($fire) {
        header('location: http://localhost/itn2/pages/admin_area/view_students.php');
    }
}
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
                <div class="content-wr">
                    <form class="forms-sample" method="POST">
                        <div class=" col-12 stretch-card" style="margin-bottom: 50px;">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Students</h4>
                                    <p class="card-description"> Student Details </p>
                                    <div class="form-group row">
                                        <label for="s_fname" class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="s_fname" id="s_fname" placeholder="First Name" value="<?= $fname ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_mname" class="col-sm-3 col-form-label">Middle Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="s_mname" id="s_mname" placeholder="Middle Name" value="<?= $mname ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_lname" class="col-sm-3 col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="s_lname" id="s_lname" placeholder="Last Name" value="<?= $lname ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_gender" class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <?php
                                            if ($gender == "Female") { ?>
                                                <input type="radio" name="s_gender" id="" value="female" checked> Female
                                                <input type="radio" name="s_gender" id="" value="male"> Male

                                            <?php } else { ?>
                                                <input type="radio" name="s_gender" id="" value="female"> Female
                                                <input type="radio" name="s_gender" id="" value="male" checked> Male
                                            <?php }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sphoto" class="col-sm-3 col-form-label">Student Photo</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="s_photo" id="sphoto">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="s_email" class="col-sm-3 col-form-label">Email Address</label>
                                        <div class="col-sm-9">
                                            <input type="s_email" class="form-control" name="s_email" id="s_email" placeholder="Email Address" value="<?= $email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_phone" class="col-sm-3 col-form-label">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input type="tel" class="form-control" name="s_phone" id="s_phone" placeholder="Phone Number" value="<?= $phone ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_address" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="s_address" id="s_address" placeholder="Address" value="<?= $address ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_city" class="col-sm-3 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="s_city" id="s_city" placeholder="City" value="<?= $city ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_guardian_name" class="col-sm-3 col-form-label">Local Guardian's Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="s_guardian_name" id="s_guardian_name" placeholder="Local Guardian's Name" value="<?= $guardian_name ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_guardian_phone" class="col-sm-3 col-form-label">Local Guardian's Contact</label>
                                        <div class="col-sm-9">
                                            <input type="tel" class="form-control" name="s_guardian_phone" id="s_guardian_phone" placeholder="Local Guardian's Phone" value="<?= $guardian_phone ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_guardian_relation" class="col-sm-3 col-form-label">Relationship with Guardian</label>
                                        <div class="col-sm-9">
                                            <select name="s_guardian_relation" id="s_guardian_relation" class="form-control">
                                                <option value="" selected disabled>--Relation with Guardian--</option>
                                                <option value="Parent">Parent</option>
                                                <option value="Family Member">Family Member</option>
                                                <option value="Relative">Relative</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_college" class="col-sm-3 col-form-label">College Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="s_college" id="s_college" placeholder="College Enrolled with" value="<?= $college_name ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="s_academic_level" class="col-sm-3 col-form-label">Academic Level</label>
                                        <div class="col-sm-9">
                                            <select name="s_academic_level" id="s_academic_level" class="form-control">
                                                <option value="" selected disabled>--Current Academic Status--</option>
                                                <option value="Under SEE">Under SEE</option>
                                                <option value="SLC Passed Out">SEE Passed Out</option>
                                                <option value="High School">High School</option>
                                                <option value="Bachelor in IT Field">Bachelor in IT Field</option>
                                                <option value="Bachelor in non-IT Field">Bachelor in non-IT Field</option>
                                                <option value="Master and above">Maste and Above</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2" name="update">Update</button>
                                </div>
                            </div>
                        </div>

                    </form>
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
</body>

</html>