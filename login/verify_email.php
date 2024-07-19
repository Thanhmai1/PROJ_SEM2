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
            $stmt = $conn->prepare("SELECT * FROM `user` WHERE `verification_code` = ?");
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $userId = $row['id'];

                $stmt_update = $conn->prepare("UPDATE `user` SET `status` = ? WHERE `id` = ?");
                if ($stmt_update === false) {
                    die("Prepare failed: " . $conn->error);
                }
                $status = TRUE;
                $stmt_update->bind_param("ii", $status, $userId);
                $stmt_update->execute();
                $stmt_update->close();

                $message = "Your account verified and activated successfully!";
            } else {
                $error_message = "Invalid verification code!";
            }
            $stmt->close();
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
                                <input type="text" class="form-control" id="verification_code" name="verification_code" required>
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
