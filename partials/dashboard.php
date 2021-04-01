<?php

require_once('db_queries/Db_queries.php');
?>
<div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="d-flex">
                                            <div class="wrapper">
                                                <?php
                                                $fire = $query->getCount("tbl_courses", "c_name");
                                                if (mysqli_num_rows($fire) > 0) {
                                                    while ($row = mysqli_fetch_assoc($fire)) {
                                                        $no_of_courses = $row['COUNT(c_name)'];
                                                    }
                                                }

                                                ?>
                                                <h3 class="mb-0 font-weight-semibold"><?= $no_of_courses; ?></h3>
                                                <h5 class="mb-0 font-weight-medium text-primary">Courses</h5>
                                            </div>
                                            <div class="wrapper my-auto ml-auto ml-lg-4">
                                                <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                        <div class="d-flex">
                                            <div class="wrapper">
                                                <?php
                                                $fire = $query->getCount("tbl_teacher", "tid");
                                                if (mysqli_num_rows($fire) > 0) {
                                                    while ($row = mysqli_fetch_assoc($fire)) {
                                                        $no_of_trainers = $row['COUNT(tid)'];
                                                    }
                                                }

                                                ?>
                                                <h3 class="mb-0 font-weight-semibold"><?= $no_of_trainers; ?></h3>
                                                <h5 class="mb-0 font-weight-medium text-primary">Trainers</h5>
                                            </div>
                                            <div class="wrapper my-auto ml-auto ml-lg-4">
                                                <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                        <div class="d-flex">
                                            <div class="wrapper">
                                                <?php
                                                $fire = $query->getCount("tbl_student", "sid");
                                                if (mysqli_num_rows($fire) > 0) {
                                                    while ($row = mysqli_fetch_assoc($fire)) {
                                                        $no_of_students = $row['COUNT(sid)'];
                                                    }
                                                }

                                                ?>
                                                <h3 class="mb-0 font-weight-semibold"><?= $no_of_students; ?></h3>
                                                <h5 class="mb-0 font-weight-medium text-primary">Enrolled Students </h5>
                                            </div>
                                            <div class="wrapper my-auto ml-auto ml-lg-4">
                                                <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>