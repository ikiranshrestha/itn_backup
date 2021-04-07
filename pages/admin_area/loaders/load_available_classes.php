<?php
function getAvailableClasses()
{
    include_once('../../../db_queries/Db_queries.php');
    if (isset($_POST['id'])) {
        $g_cid = $_POST['id'];
        $no_class_available = "No Classes available. Create One Instead.";

        $fire = $query->select("tbl_group", "g_cid", $g_cid);
        $optn = "";
        if (mysqli_num_rows($fire) > 0) {
            while ($row = mysqli_fetch_assoc($fire)) {
                    $available_rooms = $row['r_title'];  
                $optn .= "<option value =". $row['gid'] . ">" .$row['g_title'] . "</option>";
            }
            echo $optn;
        }else {
            echo $optn .= "<option>" .$no_class_available . "</option>";
        }
    }
}

getAvailableClasses();