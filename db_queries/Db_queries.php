<?php

class Queries
{
    public $conn;
    function __construct()
    {
        require_once(__DIR__ . '../../config/config.php');
        $this->conn = $configuration->makeConnection();
    }


    function insert($tblName, $data)
    {
        $data = array_slice($data, 0, -1);
        $keys = array();
        $values = array();

        foreach ($data as $key => $value) {
            $keys[] = $key;
            $values[] = $value;
        }
        $query = "INSERT INTO $tblName(" . implode(", ", $keys) . ") VALUES('" . implode("', '", $values) . "')";
        return $result = mysqli_query($this->conn, $query);
    }

    function select($tblName, $criteria = '', $criteria_value = '')
    {
        if ($criteria == '') {
            $sql = "SELECT * from $tblName";
            return $fire = mysqli_query($this->conn, $sql);
        } else {
            $sql = "SELECT * from $tblName WHERE $criteria = $criteria_value";
            return $fire = mysqli_query($this->conn, $sql);
        }
    }

    function update($tblName, $data, $criteria, $criteria_value)
    {
        $query = "UPDATE $tblName SET";
        $comma = " ";
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $query .= $comma . $key . " = '" . mysqli_real_escape_string($this->conn, trim($value)) . "'";
                $comma = ", ";
            }
        }
        $query .= " WHERE $criteria = '$criteria_value'";
        // return $query;
        return $fire = mysqli_query($this->conn, $query);
    }

    function dualJoin($required, $tbl1_name, $tbl2_name, $tbl1_fk, $tbl2_pk, $criteria_value = '')
    {
        if ($criteria_value == '') {
                $sql = "SELECT $required FROM $tbl1_name INNER JOIN $tbl2_name ON $tbl1_name.$tbl1_fk = $tbl2_name.$tbl2_pk LIMIT 10";
            return $fire = mysqli_query($this->conn, $sql);
            // return $sql;
        } else {
            $sql = "SELECT $required FROM $tbl1_name INNER JOIN $tbl2_name ON $tbl1_name.$tbl1_fk = $tbl2_name.$tbl2_pk LIMIT 10";
                return $fire = mysqli_query($this->conn, $sql);
                // return $sql;
        }
    }

    // function pentaJoin($required, $tbl1_name, $tbl2_name, $tbl3_name, $tbl4_name, $tbl5_name)
    // {
    //     $sql = "SELECT * FROM ((((tbl_group INNER JOIN tbl_courses ON tbl_group.g_cid = tbl_courses.cid) INNER JOIN tbl_teacher ON tbl_group.g_tid = tbl_teacher.tid) INNER JOIN tbl_time ON tbl_group.g_tmid = tbl_time.tmid) INNER JOIN tbl_room ON tbl_group.g_rid = tbl_room.rid)";

    // }

    function columnSum($tbl_name, $column_name, $criteria, $criteria_value)
    {
        $query = "SELECT SUM($column_name) FROM $tbl_name WHERE $criteria = $criteria_value";
        return $fire = mysqli_query($this->conn, $query);
    }
}

$query = new Queries();
