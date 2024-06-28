<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $database = "project_sem2";
    $conn = mysqli_connect($servername, $user, $password, $database);
    if(!$conn){
        echo "Connection Fail: ".mysqli_connect_errno();exit;
    }

?>