<?php

function getTrainer()
{
    include_once('../../../db_queries/Db_queries.php');
    if (isset($_POST['id'])) {
        $cid = $_POST['id'];
        $no_trainer_available = "No Trainer available. Hire One First.";


        $fire = $query->select("tbl_teacher", "t_cid", $cid);
        // $optn = "";
        if (mysqli_num_rows($fire) > 0) {
            while ($row = mysqli_fetch_assoc($fire)) {
                $t_name = $row['t_fname'] . " " . $row['t_mname'] . " " . $row['t_lname'];
                $optn = "<option value =" . $row['tid'] . ">" . $t_name . "</option>";
                echo $optn;
            }
        } else {
            echo $optn = "<option>" . $no_trainer_available . "</option>";
        }
    }
}
getTrainer();


// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
//     $data = $_POST;
//     $fire = $query->insert("tbl_group", $data);
//     if ($fire) {
//         header('location: http://localhost/itn2/pages/admin_area/available_classes.php');
//     }
// }
