<?php
session_start();
include './../includes/conn.php';
include './update.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
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
} else{
    echo"Please sign in!";
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
        <div id="messageDiv"><?php echo $updateMessage; ?></div>

        <form method="POST">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="mb-3">
                <label for="old_password" class="form-label">Old Password</label>
                <input type="password" class="form-control" id="old_password" name="old_password">
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

            <button type="submit" class="btn btn-primary">Save</button>

        </form>
    </div>
</body>
<script>
    setTimeout(function () {
        document.getElementById('messageDiv').style.display = 'none';
    }, 3000); // Ẩn thông báo sau 3 giây 
</script>

</html>