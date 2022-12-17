<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
/*
Table
 -----------------------------
|Name|Repo_URL|FileUpload|Disc|
 -----------------------------
BOX | Box | button | Box |
[Add button] 
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$target_dir = "../../uploads/";
echo $target_dir;
$target_file = $target_dir . basename($_FILES["logo"]["name"]);
$uploadOk = 1;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_FILES["logo"]) &&
        $_FILES["logo"]["error"] == 0) {
        $allowed_ext = array("jpg" => "image/jpg",
                            "jpeg" => "image/jpeg",
                            "gif" => "image/gif",
                            "png" => "image/png");
        $file_name = $_FILES["logo"]["name"];
        $file_type = $_FILES["logo"]["type"];
        $file_size = $_FILES["logo"]["size"];
        // Verify file extension
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed_ext)) {
            die("Error: Please select a valid file format.");
        }
        // Verify file size - 2MB max
        $maxsize = 2 * 1024 * 1024;
        if ($file_size > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }                  
        // Verify MYME type of the file
        if (in_array($file_type, $allowed_ext))
        {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $_FILES["logo"]["name"])) {
                echo $_FILES["logo"]["name"]." is already exists.";
            }      
            else {
                if (move_uploaded_file($_FILES["logo"]["tmp_name"],
                $target_file)) {
                    #echo "The file ". $_FILES["logo"]["name"]." has been uploaded.";
                }
                else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        else {
            echo "Error: Please try again.";
        }
    }
    else {
        echo "Error: ". $_FILES["logo"]["error"];
    }

}
$query = " machines_db values('".$_POST["name"]."','".$_POST["repo_url"]."','http://localhost/project/uploads".$_FILES["logo"]["name"]."','".$_POST["disc"]."');";
// SRIKAR
}

$query = "select * from machines_db where machine_name='"."dvwa"."';";
//$machine = mysqli_fetch_array(mysqli_query($conn, $query));
$machine = mysqli_fetch_array(mysqli_query($conn, $query))
    print_r $machine; 
    $machine = $machine[0];
?>
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
              <?php

                
                echo "<form action='/project/page/dashboard.php method='post'>".
                 "Machine Name:"."<input type='text' class='form-control form-control-sm' placeholder='name' name='machinename' value='" . $machine["machine_name"]."'>".
                "Repo URL:"."<input type='text' class='form-control form-control-sm' placeholder='repo url' name='repo_url' value='".$machine['machine_url']."'>".
                "Desc:"."<textarea type='text' class='form-control form-control-sm' placeholder='desc' name='desc' value='".$machine['machine_disc']."'></textarea>".
                "<input class='btn btn-dark' type='submit> </form>"; ?>
            
        </div>
 
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>
<?php  ?>














