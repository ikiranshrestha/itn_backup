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
                    <div class="col-lg-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Students Table</h4>
                                <!-- <p class="card-description"> Add class <code>.table-{color}</code> </p> -->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th> Course Name </th>
                                            <th> Course Cost </th>
                                            <th> Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $fire = $query->select("tbl_courses");
                                        if (mysqli_num_rows($fire) > 0) {
                                            while ($row = mysqli_fetch_assoc($fire)) { ?>

                                                <tr class="table-info">
                                                    <td> <?= $row['cid']; ?> </td>
                                                    <td> <?= $row['c_name']; ?> </td>
                                                    <td> Rs. <?= $row['c_cost']; ?>.00 </td>
                                                    <?php
                                                    $c_status = $row['c_status'];
                                                    if ($c_status == "available") { ?>
                                                        <td> <input type="button" value="<?= $c_status; ?>" name="c_status" class="btn btn-success" disabled> </td>
                                                    <?php } else { ?>
                                                        <td> <input type='button' value='<?= $c_status; ?>' name='c_status' class='btn btn-danger' disabled> </td>
                                                    <?php }
                                                    ?>

                                                </tr>

                                        <?php }
                                        }
                                        ?>
                                        <!-- <tr class="table-warning">
                                            <td> 2 </td>
                                            <td> PHP </td>
                                            <td> Rs 30,000</td>
                                            <td> <input type="button" value="Available" class="btn btn-success" disabled> </td>
                                        </tr>
                                        <tr class="table-danger">
                                            <td> 3 </td>
                                            <td> Mobile Development (Android-Java) </td>
                                            <td> Rs 70,000 </td>
                                            <td> <input type="button" value="Unavailable" class="btn btn-danger" disabled> </td>
                                        </tr>
                                        <tr class="table-success">
                                            <td> 4 </td>
                                            <td> Mobile Development (iOS-Swift) </td>
                                            <td> Rs 1.00,000 </td>
                                            <td> <input type="button" value="Unavailable" class="btn btn-danger" disabled> </td>
                                        </tr>
                                        <tr class="table-primary">
                                            <td> 5 </td>
                                            <td> Python </td>
                                            <td> Rs 40,000 </td>
                                            <td> <input type="button" value="Available" class="btn btn-success" disabled> </td>
                                        </tr> -->
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