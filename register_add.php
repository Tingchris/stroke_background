<?php
    require_once("mysql.php");
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $position=$_POST['position'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $passwordlength=strlen($password);
        $check = "SELECT * FROM doctor WHERE doctor_email='$email'";
        if($name==null||$gender==null||$position==null||$phone==null||$email==null||$password==null||$password==null){
            echo "<script type='text/javascript'>alert('您還有尚未填寫的選項');</script>";
            header("refresh:0.5;url=register.php");
        }
        else{
            if (mysqli_num_rows(mysqli_query($conn,$check))==0){
                if($password==$cpassword){
                    if($passwordlength>=6){
                        $sql = "INSERT INTO doctor (doctor_id,doctor_name,doctor_gender,doctor_position,doctor_phone,doctor_email,doctor_password)
                        VALUES(NULL,'$name','$gender','$position','$phone','$email','$password')";
                        if(mysqli_query($conn,$sql)){
                            echo " <script type='text/javascript'>alert('注冊成功');</script>";
                            header("refresh:0.5;url=index.php");
                            exit;
                        }
                        else{
                            echo "Error creating table" . mysqli_error($conn);
                            header("refresh:0.5;url=index.php");
                        }
                    }
                    else{
                        echo "<script type='text/javascript'>alert('Your password are not long enough!');</script>";
                        header("refresh:0.5;url=register.php");
                    }
                }
                else{
                    echo "<script type='text/javascript'>alert('Your password and check password are not same!');</script>";
                    header("refresh:0.5;url=register.php");
                }
            }
            else{
                echo "This account have already been used!"."<br>";
                echo "<a href= 'register.php'> Back to Register Page</a>"."<br>";
                exit;
            }
        }
    }
    mysqli_close($conn);
?>