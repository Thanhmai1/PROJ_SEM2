<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION['UserName'])) {
        header("Location: http://localhost:3000/html/login.html");
        exit();
    }
    echo "<p>Welcome " . $_SESSION['UserName'] . "!</p><br>";
    echo "<a href='logout.php'>Logout</a>";
    ?>

</body>
</html>