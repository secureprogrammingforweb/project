
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php 
include $_SERVER["DOCUMENT_ROOT"].'/project/page/dashboard-gui.php';
include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';

  
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //include $_SERVER["DOCUMENT_ROOT"].'/project/page/dashboard-gui.php';
    $query = "UPDATE auth SET username = '". $_POST["username"]. "WHERE username = '". $_SESSION['name'] ."'";
    mysqli_query($conn, $query);
	header("Location: http://localhost/project/page/dashboard.php");
}

echo "<table class='table table-striped table-hover' style='margin-left:25%;width:50%;'>".
"<tr>".
"<th>User Name</th>".
"<th>Role</th>".
"<th>Action</th></tr>";
$query = "select * from rbac where username='". $_SESSION['name']. "'";
$users = mysqli_query($conn,$query); 
 while($row = mysqli_fetch_array($users)){
  echo "<tr>".
    "<td>".$row["username"]. "</td>".   
    "<td>".$row["role"]. "</td>".   
    "<td>". "<button value='editprofile' style='margin-left:25%;' class='btn btn-info btn-lg' data-toggle='modal' data-target='#editprofileModal' type='button' class='btn btn-dark' >"."Edit". "</button>". "</td>".   
    "</tr></table>"; 
}
?>

<div class="modal fade" id="editprofileModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update User Name</h4>
        </div>
        <div class="modal-body">
              <?php
                echo "<form action='/project/page/account.php' method='post'>".
                 "User Name:"."<input type='text' class='form-control form-control-sm' placeholder='name' name='username'>".
                 "<input class='btn btn-dark' type='submit'> </form>"; ?>
            
        </div>
 
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>

   