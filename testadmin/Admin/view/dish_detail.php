<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_sem2"; 
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn dữ liệu từ bảng Dish_Detail và Dish
    $stmt = $conn->prepare("SELECT Dish_Detail.*, Dish.title as dish_title
                            FROM Dish_Detail
                            JOIN Dish ON Dish_Detail.recipe_id = Dish.id");
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Lấy danh sách các món ăn từ bảng Dish
    $stmt = $conn->prepare("SELECT id, title FROM Dish");
    $stmt->execute();
    $dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
}
?>
    <h2>Dish Details</h2>
    <br>
    <table>
        <tr>
            <th>Recipe Name</th>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Prepare</th>
            <th>Process</th>
            <th>Intended For</th>
            <th>Introduction</th>
            <th>Popularity</th>
            <th>About at Food</th>
            <th>Thumbnail HTC</th>
            <th>Ingredient</th>
            <th>How Do It</th>
            <th>Action</th>
        </tr>
        <div class="dish-details">
            <?php
            if (isset($kq) && (count($kq) > 0)) {
                foreach ($kq as $dm) {
                    echo '
                        <tr>
                            <td>' . htmlspecialchars($dm['dish_title']) . '</td>
                            <td><img src="' . htmlspecialchars($dm['thumbnail']) . '" alt="Thumbnail" width="50"></td>
                            <td>' . htmlspecialchars($dm['title']) . '</td>
                            <td>' . htmlspecialchars($dm['prepare']) . '</td>
                            <td>' . htmlspecialchars($dm['process']) . '</td>
                            <td>' . htmlspecialchars($dm['intendedFor']) . '</td>
                            <td>' . htmlspecialchars($dm['introduction']) . '</td>
                            <td>' . htmlspecialchars($dm['popularity']) . '</td>
                            <td>' . htmlspecialchars($dm['aboutatfood']) . '</td>
                            <td><img src="' . htmlspecialchars($dm['thumbnailhtc']) . '" alt="Thumbnail HTC" width="50"></td>
                            <td>' . htmlspecialchars($dm['ingredient']) . '</td>
                            <td>' . htmlspecialchars($dm['howdoit']) . '</td>
                            <td>
                                <a href="index.php?act=updatedishdetailform&recipe_id=' . htmlspecialchars($dm['recipe_id']) . '">Update</a> | 
                                <a href="index.php?act=deletedishdetail&recipe_id=' . htmlspecialchars($dm['recipe_id']) . '">Delete</a>
                            </td>
                        </tr>
                    ';
                }
            }
            ?>
        </div>
    </table>
</section>

<section>
    <h2>Create New Dish Detail</h2>

    <form action="index.php?act=createdishdetail" method="post">
        <label for="recipe_id">Recipe ID:</label>
        <select name="recipe_id" id="recipe_id" class="form-select" required>
            <?php
            foreach ($dishes as $dish) {
                echo '<option value="'.$dish['id'].'">'.$dish['title'].'</option>';
            }
            ?>
        </select><br>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input class="form-control" type="file" name="thumbnail" id="thumbnail" multiple>
        </div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>
        <label for="prepare">Prepare:</label>
        <input type="text" name="prepare" id="prepare" required><br>
        <label for="process">Process:</label>
        <input type="text" name="process" id="process" required><br>
        <label for="intendedFor">Intended For:</label>
        <input type="text" name="intendedFor" id="intendedFor" required><br>
        <label for="introduction">Introduction:</label>
        <textarea class="form-control" name="introduction" id="introduction" rows="12"></textarea>
        <label for="popularity">Popularity:</label>
        <textarea class="form-control" name="popularity" id="popularity" rows="12"></textarea>
        <label for="aboutatfood">About at Food:</label>
        <textarea class="form-control" name="aboutatfood" id="aboutatfood" rows="12"></textarea>
        <div class="mb-3">
            <label for="thumbnailhtc" class="form-label">Thumbnail HTC</label>
            <input class="form-control" type="file" name="thumbnailhtc" id="thumbnailhtc" multiple>
        </div>
        <label for="ingredient">Ingredient:</label>
        <textarea class="form-control" name="ingredient" id="ingredient" rows="12"></textarea>
        <label for="howdoit">How Do It:</label>
        <textarea class="form-control" name="howdoit" id="howdoit" rows="12"></textarea>
        <input type="submit" value="Create">
    </form>
</section>
</body>
</html>
