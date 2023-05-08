<?php
    session_start();
    require_once('mysql.php');
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $account=$_POST['account'];
    }

    $action1="SELECT * FROM action WHERE account = '$account' AND degree='初階' AND parts='上肢'";
    $query1=mysqli_query($conn,$action1);
    $action2="SELECT * FROM action WHERE account = '$account' AND degree='初階' AND parts='下肢'";
    $query2=mysqli_query($conn,$action2);
    $action3="SELECT * FROM action WHERE account = '$account' AND degree='進階' AND parts='上肢'";
    $query3=mysqli_query($conn,$action3);
    $action4="SELECT * FROM action WHERE account = '$account' AND degree='初階' AND parts='口腔'";
    $query4=mysqli_query($conn,$action4);
    $action5="SELECT * FROM action WHERE account = '$account' AND degree='進階' AND parts='下肢'";
    $query5=mysqli_query($conn,$action5);

    $query0 = "SELECT * FROM co WHERE account='$account'";
    $result0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($result0);

    $csv_file =  $row['account']. ".csv";			
    header("Content-Type: text/csv; charset=utf-8" );
    header("Content-Disposition: attachment; filename=\"$csv_file\"");	
    $fh = fopen( 'php://output', 'w' );
    echo (chr(0xEF).chr(0xBB).chr(0xBF));
    fputcsv($fh, array('個案編號','姓名'));
    fputcsv($fh, array($row['account'],$row['name']));
    fputcsv($fh, array());
    fputcsv($fh, array('上肢訓練'));
    fputcsv($fh, array('初階'));
    $is_column=true;
    foreach($query1 as $record) {
        if($is_column) {		  	  
        fputcsv($fh, array('時間', '次數', '動作種類'));
        $is_column=false;
        }		
        fputcsv($fh, array($record['time'],$record['times'],$record['action']));
    }
    fputcsv($fh, array());
    fputcsv($fh, array('進階'));
    $is_column=true;
    foreach($query3 as $record) {
        if($is_column) {		  	  
        fputcsv($fh, array('時間', '次數', '動作種類'));
        $is_column=false;
        }		
        fputcsv($fh, array($record['time'],$record['times'],$record['action']));
    }
    fputcsv($fh, array());
    fputcsv($fh, array('下肢訓練'));
    fputcsv($fh, array('初階'));
    $is_column=true;
    foreach($query2 as $record) {
        if($is_column) {		  	  
        fputcsv($fh, array('時間', '次數', '動作種類'));
        $is_column=false;
        }		
        fputcsv($fh, array($record['time'],$record['times'],$record['action']));
    }
    fputcsv($fh, array());
    fputcsv($fh, array('進階'));
    $is_column=true;
    foreach($query5 as $record) {
        if($is_column) {	
            $i=array('時間', '次數', '動作種類');
            fputcsv($fh,$i);
            $is_column=false;
            }
            fputcsv($fh, array($record['time'],$record['times'],$record['action']));
    }
    fputcsv($fh, array());
    fputcsv($fh, array('吞嚥訓練'));
    $is_column=true;
    foreach($query4 as $record) {
        if($is_column) {	
        $i=array('時間', '次數', '動作種類');
        fputcsv($fh, array('時間', '次數', '動作種類'));
        $is_column=false;
        }
        fputcsv($fh, array($record['time'],$record['times'],$record['action']));
    }

    fclose($fh);
    exit;
?>
