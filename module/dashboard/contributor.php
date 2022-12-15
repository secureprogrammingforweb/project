<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/module/azure/api/vm.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';

?>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto;
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

// Can add machine, delete, modify machine
// Button to open POPUP to add machine

// List machiens
$query = "select machine_name from machines_db;";
$machines = mysqli_query($conn,$query); ?>
<div class="grid-container">
<div class="grid-item">Machine name</div>
    <div class="grid-item">Edit</div>
<?php while($row = mysqli_fetch_array($machines)) { ?>
    <div class="grid-item"><?php echo $row["machine_name"]; ?></div>
    <div class="grid-item"><button>Edit</button></div> 
<?php } ?></div>
<button value="addmachine">Add machine</button>