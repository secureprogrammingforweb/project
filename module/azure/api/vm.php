<?php
/*
az vm create --resource-group 1-2ed9ccc1-playground-sandbox --name MyVM --image UbuntuLTS --admin-username 'gns' --admin-password 'Password123!' --location eastus
*/

function create_vm($VMNAME,$OS,$USER_WHO_CREATED){
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
    if ($OS == "windows"){
        $OS = "win2016datacenter";    
    }
    if ($OS == "linux"){
        $OS = "UbuntuLTS";    
    }
    // $OS = "UbuntuLTS","win2016datacenter";
    $VM_NAME = $USERNAME+"000"+$OS+"000"+random_str();
    $command = "az vm create --resource-group ".$RG_NAME." --name ".$VM_NAME." --image ".$OS." --admin-username '".$USERNAME."' --admin-password '".$PASSWORD."' --location eastus" 
    // UPDATE DB with username, and VM name, IP, username, password 
    $IP = getVMIP($VMNAME)
}

function getVMIP($VMNAME){
    return "az vm show -d -g ".$RG_NAME." -n ".$VMNAME." --query publicIps -o tsv";
}

function listAllVM(){
    $command = "az vm list";
    $op = shell_exec($command);
    $data = json_decode($op,true);
    foreach ($data as $VM){

    }

}
function deleteVM($VMNAME){
    /*
    az resource update --resource-group myResourceGroup --name myVM --resource-type virtualMachines --namespace Microsoft.Compute --set properties.storageProfile.osDisk.deleteOption=detach
    az vm delete --resource-group 1-527abd84-playground-sandbox --name myVM  --yes
    */
    shell_exec("az resource update --resource-group ".$RG_NAME." --name ".$VMNAME." --resource-type virtualMachines --namespace Microsoft.Compute --set properties.storageProfile.osDisk.deleteOption=detach")
    shell_exec("az vm delete --resource-group ".$RG_NAME." --name ".$VMNAME." --yes")
}
?>