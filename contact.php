<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './mail/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli("localhost", "root", "", "project_sem2");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lưu thông tin liên hệ vào cơ sở dữ liệu
    $sql = "INSERT INTO Contact (user_id, fullname, email, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $user_id, $fullname, $email, $subject, $message);
    $stmt->execute();

    // Gửi email sử dụng PHPMailer
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'thanhmainguyen20120119@gmail.com';                     
        $mail->Password   = 'ukkh rkcy uwje yvqg';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 587;                                    

        //Recipients
        $mail->setFrom($email, $fullname);
        $mail->addAddress('thanhmainguyen20120119@gmail.com');     

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Contact Form Submission: ' . $subject;
        $mail->Body    = 'Name: ' . $fullname . '<br>Email: ' . $email . '<br>Message:<br>' . nl2br($message);

        $mail->send();
        echo 'Message sent successfully!';
    } catch (Exception $e) {
        echo "Failed to send message. Mailer Error: {$mail->ErrorInfo}";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: contact1.php");
    exit();
}
