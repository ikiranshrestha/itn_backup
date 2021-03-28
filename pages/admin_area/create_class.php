<?php
include_once('../../db_queries/Db_queries.php');
// $cid = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
    $data = $_POST;
    $fire = $query->insert("tbl_group", $data);
    if ($fire) {
        header('location: http://localhost/itn2/pages/admin_area/available_classes.php');
    }
}
// $sid = $_GET['ref'];

// $query->dualJoin("");

// function dualJoin($required, $tbl1_name, $tbl2_name, $tbl1_fk, $tbl2_pk, $criteria_value)
// {
//     // $jquery = "SELECT aid FROM tbl_admission INNER JOIN tbl_student ON tbl_admission.a_sid = tbl_student.sid WHERE tbl_student.sid = $sid";
//     $query = "SELECT $required FROM $tbl1_name INNER JOIN $tbl2_name ON $tbl1_name.$tbl1_fk = $tbl2_name.$tbl2_pk WHERE $tbl2_name.$tbl2_pk = $criteria_value";
//     // echo $query;
//     return $fire = mysqli_query($this->conn, $query);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ITN</title>
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
                                            <!-- <?php
                                                    $fire = $query->select("tbl_teacher");
                                                    if (mysqli_num_rows($fire) > 0) {
                                                        while ($row = mysqli_fetch_assoc($fire)) {
                                                            $t_name = $row['t_fname'] . " " . $row['t_mname'] . " " . $row['t_lname']; ?>
                                                    <option value="<?= $row['tid'] ?>"><?= $t_name; ?></option>
                                            <?php }
                                                    }

                                            ?> -->
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
                                    <label for="g_rid" class="col-sm-3 col-form-label">Room</label>
                                    <div class="col-sm-9">
                                        <select name="g_rid" id="g_rid" class="form-control">
                                            <option value="" selected disabled>--Select Room--</option>
                                            <?php
                                            $fire = $query->select("tbl_room");
                                            if (mysqli_num_rows($fire) > 0) {
                                                while ($row = mysqli_fetch_assoc($fire)) { ?>
                                                    <option value="<?= $row['rid'] ?>"><?= $row['r_title']; ?></option>
                                            <?php }
                                            }

                                            ?>
                                        </select>
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
                                                while ($row = mysqli_fetch_assoc($fire)) { ?>
                                                    <option value="<?= $row['tmid'] ?>"><?= $row['tm_time']; ?></option>
                                            <?php }
                                            }

                                            ?>
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