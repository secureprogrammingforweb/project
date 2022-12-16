<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
?>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
/*
Table
 -----------------------------
|Name|Repo_URL|FileUpload|Disc|
 -----------------------------
BOX | Box | button | Box |
[Add button] 
 */
$target_dir = "../../uploads/";
if ($_SERVER['REQUEST_METHOD'] === 'POST')
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
$query = "insert into machines_db(machine_name, machine_url, machine_disc, machine_logo_url) values('".$_POST["name"]."','".$_POST["repo_url"]."','http://localhost/project/uploads".$_FILES["logo"]["name"]."','".$_POST["disc"]."');";
mysqli_query($conn, $query);
}// SRIKAR test
?>


