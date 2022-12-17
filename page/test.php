<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/azure/api/vm.php';
// $query = 'select role from rbac where username="1";';

// $machines = mysqli_fetch_array($conn->query("select * from machines_db"));
// var_dump($machines["machine_name"]);
// $command = "az vm list";
// $op = shell_exec($command);
// $data = json_decode($op,true);

// foreach ($data as $container){
//     echo ($container["containers"][0]["name"]);
//     echo ($container["ipAddress"]["fqdn"]);
// }
// print("<pre>".print_r($data,true)."</pre>");
$RG_NAME = "1-65cd8a9e-playground-sandbox";
// $StudnetName = "john";
// $query = 'SELECT time_sarted FROM running_machines where username="'.$StudnetName.'"';
// $started_time = mysqli_fetch_array($conn->query($query));
// var_dump(time() - intval($started_time));
// print(shell_exec("az vm show -d -g ".$RG_NAME." -n ".$VMNAME." --query publicIps -o tsv"));
// foreach ($data as $VM){
//     echo ("Name: ".$VM["name"]);
//     echo ("Name: ".$VM["storageProfile"]["osDisk"]["osType"]);
//     echo (shell_exec("az vm show -d -g ".$RG_NAME." -n ".$VM["name"]." --query publicIps -o tsv"));
//     echo "<br>";
// }
// create_vm("NAME1","WindowsVM","GNS",$RG_NAME,$conn);

?>
