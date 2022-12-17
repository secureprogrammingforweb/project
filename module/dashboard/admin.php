<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/module/azure/api/vm.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';

?>
<head>
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
.container {
   margin:0 auto; /* this will center the page */
   width:960px; /*  use your width here */
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<div class="container">
      <!-- all your great content here -->
    </div>
<?php

// Can add machine, delete, modify machine
// Button to open POPUP to add machine

// List machiens
$query = "select * from running_machines;";
$machines = mysqli_query($conn,$query); ?>
<table class="table table-striped table-hover" style="margin-left:25%;width:50%;">
<tr>
<td>Machine Name </td>
<td>User Name </td>
<td>Action</td>
<?php while($row = mysqli_fetch_array($machines)){
  echo "<tr>".
    "<td>".$row["machine_name"]. "</td>".   
    "<td>".$row["user"]. "</td>".   
    "<td>". "<button type='button' class='btn btn-dark' >"."Stop". "</button>". "</td>".   
    "</tr>"; 
}?>
</table>