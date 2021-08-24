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
                                                <th> Trainer's Name </th>
                                                <th colspan="2"> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $fire = $query->select("tbl_teacher");
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
    <script>
        $("#search").keyup(function() {
            var value = this.value.toLowerCase().trim();

            $("table tr").each(function(index) {
                if (!index) return;
                $(this).find("td").each(function() {
                    var id = $(this).text().toLowerCase().trim();
                    var not_found = (id.indexOf(value) == -1);
                    $(this).closest('tr').toggle(!not_found);
                    return not_found;
                });
            });
        });
    </script>
</body>

</html>