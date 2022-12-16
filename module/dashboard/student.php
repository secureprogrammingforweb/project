<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';

function getLastRunOrRunning($conn){
    $query = 'SELECT time FROM running_machines where user="'.$_SESSION['name'].'"';
    $abcd = $conn->query($query);
    $time = mysqli_fetch_array($conn->query($query));
    // 3600
    if (time() - intval($time["time"]) > 3600){
        return true;
    }
    else {
        return false;
    }
}
if (isset($_SESSION['name'])){
}

else{
    header("Location: http://localhost/project/page/login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
.last-played-container {
  display: grid;
  grid-template-columns: auto;
  padding: 10px;
}
.list-container {
  display: grid;
  grid-template-columns: auto auto auto;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
a {
    color: #346cb0;
    text-decoration: none;
    background-color: transparent;
}
</style>
</head>
<body>
<?php
// Check if machine is running or last run machine
if (getLastRunOrRunning($conn)){
        $option = "Start machine";
    }
else {
        $option = "Re-run machine";
}
?>
<div class="last-played-container">

        <div class="grid-item">
            <img style="width:145px;" src="https://storage.googleapis.com/attackdefense-public.appspot.com/cve/cve-2020/2405.png"></img>
            <div>
                <h3>
                    <?php echo "Last played" ?>
                </h3>
            </div>
            <a href="/project/page/machine_homepage.php?name=lastplayedmachine">
                <button type="button" class='btn btn-dark' >
                    <i></i> <?php echo $option;?>
                </button>
            </a>
        </div>
</div>


    <?php
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
        $readSql = "SELECT * FROM machines_db";
        $result = mysqli_query($conn, $readSql); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <table class="table table-striped table-hover" style="margin-left:25%;width:50%;">
        <?php while($row = mysqli_fetch_array($result)) { 

            echo "<tr>".
            "<td>" . "<div><img style='width:145px;'" . "src="."'https://cdn-icons-png.flaticon.com/512/59/59505.png'></img>"
            .$row["machine_name"].
            "</div></td>".
            "<td>". "<a href=". "'/project/page/machine_homepage.php?name='".$row['machine_name'] . "'>".
                "<button class='btn btn-dark' type=". "button". ">".
                "<i></i> Start</button>".
                "</a>". "</td>".   
            "</tr>"; }?>
        </table>




</body>
</html>



