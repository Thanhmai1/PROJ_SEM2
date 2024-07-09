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
    $confirm_password = $_POST["confirm_password"];
    $role_id = 2;
    $person_type_id = 1;
    $create_at = date("Y-m-d H:i:s");
    $update_at = date("Y-m-d H:i:s");    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {        
        if (empty($name) || empty($email)) {
            echo '<script>alert("Username and Email cannot be empty!"); window.location.href = "http://localhost:3000/html/register.php";</script>';
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script>alert("Invalid email format!"); window.location.href = "http://localhost:3000/html/register.php";</script>';
            exit();
        }
        if (strlen($password) < 8) {
            echo '<script>alert("Password must be at least 8 characters!"); window.location.href = "http://localhost:3000/html/register.php";</script>';
            exit();
        }
        if ($confirm_password !== $password) {
            echo '<script>alert("Password confirmation does not match! Please enter again!"); window.location.href = "http://localhost:3000/html/register.php";</script>';
            exit();
        }        
        $sql = "SELECT * FROM user WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script>alert("Email or Username already exists!"); window.location.href = "http://localhost:3000/html/register.php";</script>';
            exit();
        } else {            
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $ps = $conn->prepare("INSERT INTO user (username, email, `password`, role_id, person_type_id, created_at, update_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
            if ($ps === false) {
                die("Prepare failed: " . $conn->error);
            }
            $ps->bind_param("sssisss", $name, $email, $hash_password, $role_id, $person_type_id, $create_at, $update_at);
            $ps->execute();
            echo '<script>alert("Registration successful!"); window.location.href = "http://localhost:3000/html/login.php";</script>';
            exit();
        }
    }

    $ps->close();
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
?>
