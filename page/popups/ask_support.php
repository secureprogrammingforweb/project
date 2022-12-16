<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/azure/api/vm.php';
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<form action="/project/page/popups/ask_support.php" method="post">
  <p><label for="question">Post Your Question:</label></p>
  <textarea id="question" name="question" rows="4" cols="50"></textarea>
  <br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['name'])){
$query = "insert into support(user, question, answer) values('".$_SESSION["name"]."','".$_POST["question"]."','In review.');";
mysqli_query($conn, $query);
}
?>
</body>
</html>