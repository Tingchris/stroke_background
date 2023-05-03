<?php
    session_start();
    require_once('mysql.php');
    $username=$_SESSION["username"];
    $doctor="SELECT * FROM doctor WHERE doctor_email = '$username'";
    $result=mysqli_query($conn,$doctor);
    $row=mysqli_fetch_assoc($result);
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
            <link rel= "stylesheet" href="doctor1.css"> 
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
                    <span style="font-size: 24px;" id="doctorname"><?php echo " ".$row['doctor_name']?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">修改個人資料</a></li>
                    <li><a class="dropdown-item" href="logout.php">登出</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="px-2">
                <h1>我的個人資料</h1>
            </div>
                <hr>
                <table class="mt-2 mx-4">
                    <tr>
                        <th class="p-2 m-4 fs-4"><span>姓名</span></th>
                        <td><input class="inputfield" type="text" name="name" value="<?php echo $row['doctor_name'];?>"></td>
                    </tr>
                    <tr>
                        <th class="p-2 m-4 fs-4"><span>性別</span></th>
                        <td><input class="inputfield" type="text" name="gender" value="<?php echo $row['doctor_gender'];?>"></td>
                    </tr>
                    <tr>
                        <th class="p-2 m-4 fs-4"><span>職位</span></th>
                        <td><input class="inputfield" type="text" name="position" value="<?php echo $row['doctor_position'];?>"></td>
                    </tr>
                    <tr>
                        <th class="p-2 m-4 fs-4"><span>電話號碼</span></th>
                        <td><input class="inputfield" type="text" name="phone" value="<?php echo $row['doctor_phone'];?>"></td>
                    </tr>
                    <tr>
                        <th class="p-2 m-4 fs-4"><span>使用者名稱/電子郵件</span></th>
                        <td class="fs-5"><input class="inputfield" type="text" name="email" value="<?php echo $row['doctor_email'];?>"></td>
                    </tr>
                </table>
            <div class="px-2 mt-5">
                <h1>修改密碼</h1>
            </div>
                <hr>
                <table class="mt-2 mx-4">
                    <tr>
                        <th class="p-2 m-4 fs-4"><span>密碼</span></th>
                        <td class="fs-5"><input class="inputfield" type="password" name="password" value="<?php echo $row['doctor_password'];?>" ><i class="fa-solid fa-eye mx-2"></i></td>
                    </tr>
                    <tr>
                        <th class="p-2 m-4 fs-4"><span>再次確認密碼</span></th>
                        <td class="fs-5"><input class="inputfield" type="password" name="password" value="<?php echo $row['doctor_password'];?>" ><i class="fa-solid fa-eye mx-2"></i></td>
                    </tr>
                </table>  
        </div>
    </body>
</html>