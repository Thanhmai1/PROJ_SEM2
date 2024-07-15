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
    
        // Thay đổi câu truy vấn để lấy dữ liệu từ bảng Dish_Detail và Dish
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
            <th>Recipe</th>
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
    <h2>Update Dish Detail</h2>
    <form action="index.php?act=updatedishdetailform" method="post" enctype="multipart/form-data">
        <!-- <div class="mb-3">
            <label for="thumbnail" class="form-label">Image URL thumbnail:</label>
            <input class="form-control" type="file" name="thumbnail" id="thumbnail" value="<?= isset($kq1['thumbnail']) ? htmlspecialchars($kq1['thumbnail']) : '' ?>" multiple>
        </div> -->
        <label for="thumbnail">Image URL thumbnail:</label><br>
        <input type="text" id="image_url" name="thumbnail" value="<?= isset($kq1['thumbnail']) ? htmlspecialchars($kq1['thumbnail']) : '' ?>" multiple><br><br>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= isset($kq1['title']) ? htmlspecialchars($kq1['title']) : '' ?>" required><br>
        <label for="prepare">Prepare:</label>
        <input type="text" name="prepare" id="prepare" value="<?= isset($kq1['prepare']) ? htmlspecialchars($kq1['prepare']) : '' ?>" required><br>
        <label for="process">Process:</label>
        <input type="text" name="process" id="process" value="<?= isset($kq1['process']) ? htmlspecialchars($kq1['process']) : '' ?>" required><br>
        <label for="intendedFor">Intended For:</label>
        <input type="text" name="intendedFor" id="intendedFor" value="<?= isset($kq1['intendedFor']) ? htmlspecialchars($kq1['intendedFor']) : '' ?>" required><br>
        <label for="introduction">Introduction:</label>
        <textarea class="form-control" name="introduction" id="introduction" rows="12"><?= isset($kq1['introduction']) ? htmlspecialchars($kq1['introduction']) : '' ?></textarea>
        <label for="popularity">Popularity:</label>
        <textarea class="form-control" name="popularity" id="popularity" rows="12"><?= isset($kq1['popularity']) ? htmlspecialchars($kq1['popularity']) : '' ?></textarea>
        <label for="aboutatfood">About at Food:</label>
        <textarea class="form-control" name="aboutatfood" id="aboutatfood" rows="12"><?= isset($kq1['aboutatfood']) ? htmlspecialchars($kq1['aboutatfood']) : '' ?></textarea>
        <!-- <div class="mb-3">
            <label for="thumbnailhtc" class="form-label">Thumbnail HTC</label>
            <input class="form-control" type="file" name="thumbnailhtc" id="thumbnailhtc" value="<?= isset($kq1['thumbnailhtc']) ? htmlspecialchars($kq1['thumbnailhtc']) : '' ?>" multiple>
        </div> -->
        <label for="thumbnail">Image URL thumbnail HTC:</label><br>
        <input type="text" id="image_url" name="thumbnail" value="<?= isset($kq1['thumbnailhtc']) ? htmlspecialchars($kq1['thumbnailhtc']) : '' ?>" multiple><br><br>

        <label for="ingredient">Ingredient:</label>
        <textarea class="form-control" name="ingredient" id="ingredient" rows="12"><?= isset($kq1['ingredient']) ? htmlspecialchars($kq1['ingredient']) : '' ?></textarea>
        <label for="howdoit">How Do It:</label>
        <textarea class="form-control" name="howdoit" id="howdoit" rows="12"><?= isset($kq1['howdoit']) ? htmlspecialchars($kq1['howdoit']) : '' ?></textarea>
        <input type="hidden" name="recipe_id" value="<?= isset($kq1['recipe_id']) ? htmlspecialchars($kq1['recipe_id']) : '' ?>">
        <input type="submit" name="update" value="Update">
    </form>
</section>
</body>
</html>
