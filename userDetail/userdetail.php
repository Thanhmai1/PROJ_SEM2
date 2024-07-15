<?php
session_start();
include './../includes/conn.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
$updateMessage = isset($_SESSION['updateMessage']) ? $_SESSION['updateMessage'] : '';
$updateErrorMessage = isset($_SESSION['updateErrorMessage']) ? $_SESSION['updateErrorMessage'] : '';

$ps = $conn->prepare("SELECT `email`, `username` FROM `user` WHERE `username` = ?");
$ps->bind_param("s", $username);
$ps->execute();
$result = $ps->get_result();

if ($row = $result->fetch_assoc()) {
    $email = $row['email'];
    $username = $row['username'];
} else {
    echo "User not found.";
    exit;
}

unset($_SESSION['updateMessage']);
unset($_SESSION['updateErrorMessage']);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/css/userdetail.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if ($updateErrorMessage): ?>
        <div id="messageDiv" class="alert alert-danger" role="alert">
            <?php echo $updateErrorMessage; ?>
        </div>
        <?php endif; ?>

        <?php if ($updateMessage): ?>
        <div id="messageDiv" class="alert alert-info" role="alert">
            <?php echo $updateMessage; ?>
        </div>
        <?php endif; ?>

        <div class="form-section">
            <h2>User Detail</h2>
            <form action="updateEmail.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" >
                </div>                 
                <button type="submit" value="submit" name="updateEmail" class="btn btn-primary">Update Email</button>               
            </form>
        </div>

        <div class="form-section">
            <h2>Change Password</h2>
            <form action="updatePassword.php" method="post">
                <div class="mb-3 password-container">
                    <label for="old_password" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password">
                    <i class="fas fa-eye" onclick="togglePassword('old_password', this)"></i>
                </div>
                <div class="mb-3 password-container">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" minlength="8">
                    <i class="fas fa-eye" onclick="togglePassword('new_password', this)"></i>
                </div>
                <div class="mb-3 password-container">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="8">
                    <i class="fas fa-eye" onclick="togglePassword('confirm_password', this)"></i>
                </div>
                <button type="submit" value="submit" name="updatePassword" class="btn btn-primary">Change password</button>
            </form>
        </div>

        <small><a href="./../index.php">&gt;Back</a></small>
    </div>

    <script>
        function togglePassword(fieldId, icon) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        }

        setTimeout(function () {
            document.getElementById('messageDiv').style.display = 'none';
        }, 2000);
    </script>
</body>
</html>
