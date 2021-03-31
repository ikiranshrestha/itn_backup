<?php


function getRooms()
{
    include_once('../../../db_queries/Db_queries.php');
    if (isset($_POST['id'])) {
        $tmid = $_POST['id'];

        // $fire = $query->select("tbl_room");
        $fire = $query->filterRoomByTime($tmid);
        // $fire = $query->dualJoin("rid, r_title, or_rid, or_tmid", "tbl_occupied_room", "tbl_room", "or_rid", "rid");
        // $fire = $query->triJoin("*", "tbl_occupied_room", "tbl_room", "tbl_time", "or_rid", "or_tmid", "rid", "tmid");
        $optn = "";
        if (mysqli_num_rows($fire) > 0) {
            while ($row = mysqli_fetch_assoc($fire)) {
                    $available_rooms = $row['r_title'];  
                $optn .= "<option value =". $row['rid'] . ">" .$available_rooms . "</option>";
            }
            echo $optn;
        }
    }
}

getRooms();