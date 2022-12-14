<?php
// include $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
session_start();
if (isset($_SESSION['name'])){
    #echo ("Welcome ".$_SESSION['name']);
    if ($_SESSION['name'] == "admin"){
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/dashboard/admin.php';
    }
    if ($_SESSION['name'] == "contributer"){
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/dashboard/contrbuter.php';
    }
    if ($_SESSION['name'] == "student"){
        include $_SERVER["DOCUMENT_ROOT"].'/project/module/dashboard/student.php';
    }
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
                    <i></i> Start
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
                        <?php echo $row['machinename']; ?>
                    </h3>
                </div>
                <a href="/project/page/machine_homepage.php?name=<?php echo $row['machinename']; ?>">
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



