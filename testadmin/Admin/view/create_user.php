<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Create Account</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./admin_user.css">
    <?php include './../view/header.php'; ?>
</head>

<body>
    <section>
        <h2>Create New User</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role_id">Role ID:</label>
                <input type="text" name="role_id" id="role_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="person_type_id">Person Type ID:</label>
                <input type="text" name="person_type_id" id="person_type_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include './../../includes/conn.php';

            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $role_id = $_POST["role_id"];
            $person_type_id = $_POST["person_type_id"];
            $create_at = date("Y-m-d H:i:s");
            $update_at = date("Y-m-d H:i:s");
            $updateUserMessage = "";

            $ps = $conn->prepare("INSERT INTO `user` (`username`, `email`, `password`, `role_id`, `person_type_id`, `create_at`, `update_at`) VALUES (?, ?, ?, ?, ?, ?, ?)");

            if ($ps === false) {
                die("Prepare failed: " . $conn->error);
            } else {
                $ps->bind_param("ssssiss", $username, $email, $hash_password, $role_id, $person_type_id, $create_at, $update_at);
                if ($ps->execute()) {
                    $updateUserMessage = "User added successfully!";
                } else {
                    $updateUserMessage = "Error: " . $ps->error;
                }
                $ps->close();
            }

            $conn->close();
            echo "<p>$updateUserMessage</p>";
        }
        ?>
    </section>

    <?php include './../view/footer.php'; ?>
</body>

</html> -->
