<?php
function passpol($password){
    $password;
if( strlen($password) < 8 ) {
    echo "false";
    return ;
}
if(preg_match("/[^0,9]/", $password)) {
    //how to check the upper case and lower case
    if($password == strtoupper($password) || $password == strtolower($password)){
        echo "false";
        return;
    }
    else{
    echo "true"; }
}
else {
    echo("false");
}
}
?>