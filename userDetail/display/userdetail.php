<?php
session_start();
include './../../includes/conn.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
$ps = $conn->prepare("SELECT `email`, `username`, `person_type_id`, `role_id`,`created_at` FROM `user` WHERE `username` = ?");
$ps->bind_param("s", $username);
$ps->execute();
$result = $ps->get_result();

if ($row = $result->fetch_assoc()) {
    $email = $row['email'];
    $username = $row['username'];
    $person_type_id = $row['person_type_id'];
    $role_id = $row['role_id'];
    $created_at = $row['created_at'];

    $type_ps = $conn->prepare("SELECT `person_types` FROM `person_types` WHERE `id` = ?");
    $type_ps->bind_param("i", $person_type_id);
    $type_ps->execute();
    $type_result = $type_ps->get_result();

    if ($type_row = $type_result->fetch_assoc()) {
        $person_types = $type_row['person_types'];
    } else {
        $person_types = "Type information not available";
    }

    $role_ps = $conn->prepare("SELECT `name` FROM `role` WHERE `id` = ?");
    $role_ps->bind_param("i", $role_id);
    $role_ps->execute();
    $role_result = $role_ps->get_result();

    if ($role_row = $role_result->fetch_assoc()) {
        $role_name = $role_row['name'];
    } else {
        $role_name = "Role information not available";
    }
} else {
    echo "User not found.";
    exit;
}
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
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-section h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #4e88ff;
            box-shadow: 0 0 0 0.2rem rgba(78, 136, 255, 0.25);
        }

        .alert {
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <?php include './header-userdetail.php'; ?>       

        <div class="form-section">
            <h2>User Detail</h2>
            <form action="updateEmail.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($username); ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Type person</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($person_types); ?>" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($role_name); ?>" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">Created At</label>
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($created_at); ?>" disabled>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
