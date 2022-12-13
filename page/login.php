<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
include $_SERVER["DOCUMENT_ROOT"].'/project/module/sessionmgr.php';

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
		$_SESSION['name']="JACK";
		header("Location: http://localhost/project/page/dashboard.php");
		//var_dump($_SESSION['name']);
	}
}
?>