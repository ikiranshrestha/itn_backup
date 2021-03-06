<?php
require_once('../../validate/validate_login.php');
include_once('../../db_queries/Db_queries.php');
$data1 = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $data = $_POST;
    $data1 = ['or_rid' => $_POST['g_rid'], 'or_tmid' => $_POST['g_tmid'], 'create' => $_POST['create']];
    $fire = $query->insert("tbl_group", $data);

    //Inserts data regarding the assigned room as occupied room in tbl_occupied_room
    $query->insert("tbl_occupied_room", $data1);

    if ($fire) {
        header('location: http://localhost/itn2/pages/admin_area/available_classes.php');
    }
}

require_once('../../partials/navigationBar.php');
?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php require_once('../../partials/customSidebar.php'); ?>
            <div class="main-panel">
                <!-- <?php
                $fire = $query->triJoin("*", "tbl_occupied_room", "tbl_time", "tbl_room", "or_tmid", "or_rid", "tmid",  "rid");
                // $fire = $query->select("tbl_occupied_room");
                echo "<pre>";
                while ($row = mysqli_fetch_assoc($fire)) {
                    print_r($row);
                }
                echo "</pre>";

                ?> -->
                <!-- <div class="content-wr"> -->
                <form class="forms-sample" method="POST">
                    <!-- Form - Add Trainer -->
                    <div class=" col-12 stretch-card" style="margin-bottom: 50px;">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Group</h4>
                                <p class="card-description"> Group Details </p>
                                <div class="form-group row">
                                    <label for="g_cid" class="col-sm-3 col-form-label">Course</label>
                                    <div class="col-sm-9">
                                        <select name="g_cid" id="g_cid" class="form-control">
                                            <option value="" selected disabled>--Select Course--</option>
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
                                <div class="form-group row">
                                    <label for="g_tid" class="col-sm-3 col-form-label">Trainer</label>
                                    <div class="col-sm-9">
                                        <select name="g_tid" id="g_tid" class="form-control">
                                            <option value="" selected disabled>--Select Trainer--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="g_title" class="col-sm-3 col-form-label">Group Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="g_title" id="g_title" placeholder="Name for the Group">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="g_tmid" class="col-sm-3 col-form-label">Timing</label>
                                    <div class="col-sm-9">
                                        <select name="g_tmid" id="g_tmid" class="form-control">
                                            <option value="" selected disabled>--Select Timing--</option>
                                            <?php
                                            $fire = $query->select("tbl_time");
                                            if (mysqli_num_rows($fire) > 0) {
                                                while ($row = mysqli_fetch_assoc($fire)) {
                                                    $tmid = $row['rid']; ?>
                                                    <option value="<?= $row['tmid'] ?>"><?= $row['tm_time']; ?></option>
                                            <?php }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="g_rid" class="col-sm-3 col-form-label">Room</label>
                                    <div class="col-sm-9">
                                        <select name="g_rid" id="g_rid" class="form-control">
                                            <option value="" selected disabled>--Select Room--</option>
                                            <!-- <?php
                                                    $fire = $query->select("tbl_room");
                                                    if (mysqli_num_rows($fire) > 0) {
                                                        while ($row = mysqli_fetch_assoc($fire)) {
                                                            $rid = $row['rid']; ?>
                                                    <option value="<?= $row['rid'] ?>"><?= $row['r_title']; ?></option>
                                            <?php }
                                                    }

                                            ?> -->
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2" name="create">Create Group</button>

                            </div>
                        </div>
                    </div>
                    <!-- Form - End of Add Trainer -->
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
    <!-- <script>
        $(document).ready(function() {
            $('#g_cid').on('change', function() {
                var courseId = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "../../pages/admin_area/loaders/load_trainers.php",
                    data: {
                        id: courseId
                    },
                    dataType: "html",
                    success: function(data) {
                        $("#g_tid").html(data);
                    }
                })
            })
        })
    </script> -->

</body>

</html>