<?php

// $query->triJoin("")
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
//     $data = $_POST;
//     $fire = $query->insert("tbl_courses", $data);
//     if ($fire) {
//         header('location: http://localhost/itn/pages/forms/view_courses.php');
//     }
// }
session_start();
if(!$_SESSION['uname']){
    header('Location: login.php');
}else{
    $fullname = $_SESSION['fullname'];
    $designation = $_SESSION['designation'];
}
require_once ('partials/navigationBar.php');
?>

    
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php require_once('partials/customSidebar.php'); ?>
            <div class="main-panel">

                <?php include_once('./partials/dashboard.php'); ?>

            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                    <a href="https://shresthakiran.com.np" target="_blank">&nbsp;Kiran Shrestha</a>
                </span>
                2020</span>
        </div>
    </footer> -->
    <?php include_once('./partials/_footer.html'); ?>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="assets/js/shared/off-canvas.js"></script>
    <script src="assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script src="assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>