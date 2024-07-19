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

    // Fetch dishes
    $stmt = $conn->prepare("SELECT * FROM Dish");
    $stmt->execute();
    $dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
}
?>
<section>
    <h2>Create New Dish</h2>
    <form action="index.php?act=createdishform" method="post">
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <?php
            foreach ($categories as $category) {
                echo '<option value="'.$category['id'].'">'.$category['namecategories'].'</option>';
            }
            ?>
        </select><br>

        <label for="thumbnail">Image URL:</label><br>
        <input type="text" id="image_url" name="thumbnail" required><br><br>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>
        <label for="description">description:</label>
        <input type="text" name="description" id="description" required><br>
        <input type="submit" value="Create">
    </form>
</section>

<section>
<h2>Dishes</h2>
    <form action="index.php?act=createdishform" method="post">
        <input type="submit" name="add" value="Add Dish">
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Category</th>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>description</th>
            <th>Action</th>
        </tr>
        <?php
        if (isset($dishes) && (count($dishes) > 0)) {
            $i = 1;
            foreach ($dishes as $dish) {
                $category_name = '';
                foreach ($categories as $category) {
                    if ($category['id'] == $dish['category_id']) {
                        $category_name = $category['namecategories'];
                        break;
                    }
                }
                echo '
                    <tr>
                        <td>' . $i . '</td>
                        <td>' . htmlspecialchars($category_name) . '</td>
                        <td>' . htmlspecialchars($dish['thumbnail']) . '</td>
                        <td>' . htmlspecialchars($dish['title']) . '</td>
                        <td>' . htmlspecialchars($dish['description']) . '</td>
                        <td>
                            <a href="index.php?act=updatedishform&id=' . $dish['id'] . '">Update</a> | 
                            <a href="index.php?act=deletedish&id=' . $dish['id'] . '">Delete</a>
                        </td>
                    </tr>
                ';
                $i++;
            }
        }
        ?>
    </table>
</section>


