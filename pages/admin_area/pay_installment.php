<?php
session_start();
if(!$_SESSION['uname']){
    header('Location: ../../login.php');
}
include_once('../../db_queries/Db_queries.php');
include_once('../../config/config.php');
// $sid = 19;
$sid = $_GET['ref'];

$fire = '';
$aid = '';
$payable_amount = '';
$s_name;

$fire = $query->dualJoin("aid, a_payable_amount, s_fname, s_lname, s_mname", "tbl_admission", "tbl_student", "a_sid", "sid", "a_sid" , $sid);
if (mysqli_num_rows($fire)) {
    while ($row = mysqli_fetch_assoc($fire)) {
        $aid = $row['aid'];
        $payable_amount = $row['a_payable_amount'];
        $s_name = strtoupper($row['s_lname']) . ', ' . $row['s_fname'] . " " . $row['s_mname'];
    }

    $_POST['i_aid'] = $aid;
    $data = $_POST;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pay'])) {

    $fire = $query->insert("tbl_installments", $data);
    header('location: http://localhost/itn2/pages/admin_area/view_students.php');
}


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
                    <form class="forms-sample" method="POST">
                        <div class="col-12" style="margin-bottom: 50px;">
                            <div class="row">
                                <div class="col-sm-8">

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Installments for 
                                                <span class ="alert alert-success"><?= $s_name ?></span> </h4>
                                            <p class="card-description"> Fee Installment </p>

                                            <div class="form-group row">
                                                <label for="i_title" class="col-sm-3 col-form-label">Installment Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="i_title" id="i_title" placeholder="eg.second installment">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="i_amount" class="col-sm-3 col-form-label">Installment Amount</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="i_amount" id="i_amount" placeholder="Installment Amount" min="0">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="i_date" class="col-sm-3 col-form-label">Installment Date</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="i_date" id="i_date" value="<?= date('Y-m-d') ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="i_aid" id="i_date" hidden>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success mr-2" name="pay">Submit</button>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Installment History</h4>
                                            <div>
                                                <p><strong>Payable Amount: </strong> Rs. <?= $payable_amount ?>.00 </p>
                                            </div>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Title</th>
                                                        <th> Amount </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $getInstallmentInfo = $query->select("tbl_installments", "i_aid", $aid);
                                                    $count = 1;
                                                    if (mysqli_num_rows($getInstallmentInfo) > 0) {
                                                        while ($row = mysqli_fetch_assoc($getInstallmentInfo)) { ?>
                                                            <tr>
                                                                <td><?= $count; ?></td>
                                                                <td><?= $row['i_title']; ?></td>
                                                                <td><?= $row['i_amount'] ?></td>
                                                            </tr>



                                                    <?php $count++;
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td colspan="3">

                                                            <?php
                                                            $paidAmount = $query->columnSum("tbl_installments", "i_amount", "i_aid", $aid);
                                                            if (mysqli_num_rows($paidAmount) > 0) {
                                                                while ($row = mysqli_fetch_assoc($paidAmount)) {
                                                                    $totalPaidAmount = $row['SUM(i_amount)'];
                                                                }
                                                            }
                                                            ?>
                                                            <strong>Total paid:&emsp;&emsp;&emsp;&emsp;&emsp;</strong>Rs. <?= $totalPaidAmount; ?>.00
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><strong>Due:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</strong>Rs. <?= ($payable_amount - $totalPaidAmount) ?>.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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