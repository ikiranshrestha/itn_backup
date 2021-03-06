<?php
require_once('../../validate/validate_login.php');
include_once('../../db_queries/Db_queries.php');

$data = array();
$tid = $_GET['ref'];
$fire = $query->select("tbl_teacher", "tid", $tid);

if (mysqli_num_rows($fire) > 0) {
    while ($row = mysqli_fetch_assoc($fire)) {
        // if (!empty($row['t_mname'])) {
        //     $tname = $row['t_fname'] . " " . $row['t_mname'] . " " . $row['t_lname'];
        // } else {
        //     $tname = $row['t_fname'] . " " . $row['t_lname'];
        // }
        $t_fname = $row['t_fname'];
        $t_mname = $row['t_mname'];
        $t_lname = $row['t_lname'];
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


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $data = $_POST;
    $fire = $query->update("tbl_teacher", $data, "tid", $tid);
    if ($fire) {

        header('location: http://localhost/itn2/pages/admin_area/view_trainers.php');
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
                    <form class="forms-sample" method="POST">
                        <!-- Start -Personal Information and contact -->
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Trainer's Information</h4>
                                    <p class="card-description"> Personal info </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Trainer's First Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="t_fname" class="form-control" value="<?= $t_fname ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Trainer's Middle Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="t_mname" class="form-control" value="<?= $t_mname ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Trainer's Last Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="t_lname" class="form-control" value="<?= $t_lname ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="t_gender" class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-9">
                                                    <?php
                                                    if ($gender == "Female") { ?>
                                                        <input type="radio" name="t_gender" id="" value="female" checked> Female
                                                        <input type="radio" name="t_gender" id="" value="male"> Male

                                                    <?php } else { ?>
                                                        <input type="radio" name="t_gender" id="" value="female"> Female
                                                        <input type="radio" name="t_gender" id="" value="male" checked> Male
                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="t_address" class="form-control" value="<?= $address ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="t_city" class="form-control" value="<?= $city ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Phone</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="t_phone" class="form-control" value="<?= $phone ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="t_email" class="form-control" value="<?= $email ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kin's Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="t_nearest_kin" class="form-control" value="<?= $kin ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Kin's Phone</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="t_nearest_kin_contact" class="form-control" value="<?= $kin_phone ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Relation with kin</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nearest_kin_relation" class="form-control" value="<?= $kin_relation ?>" />
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label for="t_kin_relation" class="col-sm-3 col-form-label">Relationship with Kin</label>
                                                <div class="col-sm-9">
                                                    <select name="t_nearest_kin_relation" id="t_kin_relation" class="form-control">
                                                        <option value="" selected disabled>--Relation with Kin--</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Parent">Parent</option>
                                                        <option value="Issue">Issue</option>
                                                        <option value="Other">Other</option>
                                                    </select>
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
                                                    <select name="t_cid" id="" class="form-control">
                                                        <option value=""></option>

                                                        <?php
                                                        $fire = $query->select("tbl_courses");
                                                        if (mysqli_num_rows($fire) > 0) {
                                                            while ($row = mysqli_fetch_assoc($fire)) { ?>
                                                                <option value="<?= $row['cid'] ?>"><?= $row['c_name'] ?></option>
                                                        <?php }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2" name="update">Update</button>

                                </div>
                            </div>
                        </div>
                        <!-- End -Personal Information and contact -->
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