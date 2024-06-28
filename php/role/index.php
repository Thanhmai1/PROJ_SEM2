
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role</title>
</head>
<body>

    <?php
    include './connect-db.php';
    if(!$conn) {
        die("Connect Error: " .mysqli_connect_error());
    }

    $roles = mysqli_query($conn, "SELECT * FROM `role`");

    if(!$roles){
        die("Truy van Error: " .mysqli_error($conn));
    }

    var_dump($roles);exit;
    ?>

    <header>Role</header>
</body>
</html>
