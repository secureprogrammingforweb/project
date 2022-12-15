<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/module/azure/api/vm.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';

$query = "select * from running_machines where user='".$_GET["user"]."';";
$result = mysqli_query($conn, $query);
$machine = mysqli_fetch_array($result);
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
  font-size: 10px;
  text-align: center;
}
</style>
</head>
<div class="grid-container">
<div class="grid-item"><?php echo $machine["machine_name"]; ?></div>
<div class="grid-item"><?php echo $machine["user"]; ?></div> 
<div class="grid-item"><?php echo $machine["url"];?></div> 
</div>