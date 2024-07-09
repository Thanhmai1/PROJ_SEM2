<?php
// db.php
$servername = "localhost"; // Hoặc tên máy chủ của bạn
$username = "root"; // Tên người dùng MySQL của bạn
$password = ""; // Mật khẩu MySQL của bạn
$dbname = "project_sem2"; // Tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
