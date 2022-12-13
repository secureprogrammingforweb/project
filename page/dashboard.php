<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
include $_SERVER["DOCUMENT_ROOT"].'/project/module/login.php';
if (isset($_SESSION['name'])){
    echo ("welcome user with session".var_dump($_SESSION['name']));
}
else{
    echo "no Sess";
}
?>