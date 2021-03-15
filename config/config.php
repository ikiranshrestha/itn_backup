<?php

class config{
    public $conn=NULL;

    // function __construct()
    // {
    //     $host = "127.0.0.1";
    //     $uname = "root";
    //     $password = "";
    //     $dbName = "itn2";

    //     return $this->conn =mysqli_connect($host, $uname, $password, $dbName);
    // }
    public function makeConnection()
    {
        $host = "127.0.0.1";
        $uname = "root";
        $password = "";
        $dbName = "itn2";

        return mysqli_connect($host, $uname, $password, $dbName);
    }
}

$configuration = new config();



?>