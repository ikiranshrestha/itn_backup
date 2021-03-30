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
                    <div class="col-lg-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Students Table</h4>
                                <!-- <p class="card-description"> Add class <code>.table-{color}</code> </p> -->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Group Title </th>
                                            <th> Group Course </th>
                                            <th> Assigned Trainer </th>
                                            <th> Assigned Room </th>
                                            <th> Assigned Time </th>
                                            <th> No. of Students </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php
                                                $fire = $query->select("tbl_group");
                                                $i = 0;
                                                if (mysqli_num_rows($fire) > 0) {
                                                    while ($row = mysqli_fetch_assoc($fire)) {
                                                        $i++;
                                                ?>
                                                <tr class="table-info">
                                                    <td> <?= $i; ?> </td>
                                                    <td> <?= $row['g_title']; ?> </td>
                                                    <td> Rs. <?= $row['g_title']; ?>.00 </td>

                                                </tr>

                                        <?php }
                                                }
                                        ?> -->
                                        <?php
                                        // $fire1 = $query->dualJoin("g_title, c_name", "tbl_group", "tbl_courses", "g_cid", "cid");
                                        echo $fire = $query->pentaJoin("g_title, c_name, t_fname, t_lname, t_lname, r_title, tm_time", "tbl_group", "tbl_courses", "g_cid", "cid", "tbl_teacher", "g_tid", "tid", "tbl_room", "g_rid", "rid", "tbl_time", "g_tmid", "tmimd");
                                        if (mysqli_num_rows($fire) > 0) {
                                            while ($row = mysqli_fetch_assoc($fire)) { ?>
                                                <tr class="table-info">
                                                    <td> <?= $i; ?> </td>
                                                    <td> <?= $row['g_title']; ?> </td>
                                                    <td> <?= $row['c_name']; ?></td>
                                                    <td> <?= $row['t_fname'] + " " +$row['t_mname'] + " " + $row['t_lname']; ?></td>
                                                    <td> <?= $row['r_title']; ?></td>
                                                    <td> <?= $row['tm_time']; ?></td>

                                                </tr>
                                        <?php }
                                        }
                                        ?>
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
</body>

</html>