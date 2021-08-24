<?php
//Admission Table must contain fields - aid, a_sid, a_payable_amount, a_date
//installment Table must contain fields - iid, i_title, i_amount, i_date, i_aid
require_once('../../validate/validate_login.php');
require_once('../../db_queries/Db_queries.php');
require_once('../../config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $data = $_POST;
    $query->insert("tbl_teacher", $data);
}

require_once('../../partials/navigationBar.php');
?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php require_once('../../partials/customSidebar.php'); ?>
            <div class="main-panel">
                <!-- <div class="content-wr"> -->
                <form class="forms-sample" method="POST">
                    <!-- Form - Add Trainer -->
                    <div class=" col-12 stretch-card" style="margin-bottom: 50px;">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Trainer</h4>
                                <p class="card-description"> Trainer's Details </p>
                                <div class="form-group row">
                                    <label for="t_fname" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="t_fname" id="t_fname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_mname" class="col-sm-3 col-form-label">Middle Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="t_mname" id="t_mname" placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_lname" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="t_lname" id="t_lname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cstatus" class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="t_gender" id="" value="female"> Female
                                        <input type="radio" name="t_gender" id="" value="male"> Male
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tphoto" class="col-sm-3 col-form-label">Trainer Photo</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="t_photo" id="tphoto">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="t_email" class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="t_email" class="form-control" name="t_email" id="t_email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_phone" class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control" name="t_phone" id="t_phone" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_address" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="t_address" id="t_address" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_city" class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="t_city" id="t_city" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_nearest_kin" class="col-sm-3 col-form-label">Nearest Kin</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="t_nearest_kin" id="t_nearest_kin" placeholder="Kin's Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_nearest_kin_contact" class="col-sm-3 col-form-label">Nearest Kin's Contact</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control" name="t_nearest_kin_contact" id="t_nearest_kin_contact" placeholder="Kin's Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_nearest_kin_relation" class="col-sm-3 col-form-label">Relationship with Kin</label>
                                    <div class="col-sm-9">
                                        <select name="t_nearest_kin_relation" id="t_nearest_kin_relation" class="form-control">
                                            <option value="" selected disabled>--Relation with Kin--</option>
                                            <option value="Spouse">Sopuse</option>
                                            <option value="Parent">Parent</option>
                                            <option value="Issue">Issue</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="t_academic_level" class="col-sm-3 col-form-label">Course</label>
                                    <div class="col-sm-9">
                                        <select name="t_cid" id="t_cid" class="form-control">
                                            <option value="" selected disabled>--Select Course--</option>
                                            <?php
                                            $fire = $query->select("tbl_courses");
                                            if (mysqli_num_rows($fire) > 0) {
                                                while ($row = mysqli_fetch_assoc($fire)) { ?>
                                                    <option value="<?= $row['cid'] ?>"><?= $row['c_name'] ?></option>
                                            <?php }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mr-2" name="submit">Submit</button>

                            </div>
                        </div>
                    </div>
                    <!-- Form - End of Add Trainer -->
            </div>
        </div>
        </form>
        <!-- </div> -->

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

    <!-- custom jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>

</html>