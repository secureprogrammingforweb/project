<?php
/*
Machine name
Button to start machine
Machine Disc
*/
session_start()
if (is_set($_GET["name"])){
    echo "Machine name: ".$name;
    // BUTTON HERE
    echo "Machine notes: ".$disc;
}
?>