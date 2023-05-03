<?php
    $hn = 'localhost';
    $db = 'cool';
    $un = 'root';
    $pw = '';
    $conn = mysqli_connect($hn,$un,$pw,$db);
    if($conn->connect_error){
        echo "ERROR: ". $conn->connect_error;
    }

?>