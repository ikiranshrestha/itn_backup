<?php
session_start();
if(!$_SESSION['uname']){
    header('Location: ../../login.php');
}
include_once('../../db_queries/Db_queries.php');

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
                <div class="content-wr">
                    <div class="col-lg-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <!-- Searchbar start -->

                                <div class="input-group col-sm-8">
                                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" id="search" aria-describedby="search-addon" />
                                    <button type="button" class="btn btn-outline-primary">search</button>
                                </div>

                                <!--  Searchbar end -->
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
                                        <?php
                                        $fire = $query->pentaJoin("*", "tbl_group", "tbl_courses", "tbl_teacher", "tbl_room", "tbl_time", "g_cid", "g_tid", "g_rid", "g_tmid", "cid", "tid", "rid", "tmid");

                                        if (mysqli_num_rows($fire) > 0) {
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($fire)) {
                                                $gid = $row['gid'];
                                                $i++;
                                        ?>

                                                <tr class="table-info clickable-row" data-href="http://localhost/itn2/pages/admin_area/class_details.php?ref=<?= $gid; ?>">
                                                    <td> <?= $i; ?> </td>
                                                    <td> <?= $row['g_title']; ?> </td>
                                                    <td> <?= $row['c_name']; ?></td>
                                                    <td> <?= $row['t_fname'] . " " . $row['t_mname'] . " " . $row['t_lname']; ?></td>
                                                    <td> <?= $row['r_title']; ?></td>
                                                    <td> <?= $row['tm_time']; ?></td>
                                                    <?php
                                                    $fire2 = $query->getCount("tbl_s_group", "sgid", "sg_gid", $row['gid']);
                                                    if (mysqli_num_rows($fire2) > 0) {
                                                        while ($row2 = mysqli_fetch_assoc($fire2)) {
                                                            $no_of_students = $row2['COUNT(sgid)'];
                                                        }
                                                    }
                                                    ?>
                                                    <td><?= $no_of_students; ?></td>

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
    <script src="../../assets/js/custom/jquery.js"></script>
    <script src="../../assets/js/custom/custom.js"></script>
</body>

</html>