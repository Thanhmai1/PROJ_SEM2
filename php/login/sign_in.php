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
        $hash_password = md5($password);
        $ps = $conn->prepare("SELECT `username`,`password` FROM `user` WHERE `username` = ? AND `password` = ?");

        $ps->bind_param("ss", $name, $hash_password);

        $ps->execute();
        $ps->store_result();

        if ($ps->num_rows > 0) {
            $ps->bind_result($db_username, $db_password); // gẵn tên cột kết quả vào biến
            $ps->fetch();

            if ($hash_password == $db_password) {
                $_SESSION['username'] = $db_username;
                $_SESSION['hash_password'] = $db_password;

                header("Location: http://localhost:3000/index_logined.php");
                exit;
            } else {
                echo "error";
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