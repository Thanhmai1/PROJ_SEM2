<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <?php include '../includes/header.php';?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="email">Enter your email:</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    required>
                            </div>
                            <button type="submit" style="background-color: #00aaa3; border:#00aaa3;" class="btn btn-primary btn-block">Submit</button>

                        </form>

                        <?php

                        if (!empty($error_message)) {
                            echo "<div class='alert alert-danger mt-3'>$error_message</div>";

                        }
                        if (!empty($message)) {
                            echo "<div class='alert alert-info mt-3'>$message</div>";

                        }
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php include '../includes/footer.php';?>
</body>
</html>
<?php
// Initialize session and include necessary files

include './otp.php';
include '../includes/conn.php';  

// Generate and store OTP token
$token = createOTP();
$_SESSION['token'] = $token;

// Check if the necessary session variables are set
if (!isset($_SESSION['token']) || !isset($_SESSION['reset_email'])) {
    die("Invalid path.");
}

// Handle POST request for updating the password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($new_password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {                   
        $email = $_SESSION['reset_email'];

        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed_password, $email);

        if ($stmt->execute()) {
            // Include mail sending script on success
            include './send_mail.php';

            // Unset session variables related to password reset
            unset($_SESSION['reset_token']);
            unset($_SESSION['reset_email']);
        } else {
            echo "Error updating password: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <button type="submit">Update Password</button>
    </form>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
</body>
</html>
