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

$query = "select * from machines_db where machine_name='".$_GET['machine_name']."';";
$machine = mysqli_fetch_array(mysqli_query($conn, $query));
?>

<form action="/project/page/popups/updatekmachine.php" method="post" enctype="multipart/form-data">
Name: <input type="text" name="name" value=<?php echo $machine["machine_name"];?>><br>
Repo_URL: <input type="text" name="repo_url" <?php echo $machine['machine_url'];?>><br>
Logo: <input type="file" name="logo" id="logo"><br>
Disc: <input type="text" name="disc" <?php echo $machine['machine_disc'];?>><br>
<input type="submit">
</form>
