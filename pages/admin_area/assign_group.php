<?php
require_once('../../validate/validate_login.php');
include_once('../../db_queries/Db_queries.php');

$sid = $_GET['ref'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_group'])) {
    unset($_POST['g_cid']);
    $data = $_POST;
    $fire = $query->insert("tbl_s_group", $data);
    if ($fire) {
        header('location: http://localhost/itn2/pages/admin_area/view_courses.php');
    }
}
require_once ('../../partials/navigationBar.php');
?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php require_once('../../partials/customSidebar.php'); ?>
            <div class="main-panel">
                <div class="content-wr">
                    <div class="col-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Assign Class</h4>
                                <p class="card-description"> Select Group Details </p>
                                <form class="forms-sample" method="POST">
                                    <div class="form-group row">
                                        <label for="a_cid" class="col-sm-3 col-form-label">Course</label>
                                        <div class="col-sm-9">
                                            <div class="col-12">
                                                <select name="g_cid" id="g_cid" class="form-control form-control-lg">
                                                    <option value="" selected disabled>--Select Course--</option>
                                                    <?php
                                                    $fire2 = $query->dualJoin("*", "tbl_admission", "tbl_courses", "a_cid", "cid", "tbl_admission.a_sid", $sid);
                                                    if (mysqli_num_rows($fire2) > 0) {
                                                        while ($row = mysqli_fetch_assoc($fire2)) { ?>
                                                            <option class="form-control" value="<?= $row['cid'] ?>"><?= $row['c_name'] ?></option>
                                                    <?php }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gid" class="col-sm-3 col-form-label">Group/ Class</label>
                                        <div class="col-sm-9">
                                            <div class="col-12">
                                                <select name="sg_gid" id="sg_gid" class="form-control form-control-lg">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <div class="col-12">
                                                <input type="text" name="sg_sid" id="sg_sid" class="form-control form-control-lg" value="<?= $sid; ?>" hidden>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2" name="add_to_group">Add to Group</button>
                                </form>
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
    <script src="../../assets/js/custom/jquery.js"></script>
    <script src="../../assets/js/custom/custom.js"></script>
</body>

</html>