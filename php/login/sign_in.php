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
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $ps = $conn->prepare("SELECT `UserName`,`Password` FROM `users` WHERE UserName = ? AND Password = ? ");
        $ps->bind_param("ss", $name, $hash_password);
        $ps -> execute();
        $result = $ps ->get_result();
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if (password_verify($hash_password, $row['Password'])) {
                $_SESSION['name'] = $row['UserName'];
                $_SESSION['passwordHash'] = $row['Password'];
                echo "<h2>Sign in sucessful!</h2>";
            } else {        
                echo "<h2>Wrong password or user name! Please enter again</h2>";
            }
        }         

        $ps->close();    
        $conn->close();
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
    ?>
    
</body>
</html>