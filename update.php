<?php
    session_start();
    require_once('mysql.php');
    $account=$_SESSION['account'];
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $account=$_POST['account'];
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $birthday=$_POST['birthday'];
        $age=$_POST['age'];
        $diagnosis=$_POST['diagnosis'];
        $affectedside=$_POST['affectedside'];
        $phone=$_POST['phone'];
        $urgenname=$_POST['urgenname'];
        $urgenphone=$_POST['urgenphone'];
        $joindate=$_POST['joindate'];
        $coin=$_POST['coin'];
    }
    else{
        echo 'ERROR';
        header("refresh:3;url=patient_detail.php");
    }
    $sql="UPDATE co SET name='$name',gender='$gender',age='$age',birthday='$birthday',joindate='$joindate', diagnosis='$diagnosis', affectedside='$affectedside', phone='$phone', urgenname='$urgenname', urgenphone='$urgenphone', coin=$coin WHERE account='$account'";
    if($conn->query($sql)==FALSE){
        echo 'ERROR';
        header("refresh:3;url=patient_detail.php");
    }else{
        header("refresh:0.1;url=patient_detail.php");
    }
    mysqli_close($conn);
?>