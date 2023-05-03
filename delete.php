<?php
    require_once('mysql.php');
    $delete="DELETE FROM cycle";
    $query=$conn->query($delete);
    echo "ERROR";
    if(!$query){
        die($conn->error);
    }else{
        header("url=test.php");
    }
?>