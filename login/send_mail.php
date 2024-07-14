<?php 
function sendVerificationEmail($email, $token)
{
    include './mail.php';
    $error_message = '';
    $success_message = '';
    try {
        $mailer = new Mailer();

        $confirm_link = "http://localhost:3000/login/confirm.php?token=" . $token;
        $email_body = "
           <!DOCTYPE html>
<html lang='en'>
<head>

    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Account Registration Confirmation</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .header {
            text-align: center;
            padding: 10px 0;
            background-color: #00aaa3;
            color: #ffffff;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #aaaaaa;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1>Welcome!</h1>
        </div>
        <div class='content'>
            <p>Thank you for registering an account. Please use the verification code below to complete your registration:</p>
            <h2 style='text-align: center;'>$token </h2>
            <p>If you did not register an account, please ignore this email.</p>
        </div>
        <div class='footer'>
            <p>This email was sent automatically. Please do not reply to this email.</p>
        </div>
    </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>
</html>";

        $mail_sent = $mailer->sendMail("Confirm account registration", $email_body, $email);

        if ($mail_sent) {
            echo '<script>alert("Send verification email successfull."); window.location.href = "http://localhost:3000/login/verify_email.php";</script>';
        } else {
            echo '<script>alert("Failed to send verification email."); window.location.href = "http://localhost:3000/html/login.php";</script>';
        }

    } catch (Exception $e) {
        $error_message = "An error occurred: " . $e->getMessage();
        echo $error_message;
    }
}
?>