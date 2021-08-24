<?php
require_once('../../validate/validate_login.php');

require_once('../../db_queries/Db_queries.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $data = $_POST;
    $fire = $query->insert("tbl_courses", $data);
    if ($fire) {
        header('location: http://localhost/itn2/pages/admin_area/view_courses.php');
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

                    <div class="col-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Students</h4>
                                <p class="card-description"> Student Details </p>
                                <form class="forms-sample" method="POST">
                                    <div class="form-group row">
                                        <label for="cname" class="col-sm-3 col-form-label">Course Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="c_name" id="cname" placeholder="Course Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ccost" class="col-sm-3 col-form-label">Course Cost</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="c_cost" id="ccost" placeholder="Total Cost for the Course">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cstatus" class="col-sm-3 col-form-label">Availability/ Status</label>
                                        <div class="col-sm-9">
                                            <input type="radio" name="c_status" id="" value="available">Available
                                            <input type="radio" name="c_status" id="" value="unavailable"> Unavailable
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2" name="submit">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
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
</body>

</html>