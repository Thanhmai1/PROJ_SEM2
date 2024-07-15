<section>
    <h2>Update Menu</h2>
    <?php
    // Kết nối cơ sở dữ liệu (sử dụng kết nối đã có nếu cần)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_sem2";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Cài đặt chế độ lỗi PDO thành ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT id, person_types FROM Person_Types");
        $stmt->execute();
        $personTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // $stmt = $conn->prepare("SELECT id, namecategories FROM Categories");
        // $stmt->execute();
        // $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $conn->prepare("SELECT id, title FROM Dish");
        $stmt->execute();
        $dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
    }
?>
    <form action="index.php?act=updatemenuform" method="post">
        <!-- <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" required class="form-select">
            <?php
            foreach ($categories as $category) {
                $selected = $category['id'] == $kq1[0]['category_id'] ? 'selected' : '';
                echo '<option value="'.$category['id'].'" '.$selected.'>'.$category['namecategories'].'</option>';
            }
            ?>
        </select><br> -->

        <label for="person_type_id">Person Type:</label>
        <select name="person_type_id" id="person_type_id" required class="form-select">
            <?php
            foreach ($personTypes as $type) {
                $selected = $type['id'] == $kq1[0]['person_type_id'] ? 'selected' : '';
                echo '<option value="'.$type['id'].'" '.$selected.'>'.$type['person_types'].'</option>';
            }
            ?>
        </select><br>

        <label for="dish_id">Dish ID:</label>
        <!-- <input type="text" name="dish_id" id="dish_id" value="<?=$kq1[0]['dish_id']?>" required class="form-input"><br> -->
        <select name="dish_id" id="dish_id" required class="form-select">
            <?php
            foreach ($dishes as $dish) {
                $selected = $dish['id'] == $kq1[0]['dish_id'] ? 'selected' : '';
                echo '<option value="'.$dish['id'].'" '.$selected.'>'.$dish['title'].'</option>';
            }
            ?>
        </select><br>

        <input type="hidden" name="id" value="<?=$kq1[0]['id']?>">
        <input type="submit" name="update" value="Update" class="btn-submit">
    </form>
</section>