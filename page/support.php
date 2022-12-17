<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/page/dashboard-gui.php';
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color: #2196F3;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
</style>
</head>

<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['name'])){
$query = "insert into support(user, question, answer) values('".$_SESSION["name"]."','".$_POST["question"]."','In review.');";
mysqli_query($conn, $query);
}
?>

<?php
if ($_SESSION["role"] == "student" || $_SESSION["role"] == "contributor"){
    $query = "select * from support where user='".$_SESSION['name']."';";
}
if ($_SESSION["role"] == "admin"){
    $query = "select * from support";
}
$result = mysqli_query($conn, $query);
echo "<table class='table table-striped table-hover' style='margin-left:25%;width:50%;'>";
echo "<tr>". 
     "<th> Question</th>".
     "<th> Answer</th>".
     "<th> Action</th>".
     "</tr>";

while($row = mysqli_fetch_array($result)) { 
  echo "<tr>".
    "<td>".$row["question"]. "</td>";
    if ($_SESSION["role"] === "admin" && $row["answer"]=== "In review."){
      echo "<td><textarea></textarea></td>";
      echo "<td>". "<button value='submitquestion'   type='button' class='btn btn-dark' id='". $row['id']."'>"."Submit". "</button>". "</td>";

    }
    else{
      echo "<td>".$row["answer"]. "</td>";
    }
    echo "<td>". "<button value='deletequestion'   type='button' class='btn btn-dark' id='". $row['id']."'>"."Delete". "</button>". "</td>";
    echo "</tr>"; 
}
echo "</table>";

?>
<!DOCTYPE html>
<html>
<body>
<form action="support.php" method="post">
<center><p><label for="question">Post Your Question:</label></p></center>
  <center><textarea id="question" name="question" rows="4" cols="50"></textarea></center>
  <br>
  <center><input type="submit" class='btn btn-dark' value="Submit"></center>
</form>
</body>
</html>
</body>
</html>
