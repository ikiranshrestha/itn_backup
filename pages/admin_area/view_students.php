<?php
require_once('../../validate/validate_login.php');
include_once('../../db_queries/Db_queries.php');

require_once('../../partials/navigationBar.php');
?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php require_once('../../partials/customSidebar.php'); ?>
            <div class="main-panel">
                <div class="content-wr">
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
                                                <th> Student's Name </th>
                                                <th> Installments </th>
                                                <th colspan="2"> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $fire = $query->select("tbl_student");
                                            if (mysqli_num_rows($fire) > 0) {
                                                while ($row = mysqli_fetch_assoc($fire)) { ?>

                                                    <tr class="table-info">
                                                        <td> <?= $row['sid']; ?> </td>
                                                        <td> <?= $row['s_fname'] . " " . $row['s_mname'] . " " . $row['s_lname']; ?> </td>
                                                        <td> <a href="http://localhost/itn2/pages/admin_area/pay_installment.php?ref=<?= $row['sid']; ?>"> <button class="btn btn-success"> Pay </button> </a> </td>
                                                        <td> <a href="http://localhost/itn2/pages/admin_area/student_details.php?ref=<?= $row['sid']; ?>"> <button class="btn btn-primary"> View </button> </a> <a href="http://localhost/itn2/pages/admin_area/edit_student.php?ref=<?= $row['sid']; ?>"> <button class="btn btn-warning"> Edit </button> </a> <a href="../admin_area/assign_group.php?ref=<?= $row['sid']; ?>"> <button class="btn btn-info"> Assign Class </button> </a> </td>

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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> -->
    <script src="../../assets/js/custom/jquery.js"></script>
    <script src="../../assets/js/custom/custom.js"></script>

</body>

</html>