<?php

include $_SERVER["DOCUMENT_ROOT"].'/project/module/azure/api/vm.php';

function isStudentAllowedToStartVM($StudnetName){
    $query = 'SELECT time_sarted FROM running_machines where username="'.$StudnetName.'"';
    $time = mysqli_fetch_array($conn->query($query));
    // 3600
    if (time() - intval($time) > 3600){
        return true;
    }
    else {
        return false;
    }
}

function isStudentAllowedToStartMachine($StudnetName){
    // Get machinesattus Table
    // Get what amchine run by user latest with time
    // If time less than 1hr show stop button
    // If time grater than hr show re-run last lab button

    $query = 'SELECT time_sarted FROM running_VM where username="'.$StudnetName.'"';
    $time = mysqli_fetch_array($conn->query($query));
    // 3600
    if (time() - intval($time) > 3600){
        return true;
    }
    else {
        return false;
    }
}

session_start();
$MachineORVMname = $GET["MachineOrVMname"];
if ($MachineORVMname == "WindowsVM" || $MachineORVMname == "LinuxVM"){
    if(isStudentAllowedToStartVM($_SESSION['name'])){
        echo "Your VM will be starting in a minute";
        create_vm($VMNAME,$GET["MachineOrVMname"],$_SESSION['name'])
    }
    else {
        echo "Please stop your old VM";
    }
}
else{
    if(isStudentAllowedToStartMachine($_SESSION['name'])){
        echo "Your machine will be starting in a minute";
    }
    else {
        echo "Please stop your old Machine";
    }
}

echo "IP : dkjlsadjlsaldk"

?>