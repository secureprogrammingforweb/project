<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
/*
Machine name
Button to start machine
Machine Disc
*/
session_start();
if(isset($_GET["name"])){
    // GET machine name
    $query = "select * from machines_db where machine_name='".$_GET["name"]."'";
    $machine_data = mysqli_fetch_array($conn->query($query));
    echo $machine_data["machine_name"];
    echo "<br>Logo: ".$machine_data['machine_logo_url'];
    // BUTTON HERE
    ?><button onclick="____START___MACHINE"> <?php
    echo "<br>Machine notes: ".$machine_data["machine_disc"];
}
?>