<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/module/conn.php';
/*
Machine name
Button to start machine
Machine Disc
*/
//session_start();
if(isset($_GET["machinename"])){
    include $_SERVER["DOCUMENT_ROOT"].'/project/page/dashboard-gui.php';

    
    ?>
    // GET machine name
    <table class="table table-striped table-hover" style="margin-left:25%;width:50%;">
    <th>Machine Name</th>
    <th>Machine URL</th>
    <th>Machine Action</th>
    <?php
    $query = "select * from machines_db where machine_name='".$_GET["machinename"]."'";
    $machine_data = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_array($machine_data)){
    echo "<tr>".
    "<td>".$row["machine_name"]. "</td>".   
    "<td>". "<a href='".$row['machine_logo_url']. "'>"."</a>". $row['machine_logo_url']."</td>".   
    "<td>". "<button class='btn btn-dark' onclick="."'____START___MACHINE'>"."Start Machine". "</button>". "</td>".
    "</tr>"; ?>
    <tr>
        <td> Machine Description:</td>
        <td colspan="2"><?php echo $row["machine_disc"]; ?> </td>

    </tr>
    <?php
    

    //echo $row["machine_name"];
    //echo "<br>Logo: ".$row['machine_logo_url'];
    // BUTTON HERE
    
    //echo "<br>Machine notes: ".$row["machine_disc"];
    }
}
?>

