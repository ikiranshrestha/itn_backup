<?php
require_once('../../validate/validate_login.php');
include_once('../../db_queries/Db_queries.php');

$sid = $_GET['ref'];
$fire = '';
// $totalPaidAmount = '';
$paidAmount = '';
$payable_amount;
$aid;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET)) {
    $fireStudentDetails = $query->select("tbl_student", "sid", $sid);

    if (mysqli_num_rows($fireStudentDetails) > 0) {
        while ($row = mysqli_fetch_assoc($fireStudentDetails)) {
            if (!empty($row['s_mname'])) {
                $sname = $row['s_fname'] . " " . $row['s_mname'] . " " . $row['s_lname'];
            } else {
                $sname = $row['s_fname'] . " " . $row['s_lname'];
            }
            $gender = $row['s_gender'];
            $address = $row['s_address'];
            $city = $row['s_city'];
            $email = $row['s_email'];
            $phone = $row['s_phone'];
            $guardian_name = $row['s_guardian_name'];
            $guardian_phone = $row['s_guardian_phone'];
            $guardian_relation = $row['s_guardian_relation'];
            $college_name = $row['s_college'];
            $academic_level = $row['s_academic_level'];
        }
    }

    $fireEnrollmentDetails = $query->dualJoin("*", "tbl_admission", "tbl_student", "a_sid", "sid", "a_sid", $sid);
    if (mysqli_num_rows($fireEnrollmentDetails) > 0) {
        while ($row = mysqli_fetch_assoc($fireEnrollmentDetails)) {
            $aid = $row['aid'];
            $a_date = $row['a_date'];
            $payable_amount = $row['a_payable_amount'];
            $cid = $row['a_cid'];

            $getCourseName = $query->select("tbl_courses", "cid", $cid);
            if (mysqli_num_rows($getCourseName) > 0) {
                while ($row = mysqli_fetch_assoc($getCourseName)) {
                    $course_name = $row['c_name'];
                }
            }
        }
    }
    $getInstallmentInfo = $query->select("tbl_installments", "i_aid", $aid);
    if (mysqli_num_rows($getInstallmentInfo) > 0) {
        while ($row = mysqli_fetch_assoc($getInstallmentInfo)) {
            $paidAmount = $query->columnSum("tbl_installments", "i_amount", "i_aid", $aid);
            if (mysqli_num_rows($paidAmount) > 0) {
                while ($row = mysqli_fetch_assoc($paidAmount)) {
                    $totalPaidAmount = $row['SUM(i_amount)'];
                }
            }
        }
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
                    <!-- Start -Personal Information and contact -->
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Student Information</h4>
                                <p class="card-description"> Personal info </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Student's Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $sname ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Gender</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $gender ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $address ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">City</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $city ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $phone ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $email ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Guardian's Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $guardian_name ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Guardian's Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $guardian_phone ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Relation with Guardian</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $guardian_relation ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">College Enrolled with</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $college_name ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Current Academic Level</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $academic_level ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End -Personal Information and contact -->

                    <!-- Start - Enrollment Information -->
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Enrollment Information</h4> -->
                                <p class="card-description"> Enrollment info </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Admission Date</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $a_date ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Enrolled Course</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $course_name ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Amount Payable</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $payable_amount ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End - Enrollment Information -->

                    <!-- Start - Installment Information -->
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Enrollment Information</h4> -->
                                <p class="card-description"> Installment info </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Payable Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $payable_amount ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Paid Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="<?= $totalPaidAmount ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Due Amount</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" value="<?= $payable_amount - $totalPaidAmount ?>" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End - Installment Information -->
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