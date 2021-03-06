<?php
require_once('../../validate/validate_login.php');
include_once('../../db_queries/Db_queries.php');

// $sid = '';
// $fire = '';
// $totalPaidAmount = '';
// $paidAmount = '';
$tid = $_GET['ref'];
$fire = $query->select("tbl_teacher", "tid", $tid);

if (mysqli_num_rows($fire) > 0) {
    while ($row = mysqli_fetch_assoc($fire)) {
        if (!empty($row['t_mname'])) {
            $tname = $row['t_fname'] . " " . $row['t_mname'] . " " . $row['t_lname'];
        } else {
            $tname = $row['t_fname'] . " " . $row['t_lname'];
        }
        $gender = $row['t_gender'];
        $address = $row['t_address'];
        $city = $row['t_city'];
        $email = $row['t_email'];
        $phone = $row['t_phone'];
        $kin = $row['t_nearest_kin'];
        $kin_phone = $row['t_nearest_kin_contact'];
        $kin_relation = $row['t_nearest_kin_relation'];
        $t_cid = $row['t_cid'];
    }
}
$fireCourse = $query->select("tbl_courses", "cid", $t_cid);

if (mysqli_num_rows($fireCourse) > 0) {
    while ($row = mysqli_fetch_assoc($fireCourse)) {
        $t_course = $row['c_name']; 
    }
}

require_once('../../partials/navigationBar.php');
?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php require_once('../../partials/customSidebar.php'); ?>
            <div class="main-panel">
                <div class="content-wr">
                    <!-- Start -Personal Information and contact -->
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Trainer's Information</h4>
                                <p class="card-description"> Personal info </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Trainer's Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $tname ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Gender</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $gender ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $address ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">City</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $city ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $phone ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $email ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Kin's Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $kin ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Kin's Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $kin_phone ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Relation with kin</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $kin_relation ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Course Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Course</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $t_course ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End -Personal Information and contact -->
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