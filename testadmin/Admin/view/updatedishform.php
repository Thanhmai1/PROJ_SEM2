<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Dish</title>
</head>
<body>
<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_sem2"; 
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch categories
    $stmt = $conn->prepare("SELECT id, namecategories FROM Categories");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch the specific dish to be updated
    $dish_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Dish WHERE id = :id");
    $stmt->bindParam(':id', $dish_id);
    $stmt->execute();
    $dish = $stmt->fetch(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
}
?>

<section>
    <h2>Update Dish</h2>
    <form action="index.php?act=updatedishform" method="post">
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <?php
            foreach ($categories as $category) {
                $selected = ($category['id'] == $dish['category_id']) ? 'selected' : '';
                echo '<option value="'.$category['id'].'" '.$selected.'>'.$category['namecategories'].'</option>';
            }
            ?>
        </select><br>

        <label for="thumbnail">Image URL:</label>
        <!-- <input class="mb-3" class="form-control" type="file" name="thumbnail" id="thumbnail" value="<?=htmlspecialchars($dish['thumbnail'])?>" multiple> -->
        <input type="text" id="image_url" name="thumbnail" value="<?=htmlspecialchars($dish['thumbnail'])?>" required><br><br>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?=htmlspecialchars($dish['title'])?>" required><br>
        <label for="title">Description:</label>
        <input type="text" name="description" id="description" value="<?=htmlspecialchars($dish['description'])?>" required><br>

        <input type="hidden" name="id" value="<?=htmlspecialchars($dish['id'])?>">
        <input type="submit" name="update" value="Update">
    </form>
</section>

</body>
</html>
