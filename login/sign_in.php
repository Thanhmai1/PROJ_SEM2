<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    session_start();    

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

        $ps = $conn->prepare("SELECT `username`, `password` FROM `user` WHERE `username` = ?");
        $ps->bind_param("s", $name);
        $ps->execute();
        $result = $ps->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hash_password_db = $row['password'];
            if (password_verify($password, $hash_password_db)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['hash_password'] = $row['password'];
                if($row['role_id'] == 1){
                    header("Location: http://localhost:3000/testadmin/Admin/index.php");
                }
                else{
                    header("Location: http://localhost:3000/index.php");
                }
                
                exit;
            } else {
                echo '<script>alert("PASSWORD OR USERNAME IS WRONG!"); window.location.href = "http://localhost:3000/html/login.php";</script>';
            }
        } else {
            echo '<script>alert("PASSWORD OR USERNAME IS WRONG!"); window.location.href = "http://localhost:3000/html/login.php";</script>';
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