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
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cornfirm_password = $_POST["cornfirm_password"];
    $role_id = 2;
    $person_type_id = 1;
    $hash_password = md5($password);
    $create_at = date("Y-m-d H:i:s");
    $update_at = date("Y-m-d H:i:s");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "SELECT * FROM user WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script>alert("Email or Username already exists!"); window.location.href = "http://localhost:3000/html/login.php";</script>';
            exit();
        } else {
            $ps = $conn->prepare("INSERT INTO user (username, email, `password`, role_id, person_type_id, created_at, update_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
            if ($ps === false) {
                die("Prepare failed: " . $conn->error);
            } elseif ($cornfirm_password == $password) {
                $ps->bind_param("sssisss", $name, $email, $hash_password, $role_id, $person_type_id, $create_at, $update_at);
                $ps->execute();
                header('http://localhost:3000/includes/checkEmail.php');
                exit();
            } else {
                echo '<script>alert("Password confirm may incorrect! Please enter again!"); window.location.href = "http://localhost:3000/html/login.php";</script>';
            }
        }
    }
    $ps->close();
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
?>