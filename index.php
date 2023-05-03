<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content= "text/html; charset= uft-8">
        <title>中風復健系統平台-登入頁面</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel= "stylesheet" href="index1.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/2826cc1f0b.js" crossorigin="anonymous"></script>
        <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.3/datatables.min.css"/>
        <link rel= "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> 
        <link rel= "stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow fadeInDown ">
            <div class="container-fluid">
                <a class="navbar-brand fs-1 text-white m-2">中風復健系統平台</a>
            </div>
        </nav>

        <div class="wrapper fadeInDown2">
            <div class="form_box">
                <h2>登入畫面</h2>
                <form action="login.php" method="post">
                    <div class="input_box">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="username" required>
                        <label> 帳戶</label>
                    </div>
                    <div class="input_box" >
                        <span class="icon"><i id="eye" class="fa-solid fa-eye"></i></span>
                        <input type="password" name="password" id="password" required>
                        <label>密碼</label>
                    </div>
                    <div class="remember_forget">
                        <label><input type="checkbox">記住我</label>
                        <a href="#">忘記密碼?</a>
                    </div>
                    <button type="submit" class="button bg-primary" id="button">登入</button>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            const eye = document.querySelector("#eye");
            const password = document.querySelector("#password");

            eye.addEventListener('click',function(){
                const type = password.getAttribute('type')==='password'?'text':'password';
                password.setAttribute('type',type);
                this.classList.toggle("fa-solid fa-eye-slash");
            });
        </script>
    </body>
</html>