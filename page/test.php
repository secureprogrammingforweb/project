<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/azure/api/vm.php';
// $query = 'select role from rbac where username="1";';

// $machines = mysqli_fetch_array($conn->query("select * from machines_db"));
// var_dump($machines["machine_name"]);
// $command = "az vm list";
// $op = shell_exec($command);
// $data = json_decode($op,true);

// foreach ($data as $container){
//     echo ($container["containers"][0]["name"]);
//     echo ($container["ipAddress"]["fqdn"]);
// }
// print("<pre>".print_r($data,true)."</pre>");
$RG_NAME = "1-65cd8a9e-playground-sandbox";
// $StudnetName = "john";
// $query = 'SELECT time_sarted FROM running_machines where username="'.$StudnetName.'"';
// $started_time = mysqli_fetch_array($conn->query($query));
// var_dump(time() - intval($started_time));
// print(shell_exec("az vm show -d -g ".$RG_NAME." -n ".$VMNAME." --query publicIps -o tsv"));
// foreach ($data as $VM){
//     echo ("Name: ".$VM["name"]);
//     echo ("Name: ".$VM["storageProfile"]["osDisk"]["osType"]);
//     echo (shell_exec("az vm show -d -g ".$RG_NAME." -n ".$VM["name"]." --query publicIps -o tsv"));
//     echo "<br>";
// }
// create_vm("NAME1","WindowsVM","GNS",$RG_NAME,$conn);
?>
<!DOCTYPE html>

<html>

<body>



<form action="/project/page/test.php" method="post" enctype="multipart/form-data">

  Select image to upload:

  <input type="file" name="fileToUpload" id="fileToUpload">

  <input type="submit" value="Upload Image" name="submit">

</form>



</body>

</html>



<?php
$target_dir = "../uploads/";
echo $target_dir;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_FILES["fileToUpload"]) &&
        $_FILES["fileToUpload"]["error"] == 0) {
        $allowed_ext = array("jpg" => "image/jpg",
                            "jpeg" => "image/jpeg",
                            "gif" => "image/gif",
                            "png" => "image/png");
        $file_name = $_FILES["fileToUpload"]["name"];
        $file_type = $_FILES["fileToUpload"]["type"];
        $file_size = $_FILES["fileToUpload"]["size"];
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
            if (file_exists("upload/" . $_FILES["fileToUpload"]["name"])) {
                echo $_FILES["fileToUpload"]["name"]." is already exists.";
            }      
            else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
                $target_file)) {
                    echo "The file ". $_FILES["fileToUpload"]["name"].
                    " has been uploaded.";
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
        echo "Error: ". $_FILES["fileToUpload"]["error"];
    }
}
?>
</body>
</html>
?>
