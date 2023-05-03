<?php
    session_start();
    require_once('mysql.php');
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
            <link rel= "stylesheet" href="register1.css"> 
            <script src="https://kit.fontawesome.com/2826cc1f0b.js" crossorigin="anonymous"></script>   
        </head>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <div class="navbar">
            <img src="KM.png" alt=""class="pic1">
            <h1 style="margin-left: 100px; margin-top:10px">高雄醫學大學</h1>
        </div> 
        <div class="container">
            <h1 style="padding: 10px;">注冊帳戶</h1>
            <span style="padding: 10px 5px;">已經有帳戶了嗎?</span> <a href="index.php" class="link">登入</a>
            <form action="register_add.php" method="post">
                <table class="table table-borderless mt-3 mx-5" id="styletable">
                    <tr>
                        <th class="p-3" ><span style="margin:10px;">電子郵件地址</sapn></td>
                        <td class="content"><input type="text" name="email" class="project"> &nbsp&nbsp<span class="hint">&nbsp &nbsp &nbsp您的電子郵件即為您的使用者名稱</span></td>
                    </tr>
                    <tr>
                        <th class="p-3"><span style="margin:10px;">密碼</sapn></td>
                        <td class="content"><input type="password" name="password" class="project">&nbsp&nbsp&nbsp&nbsp&nbsp<span class="hint">&nbsp &nbsp密碼長度至少需達到6個字元</span></td>
                    </tr>
                    <tr>
                        <th class="p-3"><span style="margin:10px;">重新輸入密碼</sapn></td>
                        <td class="content"><input type="password" name="cpassword" class="project"></td>
                    </tr>
                    <tr>
                        <th class="p-3"><span style="margin:10px;">姓名</sapn></td>
                        <td class="content"><input type="text" name="name" class="project"></td>
                    </tr>
                    <tr>
                        <th class="p-3"><span style="margin:10px;">性別</sapn></td>
                        <td class="content"><input type="text" name="gender" class="project"></td>
                    </tr>
                    <tr>
                        <th class="p-3"><span style="margin:10px;">職位</sapn></td>
                        <td class="content"><input type="text" name="position" class="project"></td>
                    </tr>
                    <tr>
                        <th class="p-3"><span style="margin:10px;">電話號碼</sapn></td>
                        <td class="content"><input type="text" name="phone" class="project"></td>
                    </tr>
                </table>
                <button class="button">建立帳戶</button>
            </form>
        </div>
    </body>
</html>