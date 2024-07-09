<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin user</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php         
        include './header.php';
        include './../../../includes/conn.php';     
    ?>
    <form action="./create_user.php" method="post">
        <input type="submit" name="add_user" value="Add new user">
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Hash password</th>
            <th>Role ID</th>
            <th>Person type ID</th>
            <th>Create_at</th>
            <th>Update_at</th>
        </tr>
    </table>
    <?php 
    include './../../Admin/view/footer.php';
    ?>
</body>
</html>