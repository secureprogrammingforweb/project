<?php
#include $_SERVER["DOCUMENT_ROOT"].'module/conn.php';

# If GET - show login page
if ($_SERVER['REQUEST_METHOD'] == "GET"){ ?>
<form action="/login.php">
<label>User Name</label>
<input type="text" name="uname" placeholder="User Name"><br>
<label>Password</label>
<input type="password" name="password" placeholder="Password"><br> 
<button type="submit">Login</button>
<?php }

# If POST process inputs
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$query = select * from auth where username="'.$_POST["username"].'" and password="'.$_POST["password"]'";
if ($conn->query($sql) != 1){

	}
}
?>
