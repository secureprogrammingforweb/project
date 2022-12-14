<?php

function list_containers(){
    $command = "az container list";
    $op = shell_exec($command);
    $data = json_decode($op,true);

    // Get name of container (dnsNameLabel) and URL (fqdn)
    $containers_Name_FQDN = array();
    foreach ($data as $container){
        echo ($container["containers"][0]["name"]);
        echo ($container["ipAddress"]["fqdn"]);
        // Insert into $containers_Name_FQDN //SRIKAR
    }
    return $containers_Name_FQDN;
}

function container_create($machine_name){
    // Get machine's repo name and openports
    $machine_name = "REPO"; //SRIKAR
    $ports = "80,8080,443"; //SRIKAR
    $name = $USERNAME+"000"+$OS+"000"+random_str();
    $command = "az container create --resource-group ".$RG_NAME." --name machine_".$name."  --image ".$machine_name." --ports ".$ports." --dns-name-label machine_".$unique." --location eastus" 
}

function container_delete($containername){
    $command = "az container delete --name ".$containername." --resource-group ".$RG_NAME." --yes";
    shell_exec($command);
}
?>