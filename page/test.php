<?php
// include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
// $query = 'select role from rbac where username="1";';

// $machines = mysqli_fetch_array($conn->query("select * from machines_db"));
// var_dump($machines["machine_name"]);
$command = "az vm list";
$op = shell_exec($command);
$data = json_decode($op,true);

// foreach ($data as $container){
//     echo ($container["containers"][0]["name"]);
//     echo ($container["ipAddress"]["fqdn"]);
// }
// print("<pre>".print_r($data,true)."</pre>");
$RG_NAME = "1-2ed9ccc1-playground-sandbox";

// print(shell_exec("az vm show -d -g ".$RG_NAME." -n ".$VMNAME." --query publicIps -o tsv"));
foreach ($data as $VM){
    echo ("Name: ".$VM["name"]);
    echo ("Name: ".$VM["storageProfile"]["osDisk"]["osType"]);
    echo (shell_exec("az vm show -d -g ".$RG_NAME." -n ".$VM["name"]." --query publicIps -o tsv"));
    echo "<br>";
}
?>
