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

    function dualJoin($required, $base_tbl, $tbl2_name, $base_tbl_fk, $tbl2_pk, $criteria_value = '')
    {
        if ($criteria_value == '') {
            $sql = "SELECT $required FROM $base_tbl INNER JOIN $tbl2_name ON $base_tbl.$base_tbl_fk = $tbl2_name.$tbl2_pk LIMIT 10";
            return $fire = mysqli_query($this->conn, $sql);
            // return $sql;
        } else {
            $sql = "SELECT $required FROM $base_tbl INNER JOIN $tbl2_name ON $base_tbl.$base_tbl_fk = $tbl2_name.$tbl2_pk LIMIT 10";
            return $fire = mysqli_query($this->conn, $sql);
            // return $sql;
        }
    }

    function triJoin($required, $base_tbl, $tbl1_name, $tbl2_name, $base_tbl1_fk, $base_tbl2_fk, $tbl1_pk, $tbl2_pk)
    {
        $sql = "SELECT $required
        FROM (($base_tbl
        INNER JOIN $tbl1_name ON $base_tbl.$base_tbl1_fk = $tbl1_name.$tbl1_pk)
        INNER JOIN $tbl2_name ON $base_tbl.$base_tbl2_fk = $tbl2_name.$tbl2_pk)";
        return $fire = mysqli_query($this->conn, $sql);
        // return $sql;
    }

    function pentaJoin($required, $base_tbl, $tbl1_name, $tbl2_name, $tbl3_name, $tbl4_name, $base_tbl1_fk, $base_tbl2_fk, $base_tbl3_fk, $base_tbl4_fk, $tbl1_pk, $tbl2_pk, $tbl3_pk, $tbl4_pk)
    {
        $sql = "SELECT $required
        FROM (((($base_tbl
        INNER JOIN $tbl1_name ON $base_tbl.$base_tbl1_fk = $tbl1_name.$tbl1_pk)
        INNER JOIN $tbl2_name ON $base_tbl.$base_tbl2_fk = $tbl2_name.$tbl2_pk) INNER JOIN $tbl3_name ON $base_tbl.$base_tbl3_fk = $tbl3_name.$tbl3_pk) INNER JOIN $tbl4_name ON $base_tbl.$base_tbl4_fk = $tbl4_name.$tbl4_pk) ";
        return $fire = mysqli_query($this->conn, $sql);
        // return $sql;
    }

    function columnSum($tbl_name, $column_name, $criteria, $criteria_value)
    {
        $query = "SELECT SUM($column_name) FROM $tbl_name WHERE $criteria = $criteria_value";
        return $fire = mysqli_query($this->conn, $query);
    }

    function filterRoomByTime($tmid)
    {
        $sql = "SELECT * FROM tbl_room WHERE rid NOT IN (SELECT `or_rid` FROM `tbl_occupied_room` WHERE or_tmid = $tmid)";
        return $fire = mysqli_query($this->conn, $sql); 
    }
}

$query = new Queries();
