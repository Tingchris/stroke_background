<?php
    session_start();
    require('mysql.php');
    $username=$_SESSION["username"];
    $datas=array();
    $patient = "SELECT * FROM co";
    $result1=mysqli_query($conn,$patient);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <head>
            <meta http-equiv="Content-Type" content= "charset= utf-8">
            <title>中風復健系統平台-查詢頁面</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <link rel= "stylesheet" href="web1.css">
            <link rel= "stylesheet" type="text/css" href="style.php"> 
            <script src="https://kit.fontawesome.com/2826cc1f0b.js" crossorigin="anonymous"></script>
            <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.3/datatables.min.css"/>
            <link rel= "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> 
            <link rel= "stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
        </head>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow fadeInDown ">
            <div class="container-fluid ">

                <a class="title navbar-brand text-white ms-2 " href="web.php"><h1>中風復健系統平台</h1></a>

                <!--<div class="collapse navbar-collapse ">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="navitem nav-link fs-4 text-white" aria-current="page" href="web.php">查詢頁面</a>
                        </li>
                        <li class="nav-item">
                            <a class="navitem nav-link fs-4 text-white" href="#">管理通知</a>
                        </li>
                    </ui>
                </div>-->

            </div>
        </nav>

        <div class="container-fluid fadeInDown2 p-4">
            <div class="card">
                <div class="card-header">
                    <label class="fs-3">患者查詢</label>
                </div>
                <div class="card-body mt-2">
                    <div class="container">
                        <table id="datatable" class="table table-bordered text-center" >
                            <thead >
                                <th class="text-center" style="width: 150px;"><span>SNo.</span></th>
                                <th class="text-center" style="width: 150px;"><span>病人姓名</span></th>
                                <th class="text-center" style="width: 150px;"><span>病人資料</span></th>
                                <th class="text-center" style="width: 300px;"><span>金幣數量</span></th>
                                <th class="text-center"><span>最近一次動作</span></th>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($result1 as $row){
                                        $account =$row['account'];
                                        $action="SELECT * FROM `action` WHERE account='$account' ORDER BY `time` DESC";
                                        $query=mysqli_query($conn,$action);
                                        $row1=mysqli_fetch_row($query);
                                ?>
                                <tr>
                                    <td class="align-middle "><?php echo $row['account'];?></td>
                                    <td class="align-middle "><?php echo $row['name'];?></td>
                                    <td class="align-middle">
                                        <form action="patient_detail.php" method="post">
                                            <input type="hidden" name="account" value="<?php echo $row['account']?>">
                                            <button class="btn">
                                                <i class="fa-sharp fa-solid fa-table-list fs-4"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="align-middle" >
                                        <div class="progress"  style="height: 30px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: <?php echo $row['coin']*100/500,'%'; ?>;" aria-valuemin="0" aria-valuemax="500" aria-valuenow="<?php echo $row['coin'];?>"></div>
                                        </div>
                                        <form action="coinreset.php" method="post">
                                            <input type="hidden" class="account" name="account" value="<?php echo $row['account'];?>">
                                            <input type="hidden" class="coinvalue" name="coin" value="<?php echo $row['coin']?>">
                                            <span class="fs-5 text-secondary "><?php echo  '目前累積:'.$row['coin'].'個'?></span>
                                                <?php
                                                    if($row['coin']>=500){
                                                ?>
                                                <button class="wobble" style="border:none; outline:none; background:transparent" >
                                                    <i class="fs-5 fa-solid fa-gift" style="color: #0080FF" ></i>
                                                </button>
                                                <?php
                                                    }else{
                                                ?>
                                                    <i class="fs-5 px-1 fa-solid fa-gift" style="color: gray" ></i>
                                                <?php
                                                    }
                                                ?>
                                        </form>
                                    </td>
                                    <td class="align-middle">
                                        <?php echo $row1[1].' '.$row1[2].$row1[3].' '.$row1[4];?>
                                    </td>
                                </tr>
                                <?php            
                                    }
                                ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                $('#datatable').DataTable({
                    language: {
                        "lengthMenu": "顯示 _MENU_ 筆資料",
                        "sProcessing": "處理中...",
                        "sZeroRecords": "没有匹配结果",
                        "sInfo": "目前有 _MAX_ 筆資料",
                        "sInfoEmpty": "目前共有 0 筆紀錄",
                        "sInfoFiltered": " ",
                        "sInfoPostFix": "",
                        "sSearch": "搜尋:",
                        "sUrl": "",
                        "sEmptyTable": "尚未有資料紀錄存在",
                        "sLoadingRecords": "載入資料中...",
                        "sInfoThousands": ",",
                        "oPaginate": {
                            "sFirst": "首頁",
                            "sPrevious": "上一頁",
                            "sNext": "下一頁",
                            "sLast": "末頁"
                        },
                        "order": [[0, "desc"]],
                        "oAria": {
                            "sSortAscending": ": 以升序排列此列",
                            "sSortDescending": ": 以降序排列此列"
                        }
                    },
                });
            });
        </script>
    </body>
</html>