<?php
    $account='airehab_01';
    require_once('mysql.php');
    /*$action1="SELECT * FROM action WHERE account = '$account' AND degree='初階' AND parts='上肢'";
    $query1=mysqli_query($conn,$action1);

    $action2="SELECT * FROM action WHERE account = '$account' AND degree='初階' AND parts='下肢'";
    $query2=mysqli_query($conn,$action2);

    $action3="SELECT * FROM action WHERE account = '$account' AND degree='進階' AND parts='上肢'";
    $query3=mysqli_query($conn,$action3);

    $action4="SELECT * FROM action WHERE account = '$account' AND degree='初階' AND parts='口腔'";
    $query4=mysqli_query($conn,$action4);

    $action5="SELECT * FROM action WHERE account = '$account' AND degree='進階' AND parts='下肢'";
    $query5=mysqli_query($conn,$action5);*/

   /* $query0 = "SELECT * FROM co WHERE id = '1'";
    $result0 = mysqli_query($conn, $query0);
    $row = mysqli_fetch_assoc($result1);*/

    $query = "SELECT name, gender, address, designation, age FROM developers LIMIT 10";
    $result = mysqli_query($conn, $query) or die("database error:". mysqli_error($conn));
    $records = array();	
        $csv_file = "phpzag_csv_export_".date('Ymd') . ".csv";			
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=\"$csv_file\"");	
        $fh = fopen( 'php://output', 'w' );
       /* fputcsv($fh, array('個案編號','姓名'));
        fputcsv($fh, array($row['name'],$row['name']));
        fputcsv($fh, array());
        fputcsv($fh, array('上肢訓練'));
        fputcsv($fh, array('初階'));
        while( $rows = mysqli_fetch_assoc($query1) ) {
            $records[] = $rows;
        }	
        if(!empty($records)) {
            foreach($records as $record) {
                if($is_coloumn) {		  	  
                fputcsv($fh, array('時間','次數','動作種類'));
                $is_coloumn = false;
                }		
                fputcsv($fh, array($record));
            }
        }*/
        $is_column=true;
        foreach($result as $record) {
            if($is_column) {		  	  
            fputcsv($fh, array('name', 'gender', 'address', 'designation', 'age'));
            $is_column=false;
            }		
            fputcsv($fh, array_values($record));
        }
        $is_column=true;
        foreach($result as $record) {
            if($is_column) {		  	  
            fputcsv($fh, array('name', 'gender', 'address', 'designation', 'age'));
            $is_column=false;
            }		
            fputcsv($fh, array_values($record));
        }
        fclose($fh);
        exit;
?>