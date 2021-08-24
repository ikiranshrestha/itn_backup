<?php
require_once('../../validate/validate_login.php');
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
require_once('../../partials/navigationBar.php');
?>
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