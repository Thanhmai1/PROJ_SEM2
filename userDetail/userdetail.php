<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include './../includes/conn.php';

$username = $_SESSION['username'];
$email = '';
$updateMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if (!empty($new_email) && $new_email != $_SESSION['email']) {
        $update_ps = $conn->prepare("UPDATE `user` SET `email` = ? WHERE `username` = ?");
        $update_ps->bind_param("ss", $new_email, $username);
        $update_ps->execute();

        if ($update_ps->affected_rows > 0) {
            $_SESSION['email'] = htmlspecialchars($new_email, ENT_QUOTES, 'UTF-8');
            $updateMessage .= "Email updated successfully.<br>";
        } else {
            $updateMessage .= "Error updating email: " . $update_ps->error . "<br>";
        }
    }
    if (!empty($new_password) && $new_password === $confirm_password) {
        $hash_password = md5($new_password);
        $update_ps = $conn->prepare("UPDATE `user` SET `password` = ? WHERE `username` = ?");
        $update_ps->bind_param("ss", $hash_password, $username);
        $update_ps->execute();

        if ($update_ps->affected_rows > 0) {
            $updateMessage .= "Password updated successfully.<br>";
        } else {
            $updateMessage .= "Error updating password: " . $update_ps->error . "<br>";
        }
    } elseif (!empty($new_password) && $new_password !== $confirm_password) {
        $updateMessage .="Passwords do not match.<br>";
    }else{
        $updateMessage .="Password mustn't empty!";
        exit;
    }
}
$ps = $conn->prepare("SELECT `email`, `username` FROM `user` WHERE `username` = ?");
$ps->bind_param("s", $username);
$ps->execute();

$result = $ps->get_result();

if ($row = $result->fetch_assoc()) {
    $email = $row['email'];
    $username = $row['username'];
} else {
    echo "user not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/css/userdetail.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>User Detail</h1>
        <?php echo $updateMessage; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
            </div>
            <small><a href="./../index.php">> Back</a></small>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>