<?php
    session_start();
    require_once('mysql.php');
    $account=$_SESSION['account'];
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $account=$_POST['account'];
        $coin=$_POST['coin'];
    }
    else{
        echo "<script> alert('ERROR');</script>";
        header("refresh:.1;url=web.php");
    }
    $patient = "SELECT * FROM co WHERE account='$account'";
    $query = mysqli_query($conn,$patient);
    $row = mysqli_fetch_assoc($query);
    $name = $row["name"];
    $noenough =$name.'的金幣還不夠哦!';
    $exchange = $name.'的禮物兌換成功!';
    if($coin<600){
        echo"<script> alert('$noenough');</script>";
        header("refresh:.1;url=web.php");
    }else{
        $coin=$coin-600;
        $sql="UPDATE co SET coin=$coin WHERE account='$account'";
        if($conn->query($sql)==FALSE){
            echo "<script> alert('ERROR');</script>";
            header("refresh:.1;url=web.php");
        }else{
            echo "<script> alert('$exchange');</script>";
            header("refresh:0.1;url=web.php");
        }
    }
    mysqli_close($conn);
?>