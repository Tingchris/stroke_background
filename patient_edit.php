<?php
    session_start();
    require_once('mysql.php');
    $id=$_SESSION['id'];
    $patient = "SELECT * FROM patient WHERE patient_id = '$id'";
    $result1=mysqli_query($conn,$patient);
    $row=mysqli_fetch_row($result1);
?>

<!DOCTYPE html>
<html>
    </div>
    <head>
        <head>
            <meta http-equiv="Content-Type" content= "text/html; charset= uft-8">
            <title>WEB test</title>
            <link rel= "stylesheet" href="patient_edit.css">    
        </head>
    </head>
    <body>
        <div class="a">
            <div class="d">
                <img src="KM.png" alt=""class="pic1"><br>
            </div>
            <div class="c">
                <span style="font-size: 24px;">Kaohsiung Medical University </span><br>
                <span style="font-size: 24px;">Chung-Ho Memorial Hospital</span>
            </div>
            <div class="e">
                <div class="doctor" onclick="location.href='doctor.php'">Personal information</div>
                <div class="questionnaire" onclick="location.href='questionnaire.php'">Questionnaire</div>
                <div class="issue" >Web issue</div>
                <div class="logout" onclick="location.href='logout.php'">Logout</div>
            </div>
        </div>
        <h1>edit information</h1>
        <div class="b">
                <form method="POST" action="patient_edit1.php">
                   ID <br><input type="text" name="id" value="<?=$row[0]?>" class="f"><br>
                    Name <br><input type="text" name="name" value="<?=$row[1]?>" class="f"><br>
                    Gender <br><input type="text" name="gender" value="<?=$row[2]?>" class="f"><br>
                    Age <br><input type="text" name="phone" value="<?=$row[3]?>" class="f"><br>
                    Diagnosis <br><input type="text" name="diagnosis" value="<?=$row[4]?>" class="f"><br>
                    Phone numbers <br><input type="text" name="phone" value="<?=$row[5]?>" class="f"><br>
                    Emergency contact number <br><input type="text" name="ecn" value="<?=$row[6]?>" class="f"><br>
                    Source <br><input type="text" name="source" value="<?=$row[8]?>" class="f"><br>
                    Remark <br><input type="text" name="remark" value="<?=$row[7]?>" class="f"><br><br>
                    <button type="submit" style="background-color: #8b4b00; border: 1px soild #000;
                     width: 80px;height: 40px;color: #FAFAFA;
                     font-family:Arial, Helvetica, sans-serif;font-size: 24px;margin-left: 210px;"> Enter</button>
                </form>
        </div>
        <div class="back" onclick="location.href='web.php'">
                Back
            </div>
    </body>
</html>