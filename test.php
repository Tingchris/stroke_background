<?php
    require_once('mysql.php');
    $time="SELECT*FROM cycle ORDER BY date DESC";
    $query=mysqli_query($conn,$time);
    $row=mysqli_fetch_row($query);
    $now= $_GET['value'];
    echo $now;
    $a=strtotime($now)-strtotime($row[0]);
    $b=date("Y-m-d H:i:s",$a);
    $d=strtotime("+7day",strtotime($row[0]));
    $c=date("Y-m-d H:i:s",$d);
    echo"<hr>";
    echo $row[0];
    echo"<hr>";
    echo $b;
    echo"<hr>";
    echo $c;
    ignore_user_abort(true);
    set_time_limit(0);
    if($b>='1970-01-01 01:01:00'){
        $change="UPDATE cycle SET date ='$now' where date='$row[0]'";
        if(mysqli_query($conn,$change)==FALSE ){
            echo 'ERROR';
            header("refresh:3;url=test.php");
        }else{
            $delete1="DELETE FROM mouth";
            $query1=$conn->query($delete1);
            $delete2="DELETE FROM trainup";
            $query2=$conn->query($delete2); 
            $delete3="DELETE FROM traindown";
            $query3=$conn->query($delete3);     
            header("refresh:;url=delete.php");
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content= "charset= utf-8">
        <title>中風復健系統平台</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel= "stylesheet" href="web.css"> 
        <script src="https://kit.fontawesome.com/2826cc1f0b.js" crossorigin="anonymous"></script>
        <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.3/datatables.min.css"/>
        <link rel= "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> 
        <link rel= "stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    </head>
    <body>
        <script>
            setInterval(time,5000);

            function time(){
                var today = new Date();
                var year =today.getFullYear();
                var month =today.getMonth();
                var date =today.getDate();
                var hour = today.getHours();
                var min = today.getMinutes();
                var sec =today.getSeconds();
                month=check(month+1);
                hour= check(hour);
                min = check(min);
                sec = check(sec);
                var day=year+"-"+month+"-"+date+"   "+hour+":"+min+":"+sec;
                express(day);
            }

            function check(i){
                if(i<10){
                    i="0"+i;
                }
                return i;
            }

            function express(i){
                var value=i;
                location.href="test.php?value="+value;

            }
        </script>
        <input type="hidden" value="" onclick="express()">
    </body>
</html>