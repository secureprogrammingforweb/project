<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
// show running machine and option to stop
$machines_running_query =  '';
// show list of machines with play button which starts machine
$machines_list = mysqli_fetch_array($conn->query("select machine_name from machines_db"));
foreach ($machines_list as $machine){
    echo ("Machine Name ".$machine)
}
?>