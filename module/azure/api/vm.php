<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/common_functions.php';

/*
az vm create --resource-group 1-2ed9ccc1-playground-sandbox --name MyVM --image UbuntuLTS --admin-username 'gns' --admin-password 'Password123!' --location eastus
*/

function getVMIP($VMNAME,$RG_NAME){
    return mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
    #return system("az vm show -d -g ".$RG_NAME." -n ".$VMNAME." --query publicIps -o tsv");
}

function create_vm($VMNAME,$OS,$USER_WHO_CREATED,$RG_NAME,$conn){
    include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';

    //Create windows10 Ubuntu or WindowsServer`
    /*
        {
            "fqdns": "",
            "id": "/subscriptions/4cedc5dd-e3ad-468d-bf66-32e31bdb9148/resourceGroups/1-2ed9ccc1-playground-sandbox/providers/Microsoft.Compute/virtualMachines/MyVM",
            "location": "eastus",
            "macAddress": "60-45-BD-D4-A1-DC",
            "powerState": "VM running",
            "privateIpAddress": "10.0.0.4",
            "publicIpAddress": "172.173.157.239",
            "resourceGroup": "1-2ed9ccc1-playground-sandbox",
            "zones": ""
        }
    */ 
    if ($OS == "WindowsVM"){
        $OS = "win2016datacenter";    
    }
    if ($OS == "LinuxVM"){
        $OS = "UbuntuLTS";    
    }
    // $OS = "UbuntuLTS","win2016datacenter";
    $USERNAME = random_str();
    $PASSWORD = random_str();
    $VM_NAME = $USERNAME."000".$OS;
    $command = "az vm create --resource-group ".$RG_NAME." --name ".$VM_NAME." --image ".$OS." --admin-username '".$USERNAME."' --admin-password '".$PASSWORD."' --location eastus";
    $IP = getVMIP($VM_NAME,$RG_NAME);
    // UPDATE DB with username, and VM name, IP, username, password
    $query = "insert into running_vms values('".$USER_WHO_CREATED."','".$OS."' ,'".$IP."' ,'".$USERNAME."','".$PASSWORD."','".strval(time())."')";
    $val = $conn->query($query);
}


function listAllVM(){
    $command = "az vm list";
    $op = shell_exec($command);
    $data = json_decode($op,true);
    foreach ($data as $VM){

    }

}
function deleteVM($VMNAME,$UserWhoTookAction){
    /*
    az resource update --resource-group myResourceGroup --name myVM --resource-type virtualMachines --namespace Microsoft.Compute --set properties.storageProfile.osDisk.deleteOption=detach
    az vm delete --resource-group 1-527abd84-playground-sandbox --name myVM  --yes
    */
    shell_exec("az resource update --resource-group ".$RG_NAME." --name ".$VMNAME." --resource-type virtualMachines --namespace Microsoft.Compute --set properties.storageProfile.osDisk.deleteOption=detach");
    shell_exec("az vm delete --resource-group ".$RG_NAME." --name ".$VMNAME." --yes");
}
?>