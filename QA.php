<?php
    session_start();
    require_once('mysql.php');
    $username=$_SESSION["username"];
    $doctor="SELECT * FROM doctor WHERE doctor_email = '$username'";
    $result=mysqli_query($conn,$doctor);
    $row=mysqli_fetch_row($result);
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id=$_POST['id'];
    }else{
        echo "error";
    }
    $patient = "SELECT * FROM patient WHERE patient_id = '$id'";
    $result1=mysqli_query($conn,$patient);
    $row1=mysqli_fetch_assoc($result1);
    $QA= "SELECT * FROM QA WHERE pid = '$id'";
    $result2=mysqli_query($conn,$QA);
?>

<!DOCTYPE html>
<html>
    </div>
    <head>
        <head>
            <meta http-equiv="Content-Type" content= "text/html; charset= uft-8">
            <title>WEB test</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <link rel= "stylesheet" href="QA1.css"> 
            <script src="https://kit.fontawesome.com/2826cc1f0b.js" crossorigin="anonymous"></script>   
        </head>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        
        <div class="navbar">
            <img src="KM.png" alt=""class="pic1">
            <h1 style="margin-left: 100px; margin-top:10px">高雄醫學大學</h1>
            <div class="dropdown" id="person">
                <button id="userbn" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="flase">
                    <i class="fa-solid fa-user" id="user"></i>    
                    <span style="font-size: 24px;" id="doctorname"><?php echo " ".$row[1]?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">修改個人資料</a></li>
                    <li><a class="dropdown-item" href="logout.php">登出</a></li>
                </ul>
            </div>
        </div>
        <div class="container text-break" id="new">
            <div class="h2 border-bottom border-gray py-2 px-4 text-center">
                問題
            </div>
            <br>
            <?php
                foreach($result2 as $row2){
            ?>
            <div class="dropdown">
                <a class="btn btn-light btn-secondary dropdown-toggle text-wrap m-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="flase">
                    Q: <?php echo $row2['question'];?>
                </a>
                <ul class="dropdown-menu p-3">
                    <li> <p>A:</p><input type="text" name="answer" class="answer"></li>
                </ul>
            </div>
            <?php
                }
            ?>
        </div>
        
    </body>
</html>