<?php

include $_SERVER["DOCUMENT_ROOT"].'/project/module/azure/api/vm.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
-->
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

<table class="table table-striped table-hover" style="margin-left:25%;width:50%;">
<tr>
<td>Machine Name </td>
<td>Action</td>
<?php while($row = mysqli_fetch_array($machines)){
  echo "<tr>".
    "<td>".$row["machine_name"]. "</td>".   
    "<td>". "<button type='button' class='btn btn-dark' >"."Edit". "</button>". "</td>".   
    "</tr>"; 
}?>
</table>
<button value="addmachine" style="margin-left:25%;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add machine</button>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
              <form action="/project/page/dashboard.php" method="post" enctype="multipart/form-data">
                User Name:<input type="text" class="form-control form-control-sm" placeholder="name" name="name">
                Repo URL:<input type="text" class="form-control form-control-sm" placeholder="repo url" name="repo_url">
                Disc:<input type="text" class="form-control form-control-sm" placeholder="disc" name="disc">
                Upload File: <input type="file"  class="form-control-file" name="logo" id="logo"><br>
                <input class='btn btn-dark' type="submit">
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>



  
</html>
