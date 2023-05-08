<?php
    session_start();
    require_once('mysql.php');
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $account=$_POST['account'];
        $_SESSION['account']=$account;
    }elseif($_SESSION['account']!=null){
        $account=$_SESSION['account'];
    }
    else{
        echo "Error";
    }
    $patient = "SELECT * FROM co WHERE account = '$account'";
    $result=mysqli_query($conn,$patient);
    $row=mysqli_fetch_assoc($result);

    $action1="SELECT * FROM action WHERE account = '$account' AND degree='初階' AND parts='上肢' ORDER BY time DESC";
    $query1=mysqli_query($conn,$action1);

    $action2="SELECT * FROM action WHERE account = '$account' AND degree='初階' AND parts='下肢'";
    $query2=mysqli_query($conn,$action2);

    $action3="SELECT * FROM action WHERE account = '$account' AND degree='進階' AND parts='上肢'";
    $query3=mysqli_query($conn,$action3);

    $action4="SELECT * FROM action WHERE account = '$account' AND degree='初階' AND parts='口腔'";
    $query4=mysqli_query($conn,$action4);

    $action5="SELECT * FROM action WHERE account = '$account' AND degree='進階' AND parts='下肢'";
    $query5=mysqli_query($conn,$action5);

    $lock="SELECT * FROM `lock` WHERE `pid` ='$account' AND parts='上肢'" ;
    $querylock=mysqli_query($conn,$lock);
    $rowlock=mysqli_fetch_assoc($querylock);

    $lock2="SELECT * FROM `lock` WHERE `pid` ='$account' AND parts='下肢'";
    $querylock2=mysqli_query($conn,$lock2);
    $rowlock2=mysqli_fetch_assoc($querylock2);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content= "text/html; charset= uft-8">
        <title>中風復健系統平台-病人資料</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel= "stylesheet" href="patient_detail1.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2826cc1f0b.js" crossorigin="anonymous"></script> 
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow fadeInDown ">
            <div class="container-fluid ">

                <a class="title navbar-brand text-white ms-2 " href="web.php"><h1>中風復健系統平台</h1></a>

                <!--<div class="collapse navbar-collapse ">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="navitem nav-link fs-4 text-white " aria-current="page" href="web.php">查詢頁面</a>
                        </li>
                        <li class="nav-item">
                            <a class="navitem nav-link fs-4 text-white" href="#">管理通知</a>
                        </li>
                    </ui>
                </div>-->

            </div>
        </nav>

        <div class="modal fade" id="unlockup" data-bs-backdrop="static" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center" >
                        <div class="fs-4 m-4">
                            您是否確定要解鎖上肢進階訓練?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="unlock.php" method="post">
                            <input type="hidden" name="parts" value="<?php echo $rowlock['parts']?>">
                            <button type="button" class="btn bg-danger text-white" data-bs-dismiss="modal">取消</button>
                            <button class="btn bg-primary text-white">確認</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="lockup" data-bs-backdrop="static"   >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="fs-4 m-4">
                            您是否確定要上鎖上肢進階訓練?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="lock.php" method="post">
                            <input type="hidden" name="parts" value="<?php echo $rowlock['parts']?>">
                            <button type="button" class="btn bg-danger text-white " data-bs-dismiss="modal">取消</button>
                            <button class="btn bg-primary text-white ">確認</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="unlockdown" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center" >
                        <div class="fs-4 m-4">
                            您是否確定要解鎖下肢進階訓練?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="unlock.php" method="post">
                            <input type="hidden" name="parts" value="<?php echo $rowlock2['parts']?>">
                            <button type="button" class="btn bg-danger text-white" data-bs-dismiss="modal">取消</button>
                            <button class="btn bg-primary text-white">確認</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="lockdown" data-bs-backdrop="static" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="fs-4 m-4">
                            您是否確定要上鎖下肢進階訓練?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="lock.php" method="post">
                            <input type="hidden" name="parts" value="<?php echo $rowlock2['parts']?>">
                            <button type="button" class="btn bg-danger text-white " data-bs-dismiss="modal">取消</button>
                            <button class="btn bg-primary text-white ">確認</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="fs-2 " >修改資料</span>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body ">
                        <form action="update.php" name="update" method="post">                        
                            <div class="editcontainer">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th class="text-end align-middle border-0">個案編號</th>
                                            <td class="border-0" ><input type="text" name="account" value="<?php echo $row['account']?>" class="editinput"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">姓名</th>
                                            <td class="border-0"> <input type="text" name="name" value="<?php echo $row['name']?>" class="editinput"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">性別</th>
                                            <td class="border-0"><input type="text" name="gender" value="<?php echo $row['gender']?>" class="editinput "></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">生日</th>
                                            <td class="border-0"><input type="text" name="birthday" value="<?php echo $row['birthday']?>" class="editinput"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">年齡</th>
                                            <td class="border-0"><input type="text" name="age" value="<?php echo $row['age']?>" class="editinput"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">診斷</th>
                                            <td class="border-0"><input type="text" name="diagnosis" value="<?php echo $row['diagnosis']?>" class="editinput"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">患側</th>
                                            <td class="border-0"><input type="text" name="affectedside" value="<?php echo $row['affectedside']?>" class="editinput"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">聯絡電話</th>
                                            <td class="border-0" ><input type="text" name="phone" value="<?php echo $row['phone']?>" class="editinput"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">緊急聯絡人</th>
                                            <td class="border-0" ><input type="text" name="urgenname" value="<?php echo $row['urgenname']?>" class="editinput"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">緊急聯絡人電話</th>
                                            <td class="border-0" ><input type="text" name="urgenphone" value="<?php echo $row['urgenphone']?>" class="editinput"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">加入日期</th>
                                            <td class="border-0"><input type="text" name="joindate" value="<?php echo $row['joindate']?>" class="editinput"></td>
                                        </tr>
                                        <tr>
                                            <th class="text-end align-middle border-0">累積金幣</th>
                                            <td class="border-0"><input type="text" name="coin" value="<?php echo $row['coin']?>" class="editinput"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-danger text-white" data-bs-dismiss="modal">取消</button>
                        <a type="button" href="javascript:document.update.submit();" class="btn bg-info text-white">保存</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid p-4" id="wrapper">
            <div class="row ">
                <div class="col-1"></div>
                <div class="col-5">
                    <div class="card fadeInDown2 ">
                        <div class="card-header d-flex align-items-center ">
                            <label class=" fs-2">病人資料</label>
                            <div class="btn_pos">
                                <form action="export.php" method="post">
                                    <input type="hidden" name="account" value="<?php echo $row['account']?>">
                                    <button style="margin-right: 10px;" class="btn  btn-success ">
                                        <span class="text-white fs-5">匯出</span>
                                    </button>
                                </form>
                                <a style="margin-right: 10px;" type="button" class="btn  btn-info " data-bs-toggle="modal" data-bs-target="#edit">
                                    <span class="text-white fs-5">編輯</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <div class="container" >
                                <table id="ptb" class="table">
                                    <tbody>
                                        <tr>
                                            <th class="fs-5 ">個案編號</th>
                                            <td class="fs-5 "><?php echo $row['account']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5  ">姓名</th>
                                            <td class="fs-5  "><?php echo $row['name']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5 ">性別</th>
                                            <td class="fs-5 "><?php echo $row['gender']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5 ">生日</th>
                                            <td class="fs-5 "><?php echo $row['birthday']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5 ">年齡</th>
                                            <td class="fs-5 "><?php echo $row['age']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5 ">診斷</th>
                                            <td class="fs-5 "><?php echo $row['diagnosis']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5 ">患側</th>
                                            <td class="fs-5 "><?php echo $row['affectedside']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5 ">聯絡電話</th>
                                            <td class="fs-5 "><?php echo $row['phone']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5 ">緊急聯絡人</th>
                                            <td class="fs-5 "><?php echo $row['urgenname']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5 ">緊急聯絡人電話</th>
                                            <td class="fs-5 "><?php echo $row['urgenphone']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5 ">加入日期</th>
                                            <td class="fs-5 "><?php echo $row['joindate']?></td>
                                        </tr>
                                        <tr>
                                            <th class="fs-5 ">累積金幣</th>
                                            <td class="fs-5 "><?php echo $row['coin']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 ">
                    <div class="row-12">
                        <div class="card fadeInDown3">
                        <div class="card-header d-flex align-items-center">
                                <label class="fs-2">上肢訓練</label>
                                <?php
                                    if($rowlock['state']=='unlock'){
                                ?>
                                <a style="margin-right: 10px;" type="button" class="btn align-middle btn-warning position-absolute end-0" 
                                data-bs-toggle="modal" data-bs-target="#lockup">
                                    <span class="fs-5">
                                        <?php
                                            echo '已解鎖';
                                        ?>
                                    </span>
                                </a>
                                <?php
                                    }elseif($rowlock['state']=='lock'){
                                ?>
                                <a  style="margin-right: 10px;" type="button" class="btn align-middle btn-warning position-absolute end-0" 
                                data-bs-toggle="modal" data-bs-target="#unlockup">
                                    <span class="fs-5">
                                        <?php
                                            echo '解鎖進階動作';
                                        ?>
                                    </span>
                                </a>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item1 nav-item border-3 fs-5"><button class="nav-link" onclick="btn1()">初階訓練</button></li>
                                    <li class=" nav-item border-3 fs-5"><button class="nav-link" onclick="btn2()">進階訓練</button></li>
                                </ul>
                                <div id="show1" class=" record">
                                    <div class="d-flex justify-content-center" style="height: 300px; overflow: auto">
                                        <ul class="list-group list-group-flush " >
                                            <?php
                                                while($row1=mysqli_fetch_assoc($query1)){
                                            ?>
                                            <li class="list-group-item text-center fs-5">
                                                <span><?php echo '於 '.$row1['time'].' 完成 '.$row1['action'].' 的動作' ; ?></span>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div id="show2" style="display: none;">
                                    <div class="record card-body d-flex justify-content-center" style="height: 300px; overflow: auto ">
                                        <ul class="list-group list-group-flush " >
                                            <?php
                                                while($row3=mysqli_fetch_assoc($query3)){
                                            ?>
                                            <li class="list-group-item text-center fs-5">
                                                <span><?php echo '於 '.$row3['time'].' 完成 '.$row3['action'].' 的動作' ; ?></span>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function btn1(){
                                document.getElementById('show1').style.display ='block';
                                document.getElementById('show2').style.display ='none';
                            }
                            function btn2(){
                                document.getElementById('show1').style.display ='none';
                                document.getElementById('show2').style.display ='block';
                            }
                            function btn3(){
                                document.getElementById('show3').style.display ='block';
                                document.getElementById('show4').style.display ='none';
                            }
                            function btn4(){
                                document.getElementById('show3').style.display ='none';
                                document.getElementById('show4').style.display ='block';
                            }
                        </script>
                        <div class="card mt-4 fadeInDown4">
                            <div class="card-header d-flex align-items-center">
                                <label class="fs-2">下肢訓練</label>
                                <?php
                                    if($rowlock2['state']=='unlock'){
                                ?>
                                <a style="margin-right: 10px;" type="button" class="btn align-middle btn-warning position-absolute end-0" 
                                data-bs-toggle="modal" data-bs-target="#lockdown">
                                    <span class="fs-5">
                                        <?php
                                            echo '已解鎖';
                                        ?>
                                    </span>
                                </a>
                                <?php
                                    }elseif($rowlock2['state']=='lock'){
                                ?>
                                <a  style="margin-right: 10px;" type="button" class="btn align-middle btn-warning position-absolute end-0" 
                                data-bs-toggle="modal" data-bs-target="#unlockdown">
                                    <span class="fs-5">
                                        <?php
                                            echo '解鎖進階動作';
                                        ?>
                                    </span>
                                </a>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item1 nav-item border-3 fs-5"><button class="nav-link" onclick="btn3()">初階訓練</button></li>
                                    <li class="nav-item border-3 fs-5"><button class="nav-link" onclick="btn4()">進階訓練</button></li>
                                </ul>
                                <div id="show3" class="record">
                                    <div class=" d-flex justify-content-center" style="height: 300px; overflow: auto">
                                        <ul class="list-group list-group-flush " >
                                            <?php
                                                while($row2=mysqli_fetch_assoc($query2)){
                                            ?>
                                            <li class="list-group-item text-center fs-5">
                                                <span><?php echo '於 '.$row2['time'].' 完成 '.$row2['action'].' 的動作' ; ?></span>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div id="show4" class="record" style="display: none;">
                                    <div class=" d-flex justify-content-center" style="height: 300px; overflow: auto ">
                                        <ul class="list-group list-group-flush " >
                                            <?php
                                                while($row5=mysqli_fetch_assoc($query5)){
                                            ?>
                                            <li class="list-group-item text-center fs-5">
                                                <span><?php echo '於 '.$row5['time'].' 完成 '.$row5['action'].' 的動作' ; ?></span>
                                            </li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card my-4">
                            <div class="card-header d-flex align-items-center">
                                <label class="fs-2 align-middle">吞嚥訓練</label>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="card ">
                                            <div class="card-body d-flex justify-content-center " style="height:300px; overflow: auto;" tabindex="0">
                                                <ul  class="list-group list-group-flush " >
                                                    <?php
                                                        while($row4=mysqli_fetch_assoc($query4)){
                                                    ?>
                                                    <li class="list-group-item text-center fs-5">
                                                        <span><?php echo '於 '.$row4['time'].' 完成 '.$row4['action'].' 的動作' ; ?></span>
                                                    </li>
                                                    <?php
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<script type="text/javascript">
                    $(function() {
                        $('#datepicker').datepicker();
                    });
                </script>
                <div class="col-3">
                    <div class="card fadeInRight">
                        <div class="card-header d-flex align-items-center">
                            <label class="fs-2">通知欄</label>
                        </div>
                        <div class="card-body d-flex justify-content-center">
                            <div class="row">
                                <form action="message.php" method="post">
                                    <div class="col">
                                        <span class="fs-5 p-2"> 日期:</span> <br>
                                        <div class="input-group d-flex align-items-center m-2" >
                                            <input type="text" class=" rounded border border-dark-subtle p-2" name="date" id="datepicker" style="width: 325px;">
                                        </div>

                                        <span class="fs-5 p-2"> 時間:</span> <br>
                                        <div class="input-group d-flex align-items-center m-2" >
                                            <input type="text" class=" rounded border border-dark-subtle p-2" name="time" id="timepicker" style="width: 325px;">
                                        </div>

                                        <span class="fs-5 p-2"> 訊息:</span> <br>
                                        <div class="input-group text-align-start m-2" >
                                            <textarea type="text" class=" text-break rounded border border-dark-subtle p-2 text-start" name="message" style="width: 325px;height:100px"></textarea>
                                        </div>
                                        <input type="hidden">
                                        <div class="container d-flex justify-content-end m-1">
                                            <button class="btn align-middle btn-danger text-white" > 發送</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="col-1"></div>
            </div>
        </div>
        <footer></footer>
    </body>
</html>