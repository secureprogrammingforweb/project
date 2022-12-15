<?php
/*
Table
 -----------------------------
|Name|Repo_URL|FileUpload|Disc|
 -----------------------------
BOX | Box | button | Box |
[Add button] 
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST')
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["logo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["logo"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>
<form action="/project/page/popups/addmachine.php" method="post">
Name: <input type="text" name="name"><br>
Repo_URL: <input type="text" name="repo_url"><br>
Logo: <input type="file" name="logo"><br>
Disc: <input type="text" name="disc"><br>
<input type="submit">
</form>
