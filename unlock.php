<?php
    session_start();
    require_once('mysql.php');
    $id=$_SESSION['account'];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $parts=$_POST['parts'];
    }
    $unlock="UPDATE `lock` SET `state`='unlock' WHERE `pid` = '$id' AND parts='$parts'";
    $query=mysqli_query($conn,$unlock);
    mysqli_close($conn);
    header("refresh:0.1;url=patient_detail.php");
?>