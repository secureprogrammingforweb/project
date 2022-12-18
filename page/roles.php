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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
?>
<?php
    $query = "select * from rbac";
$result = mysqli_query($conn, $query);
echo "<table class='table table-striped table-hover' style='margin-left:25%;width:50%;'>";
echo "<tr>". 
     "<th> User</th>".
     "<th> Role</th>".
     "<th> Change Role</th>".
     "<th> Action</th>".
     "</tr>";

while($row = mysqli_fetch_array($result)) { 
  echo "<tr>".
    "<td>".$row["username"]. "</td>";
    echo "<td>".$row["role"]. "</td>";
    echo '<td><div class="dropdown"><button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change role</button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">&nbsp;Admin </a><a class="dropdown-item" href="#">&nbsp;Contributor&nbsp;</a> <a class="dropdown-item" href="#">&nbsp;Student&nbsp;</a> </div></div></td>';
    echo "<td>". "<button value='deletequestion'   type='button' class='btn btn-dark' id='". $row['id']."'>"."Apply". "</button>". "</td>";
    echo "</tr>"; 
}
echo "</table>";
