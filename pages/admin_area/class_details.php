<?php
include_once('../../db_queries/Db_queries.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ref'])) {
    $gid = $_GET['ref'];
    $fire = $query->select("tbl_group", "gid", $gid);
    if(mysqli_num_rows($fire) > 0)
    {
        while($row=mysqli_fetch_assoc($fire))
        {
            $g_title = $row['g_title'];
        }
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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Group Name: <code class="label"> <?= $g_title; ?> </code></h4>
                                <p class="card-description"> Students Enrolled in Group</p>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> S.no. </th>
                                            <th> SID </th>
                                            <th> Student Name </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $fire = $query->select("tbl_s_group", "sg_gid", $gid);
                                        $fire = $query->triJoin("*", "tbl_s_group", "tbl_student", "tbl_group", "sg_sid", "sg_gid", "sid", "gid", "sg_gid", $gid);
                                        $i = 0;
                                        if (mysqli_num_rows($fire) > 0) {
                                            while ($row = mysqli_fetch_assoc($fire)) {
                                                $i++;
                                        ?>
                                                <tr>

                                                    <td>
                                                        <?= $i; ?>
                                                    </td>
                                                    <td>
                                                        <?= $row['sg_sid'] ?>
                                                    </td>
                                                    <td> <?= $row['s_fname'] . " " . $row['s_mname'] . " " .$row['s_lname']; ?></td>
                                                </tr>
                                                <?= "<br/>" ?>
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