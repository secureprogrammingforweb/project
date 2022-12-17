<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

error_reporting(0);
ini_set('display_errors', 0);

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// CONFIG
$RG_NAME = "1-65cd8a9e-playground-sandbox";

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_NOTICE);

// For PHP >=5.3 use: E_ALL & ~E_NOTICE

// Report all PHP errors (see changelog)
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
$_SESSION["CSRF"] = md5(rand());
?>
