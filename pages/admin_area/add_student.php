<?php
require_once('../../validate/validate_login.php');
//Admission Table must contain fields - aid, a_sid, a_payable_amount, a_date
//installment Table must contain fields - iid, i_title, i_amount, i_date, i_aid

require_once('../../db_queries/Db_queries.php');
require_once('../../config/config.php');
$last_sid = '';
$last_cid = '';
$last_aid = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $data_student_tbl = array();
    $data_admission_tbl = array();
    $data_installment_tbl = array();

    $data_student_tbl = ['s_fname' => $_POST['s_fname'], 's_mname' => $_POST['s_mname'], 's_lname' =>  $_POST['s_lname'], 's_gender' => $_POST['s_gender'], 's_photo' => $_POST['s_photo'], 's_email' => $_POST['s_email'], 's_phone' => $_POST['s_phone'], 's_address' => $_POST['s_address'], 's_city' => $_POST['s_city'], 's_guardian_name' => $_POST['s_guardian_name'], 's_guardian_phone' => $_POST['s_guardian_phone'], 's_guardian_relation' => $_POST['s_guardian_relation'], 's_college' => $_POST['s_college'], 's_academic_level' => $_POST['s_academic_level'], 'submit' => $_POST['submit']];

    $fireForStudent = $query->insert("tbl_student", $data_student_tbl);
    if ($fireForStudent) {
        $last_sid = mysqli_insert_id($query->conn);
        $_POST['a_sid'] = $last_sid;
    }

    $data_admission_tbl = ['a_sid' => $_POST['a_sid'], 'a_cid' => $_POST['a_cid'], 'a_payable_amount' => $_POST['a_payable_amount'], 'a_date' => $_POST['a_date'], 'submit' => $_POST['submit']];

    $fireForAdmission = $query->insert("tbl_admission", $data_admission_tbl);
    if ($fireForAdmission) {
        $last_aid =  mysqli_insert_id($query->conn);
        $_POST['i_aid'] = $last_aid;
    }

    $data_installment_tbl = ['i_title' => $_POST['i_title'], 'i_amount' => $_POST['i_amount'],  'i_date' => $_POST['i_date'], 'i_aid' => $_POST['i_aid'], 'submit' => $_POST['submit']];
    $fireForInstallment = $query->insert("tbl_installments", $data_installment_tbl);
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
                <form class="forms-sample" method="POST">
                    <!-- Form - Add Student -->
                    <div class=" col-12 stretch-card" style="margin-bottom: 50px;">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Students</h4>
                                <p class="card-description"> Student Details </p>
                                <div class="form-group row">
                                    <label for="s_fname" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="s_fname" id="s_fname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="s_mname" class="col-sm-3 col-form-label">Middle Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="s_mname" id="s_mname" placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="s_lname" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="s_lname" id="s_lname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cstatus" class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="s_gender" id="" value="female"> Female
                                        <input type="radio" name="s_gender" id="" value="male"> Male
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
                                        <input type="s_email" class="form-control" name="s_email" id="s_email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="s_phone" class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control" name="s_phone" id="s_phone" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="s_address" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="s_address" id="s_address" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="s_city" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="s_city" id="s_city" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="s_guardian_name" class="col-sm-3 col-form-label">Local Guardian's Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="s_guardian_name" id="s_guardian_name" placeholder="Local Guardian's Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="s_guardian_phone" class="col-sm-3 col-form-label">Local Guardian's Contact</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control" name="s_guardian_phone" id="s_guardian_phone" placeholder="Local Guardian's Phone">
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
                                        <input type="text" class="form-control" name="s_college" id="s_college" placeholder="College Enrolled with">
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
                            </div>
                        </div>
                    </div>
                    <!-- Form - End of Add Student -->

                    <!-- Form - Enrollment -->
                    <div class="col-12 stretch-card" style="margin-bottom: 50px;">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Enrollment</h4>
                                <p class="card-description"> Student Details </p>

                                <div class="form-group row">
                                    <label for="a_cid" class="col-sm-3 col-form-label">Course</label>
                                    <div class="col-sm-9">
                                        <!-- <input type="text" class="form-control" name="c_name" id="cname" value="Your Selected Course" readonly> -->
                                        <select name="a_cid" id="a_cid" class="form-control form-control-lg" id="a_cid">
                                            <option value="" selected disabled>--Select Course--</option>
                                            <?php
                                            $fire = $query->select("tbl_courses");
                                            if (mysqli_num_rows($fire) > 0) {
                                                while ($row = mysqli_fetch_assoc($fire)) { ?>
                                                    <option class="form-control" value="<?= $row['cid'] ?>"><?= $row['c_name'] . " ( Rs." . $row['c_cost'] . ")" ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="c_payable_amount" class="col-sm-3 col-form-label">Payable Amount</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="a_payable_amount" id="a_payable_amount" placeholder="Total Payable Cost for the student" min="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- <label for="a_date" class="col-sm-3 col-form-label">Admission Date</label> -->
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="a_date" id="a_date" value="<?= date('Y-m-d') ?>" hidden>
                                    </div>
                                </div>
                                <!-- <button type="submit" class="btn btn-success mr-2" name="submit">Submit</button> -->

                            </div>
                        </div>
                    </div>
                    <!-- Form - End of Enrollment -->

                    <!-- Form - Installment -->

                    <div class="col-12 stretch-card" style="margin-bottom: 50px;">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Installment</h4>
                                <p class="card-description"> First Installment </p>

                                <div class="form-group row">
                                    <label for="i_title" class="col-sm-3 col-form-label">Installment Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="i_title" id="i_title" value="Admission/ First Installment" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="i_amount" class="col-sm-3 col-form-label">Installment Amount</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="i_amount" id="i_amount" placeholder="Installment Amount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="i_date" class="col-sm-3 col-form-label">Installment Date</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="i_date" id="i_date" value="<?= date('Y-m-d') ?>" readonly>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2" name="submit">Submit</button>

                                </div>
                            </div>
                        </div>

                        <!-- Form - End of Installment -->

                    </div>
            </div>
        </div>
        </form>
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

    <!-- custom jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>

</html>