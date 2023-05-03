<?php
    session_start();
    require_once('mysql.php');
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id=$_POST['id'];
    }else{
        echo "error";
    }
    $patient = "SELECT * FROM patient WHERE patient_id = '$id' ";
    if(empty($patient)){
        echo 'ERROR';
    }else{
        $result1=mysqli_query($conn,$patient);
        foreach($result1 as $row1){
        echo $row1['patient_id'];}
    }
?>