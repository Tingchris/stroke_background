<?php
    session_start();
    require_once('mysql.php');
    $patient="SELECT * FROM patient WHERE patient_id = '$id1'";
    $result=mysqli_query($conn,$patient);
    $row=mysqli_fetch_row($result);
    $id1=$_SESSION['id'];
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $age=$_POST['age'];
        $diagnosis=$_POST['diagnosis'];
        $phone=$_POST['phone'];
        $ecn=$_POST['ecn'];
        $source=$_POST['source'];
        $remark=$_POST['remark'];
        if($name!=$row[1]){
            $sql = "UPDATE patient SET name='$name' WHERE patient_id='$id1'";
            $result1=mysqli_query($conn,$sql);
        }
        if($gender!=$row[2]){
            $sql = "UPDATE patient SET gender='$gender' WHERE patient_id='$id1'";
            $result1=mysqli_query($conn,$sql);
        }
        if($diagnosis!=$row[3]){
            $sql = "UPDATE patient SET diagnosis='$diagnosis' WHERE patient_id='$id1'";
            $result1=mysqli_query($conn,$sql);
        }
        if($name!=$row[4]){
            $sql = "UPDATE patient SET name='$name' WHERE patient_id='$id1'";
            $result1=mysqli_query($conn,$sql);
        }
        if($phone!=$row[5]){
            $sql = "UPDATE patient SET phone='$phone' WHERE patient_id='$id1'";
            $result1=mysqli_query($conn,$sql);
        }
        if($ecn!=$row[6]){
            $sql = "UPDATE patient SET emergency_number='$ecn' WHERE patient_id='$id1'";
            $result1=mysqli_query($conn,$sql);
        }
        if($source!=$row[8]){
            $sql = "UPDATE patient SET source='$source' WHERE patient_id='$id1'";
            $result1=mysqli_query($conn,$sql);
        }
        if($remark!=$row[7]){
            $sql = "UPDATE patient SET remark='$remark' WHERE patient_id='$id1'";
            $result1=mysqli_query($conn,$sql);
        }
        if($id!=$row[0]){
            $check = "SELECT patient_id from patient WHERE patient_id='$id'";
            $result2=mysqli_query($conn,$check);
            if(mysqli_num_rows($result2)==0){
                $sql = "UPDATE patient SET patient_id='$id' WHERE patient_id='$id1'";
                $result1=mysqli_query($conn,$sql);
                if($result1){
                    $_SESSION['id']=$id;
                }
            }
            else{
                echo "The patient's id have already had";
                header('refresh:3;url = patient_edit.php');
            }   
        }
        header('refresh:3;url = patient_detail.php');
    }
?>