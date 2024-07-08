<?php
$SMTP = "nnhi40747@gmail.com";
$smtp_port = 587;
error_reporting(E_ALL);
$to = "thanhmainguyen20120119@gmail.com";
$subject = "Tiêu đề email";
$message = "<h1>Đây là Email có chứa HTML</h1>
            <p>Đoạn văn trong Email</p>";

$headers = "From: nnhi40747@gmail.com\r\n";
$headers .= "Cc: thanhmainguyen20120119@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";    
$headers .= "Content-type: text/html\r\n";

$success = mail($to, $subject, $message, $headers);

if ($success) {
    echo "Đã gửi mail thành công...";
} else {
    echo "Không gửi đi được...";
}
?>
