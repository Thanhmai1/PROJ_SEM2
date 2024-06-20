<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project_sem2";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {            
            die("Connection failed: " . $conn->connect_error);
        }                        
    
        $name = $_POST["name"];        
        $password = $_POST["password"];
        $hash_password = md5($password);
        $ps = $conn->prepare("SELECT `username`,`password` FROM `user` WHERE `username` = ? AND `password` = ?");        
        
        $ps->bind_param("ss", $name, $hash_password);        
        
        $ps->execute();
        $result = $ps ->get_result();        
        if($result->num_rows > 0){
            
            $row = $result->fetch_assoc();            
            if ($hash_password== $row['password']) {
                $_SESSION['name'] = $row['username'];
                $_SESSION['hash_password'] = $row['Password'];
                                
                header ("Location:http://localhost:3000/index.html");
                exit;
            }
            else{
                echo "error";
            }
        } else {      
            echo '<script>alert("PASSWORD OR USERNAME IS WRONG!"); window.location.href = "http://localhost:3000/html/login.html";</script>';
            exit;            
        }     

        $ps->close();    
        $conn->close();
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
    ?>
    
</body>
</html>