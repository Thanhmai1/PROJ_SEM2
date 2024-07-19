<?php 
try {
    include "./send_mail.php";
    include './otp.php';
    include '../includes/conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $role_id = 2;
        $person_type_id = 1;
        $create_at = date("Y-m-d H:i:s");
        $update_at = date("Y-m-d H:i:s");
        $status = FALSE;

        if ($confirm_password !== $password) {
            echo '<script>alert("Password confirmation does not match! Please enter again!"); window.location.href = "http://localhost:3000/html/register.php";</script>';
            exit();
        }

        $stmt = $conn->prepare("SELECT * FROM `user` WHERE `username` = ? OR `email` = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script>alert("Email or Username already exists!"); window.location.href = "http://localhost:3000/html/login.php";</script>';
            $stmt->close();
            exit();
        } else {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $verificationCode = createOTP();

            $ps = $conn->prepare("INSERT INTO user (username, email, `password`, role_id, person_type_id, verification_code, created_at, updated_at, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if ($ps === false) {
                die("Prepare failed: " . $conn->error);
            }

            $ps->bind_param("sssisssss", $name, $email, $hash_password, $role_id, $person_type_id, $verificationCode, $create_at, $update_at, $status);
            $ps->execute();

            $_SESSION['verification_code'] = $verificationCode;
            $_SESSION['email'] = $email;
            sendVerificationEmail($email, $verificationCode);          
            $ps->close();
        }
        $stmt->close();
    }

    $conn->close();
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
?>
