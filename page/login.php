<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';

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