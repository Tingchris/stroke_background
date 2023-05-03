<?php
    session_start();
    require_once('mysql.php');
    $username=$_SESSION["username"];
    $doctor="SELECT * FROM doctor WHERE doctor_email = '$username'";
    $result=mysqli_query($conn,$doctor);
    $row=mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html>
    </div>
    <head>
        <head>
            <meta http-equiv="Content-Type" content= "text/html; charset= uft-8">
            <title>WEB test</title>
            <link rel= "stylesheet" href="doctor_edit.css"> 
        </head>
    </head>
    <body>  
    <div class="a">
            <h1>edit information</h1>
            <form method="POST" action="doctor_edit1.php">
                <h3>Name <input type="text" name="name" value="<?=$row[1]?>"></h3>
                <h3>Gender <input type="text" name="gender" value="<?=$row[2]?>"></h3>
                <h3>Position <input type="text" name="position" value="<?=$row[3]?>"></h3>
                <h3>Phone <input type="text" name="phone" value="<?=$row[4]?>"></h3>
                <h3>E-mail<input type="text" name="email" value="<?=$row[5]?>"></h3>
                <h3>Password <input type="text" name="password" value="<?=$row[6]?>"></h3>
                <button type="submit"> Enter</button>
            </form>
    </body>
</html>