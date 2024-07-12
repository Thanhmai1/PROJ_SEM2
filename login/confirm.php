<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: http://localhost:3000/login.php');
    exit();
}

if (!isset($_GET['token'])) {
    die("Token is missing.");
}

$token = $_GET['token'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_sem2";

$conn =new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `pending_users` WHERE `token` = ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: ". $conn->error);
}
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];

    $sql_insert_user = "INSERT INTO user (`username`, `email`, `password`, `role_id`, `person_type_id`, `created_at`, `updated_at`)
                        SELECT `username`, `email`, `password`, `role_id`, `person_type_id`, `created_at`, `updated_at` FROM `pending_users` WHERE `token` = ?";
    $stmt_insert_user = $conn->prepare($sql_insert_user);
    if ($stmt_insert_user === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt_insert_user->bind_param("s", $token);
    $stmt_insert_user->execute();
    $stmt_insert_user->close();

    $sql_delete_pending = "DELETE FROM `pending_users` WHERE `token` = ?";
    $stmt_delete_pending = $conn->prepare($sql_delete_pending);
    if ($stmt_delete_pending === false) {
        die(" prepare failed: " . $conn->error);
    }
    $stmt_delete_pending-> bind_param("s ",$token);
    $stmt_delete_pending-> execute();

    $stmt_delete_pending-> close();
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email;
    header('Location: http://localhost:3000/login.php');
    exit();
}else {
    die("Invalid token");

}
$stmt->close();
$conn->close();
?>