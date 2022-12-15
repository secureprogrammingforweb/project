<?php
// include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
session_start();
include $_SERVER["DOCUMENT_ROOT"].'/project/module/login.php';
if (isset($_SESSION['name'])){
    echo ("Welcome ".$_SESSION['name']);
    if ($_SESSION['role'] == "admin"){
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/dashboard/admin.php';
    }
    if ($_SESSION['role'] == "contributer"){
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/dashboard/contrbuter.php';
    }
    if ($_SESSION['role'] == "student"){
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/dashboard/student.php';
    }
}

else{
    header("Location: http://localhost/project/page/login.php");
}
?>