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
</style>
</head>

<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
session_start();
?>
<div class="grid-container">
<?php
$query = "select * from support where user='".$_SESSION['name']."';";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result)) { ?>
    <div class="grid-item"><?php echo $row["question"]; ?></div>
    <div class="grid-item"><?php echo $row["answer"]; ?></div>
    <div class="grid-item" id="<?php echo $row['id']; ?>"><button>Delete</button></div> 
<?php } ?></div>