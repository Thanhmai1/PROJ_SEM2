<?php
$error_message = "";
$message = "";
try {
    include '../includes/conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $token = $_POST["verification_code"];
        if (empty($token)) {
            $error_message = "Verification code cannot be empty!";
        } else {
            $stmt = $conn->prepare("SELECT * FROM `pending_user` WHERE `verification_code` = ?");            
            if ($stmt === false) {

                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("s", $token);            
            $stmt->execute();            
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $name = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
                $role_id = $row['role_id'];
                $person_type_id = $row['person_type_id'];
                $create_at = $row['created_at'];
                $update_at = $row['updated_at'];
                $stmt_insert =  $conn->prepare("INSERT INTO `user` (`username`, `email`, `password`, `role_id`, `person_type_id`, `created_at`, `update_at`) VALUES (?, ?, ?, ?, ?, ?, ?)");                
                if ($stmt_insert === false) {
                    die("Prepare failed: " . $conn->error);
                }
                $stmt_insert->bind_param("sssisss", $name, $email, $password, $role_id, $person_type_id, $create_at, $update_at);
                $stmt_insert->execute();
                $stmt_delete = $conn->prepare("DELETE FROM `pending_user` WHERE `verification_code` = ?");
                if ($stmt_delete === false) {
                    die("Prepare failed: " . $conn->error);
                }
                $stmt_delete->bind_param("s", $token);
                $stmt_delete->execute();

                $message = "Your account verified and activated successfully!";
            } else {
                $error_message = "Invalid verification code!";
            }
        }
        
    }
    

    $conn->close();
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include '../includes/header.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Verify Code</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="verification_code">Enter Verification Code:</label>
                                <input type="text" class="form-control" id="verification_code" name="verification_code"
                                    required>
                            </div>
                            <button type="submit" style="background-color: #00aaa3; border:#00aaa3;" class="btn btn-primary btn-block">Verify</button>

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

    <?php include '../includes/footer.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>