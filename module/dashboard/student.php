<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
session_start();

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
                <button type="button" >
                    <i></i> <?php echo $option;?>
                </button>
            </a>
        </div>
</div>


<div class="list-container">
    <?php
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
        $readSql = "SELECT * FROM machines_db";
        $result = mysqli_query($conn, $readSql);
        while($row = mysqli_fetch_array($result)) { ?>

            <div class="grid-item">
                <img style="width:145px;" src="https://storage.googleapis.com/attackdefense-public.appspot.com/cve/cve-2020/2405.png"></img>
                <div>
                    <h3 class="card-title text-truncate">
                        <?php echo $row['machine_name']; ?>
                    </h3>
                </div>
                <a href="/project/page/machine_homepage.php?name=<?php echo $row['machine_name']; ?>">
                    <button type="button" >
                    <i></i> Start</button>
                </a>
            </div>
        <?php
        }
    ?>  
</div>

</body>
</html>



