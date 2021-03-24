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
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Filter Students by Course</h4>
                                <form class="form-sample">
                                    <p class="card-description"> </p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Category</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="#filterbycourse">
                                                        <option value="" disabled selected>--Select Course--</option>
                                                        <?php
                                                        $fire = $query->select("tbl_courses");
                                                        if (mysqli_num_rows($fire) > 0) {
                                                            while ($row = mysqli_fetch_assoc($fire)) { ?>
                                                                <option value="<?= $row['cid']; ?>"><?= $row['c_name']; ?></option>
                                                        <?php }
                                                        }
                                                        $cid = $row['cid'];
                                                        $fire = $query->select("tbl_admission", "a_cid", $cid);
                                                        echo $fire;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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
                                            <th> Trainer's Name </th>
                                            <th colspan="2"> Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $fire = $query->select("tbl_admission");
                                        if (mysqli_num_rows($fire) > 0) {
                                            while ($row = mysqli_fetch_assoc($fire)) { ?>

                                                <tr class="table-info">
                                                    <td> <?= $row['tid']; ?> </td>
                                                    <td> <?= $row['t_fname'] . " " . $row['t_mname'] . " " . $row['t_lname']; ?> </td>
                                                    <td> <a href="http://localhost/itn2/pages/admin_area/trainer_details.php?ref=<?= $row['tid']; ?>"> <button class="btn btn-primary"> View </button> </a> <a href="http://localhost/itn2/pages/admin_area/edit_trainer.php?ref=<?= $row['tid']; ?>"> <button class="btn btn-warning"> Edit </button> </a> </td>

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