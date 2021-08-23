<?php
require_once('logout.php');
ob_start();
session_start();
if(!$_SESSION['uname']){
    header('Location: ../../login.php');
}else{
    $fullname = $_SESSION['fullname'];
    $designation = $_SESSION['designation'];
}
?>