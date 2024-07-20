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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $password = $_POST["password"];

            $ps = $conn->prepare("SELECT `status`, `username`, `password`, `role_id` FROM `user` WHERE `username` = ?");
            if ($ps === false) {
                die("Prepare failed: " . $conn->error);
            }

            $ps->bind_param("s", $name);
            $ps->execute();
            $result = $ps->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row['status'] == 1) {
                    $hash_password_db = $row['password'];
                    if (password_verify($password, $hash_password_db)) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $row['username'];                        
                        $_SESSION['role_id'] = $row['role_id'];

                        if ($row['role_id'] == 1) {
                            header("Location: http://localhost:3000/testadmin/Admin/index.php");
                        } else {
                            header("Location: http://localhost:3000/index.php");
                        }
                        exit;
                    } else {
                        echo '<script>alert("PASSWORD OR USERNAME IS WRONG!"); window.location.href = "http://localhost:3000/html/login.php";</script>';
                    }
                } else {
                    echo "<script>alert('Your account is not activated!'); window.location.href = 'http://localhost:3000/html/login.php';</script>";
                }
            } else {
                echo '<script>alert("PASSWORD OR USERNAME IS WRONG!"); window.location.href = "http://localhost:3000/html/login.php";</script>';
            }

            $ps->close();
        }

        $conn->close();
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
    ?>

</body>

</html>
