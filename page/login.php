<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';


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


# If GET - show login page
if ($_SERVER['REQUEST_METHOD'] == "GET"){ ?>
<form method="POST" action="/project/page/login.php">
<label>User Name</label>
<input type="text" name="username" placeholder="User Name"><br>
<label>Password</label>
<input type="password" name="password" placeholder="Password"><br> 
<button type="submit">Login</button>
<?php }

# If POST process inputs
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$query = 'select * from auth where username="'.$_POST["username"].'" and password="'.$_POST["password"].'";';
if (mysqli_fetch_array($conn->query($query)) == NULL){
		echo ("Wrong username or password");
	}
else {
		session_start();
		$_SESSION['name']=$_POST["username"];
		$query = 'select role from rbac where username="'.$_POST["username"].'";';
		// GET role of user
		$_SESSION['role'] = mysqli_fetch_array($conn->query($query))["role"];

		//header("Location: http://localhost/project/page/dashboard.php");
		header("Location: http://localhost/project/page/dashboard-gui.php");
	}
}
?>