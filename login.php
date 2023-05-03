<?php
    require_once('mysql.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if($username==null||$password==null){
            echo"<script type='text/javascript'> alert('您的使用者名稱欄或密碼欄尚未填寫');</script>";
            header('refresh:0.1;url = index.php');
        }
        else{
            $sql="SELECT * FROM doctor WHERE username = '$username'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==1 && $password == mysqli_fetch_assoc($result)["password"]){
                session_start();
                $_SESSION["username"]=$username;
                header('refresh:0.1;url = web.php');  
            }else{
                echo"The username or password is incorrect!";
                header('refresh:3;url = index.php');
            }
        }
    }
    else{
        echo "Something wrong";
        header('refresh:3;url = index.php');
    }
    mysqli_close($conn);
?>