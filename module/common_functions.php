<?php
function random_str(){
    return md5(rand(100,9999999)+rand(100,9999999));
}
?>