<?php
// include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
session_start();
include $_SERVER["DOCUMENT_ROOT"].'/project/module/login.php';
if (isset($_SESSION['name'])){
    echo ("Welcome ".$_SESSION['name']);
    if ($_SESSION['name'] == "admin"){
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/dashboard/admin.php';
    }
    if ($_SESSION['name'] == "contributer"){
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/dashboard/contrbuter.php';
    }
    if ($_SESSION['name'] == "student"){
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/dashboard/student.php';
    }
}

else{
    header("Location: http://localhost/project/page/login.php");
}
?>