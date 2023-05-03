<?php
    session_start();
    $username = $_SESSION['username'];
    require_once('mysql.php');
    $doctor="SELECT * FROM doctor WHERE doctor_email = '$username'";
    $result=mysqli_query($conn,$doctor);
    $row=mysqli_fetch_row($result);
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $position=$_POST['position'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        if($name!=$row[1]){
            $sql = "UPDATE doctor SET doctor_name='$name' WHERE doctor_email='$username'";
            $result1=mysqli_query($conn,$sql);
            if($result1){
                echo 'Success';
            }
        }
        if($gender!=$row[2]){
            $sql = "UPDATE doctor SET doctor_gender='$gender' WHERE doctor_email='$username'";
            $result1=mysqli_query($conn,$sql);
            if($result1){
                echo 'Success';
            }
        }
        if($position!=$row[3]){
            $sql = "UPDATE doctor SET doctor_position='$position' WHERE doctor_email='$username'";
            $result1=mysqli_query($conn,$sql);
            if($result1){
                echo 'Success';
            }
        }
        if($phone!=$row[4]){
            $sql = "UPDATE doctor SET doctor_phoner='$phone' WHERE doctor_email='$username'";
            $result1=mysqli_query($conn,$sql);
            if($result1){
                echo 'Success'; 
            }
        }
        if($password!=$row[6]){
            $sql = "UPDATE doctor SET doctor_password='$password' WHERE doctor_email='$username'";
            $result1=mysqli_query($conn,$sql);
            if($result1){
                echo 'Success1';
            }
        }
        if($email!=$row[5]){
            $sql = "UPDATE doctor SET doctor_email='$email' WHERE doctor_email='$username'";
            $result1=mysqli_query($conn,$sql);
            if($result1){
                echo 'Success';
            }
            $_SESSION['username']=$email;
        }
        header('refresh:0.5;url = doctor.php');
    }
?>