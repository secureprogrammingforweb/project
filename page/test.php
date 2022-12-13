<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';

$query = 'select * from auth where username="john" and password="John123";';
$op = ($conn->query($query));
var_dump(mysqli_fetch_array($op));
?>
