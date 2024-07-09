
<section>
    <?php
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project_sem2"; 
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Thay đổi câu truy vấn để lấy tên của person_types từ bảng Person_Types
        $stmt = $conn->prepare("SELECT Menu.id, Categories.namecategories, Person_Types.person_types, Menu.dish_id
                                FROM Menu
                                JOIN Categories ON Menu.category_id = Categories.id
                                JOIN Person_Types ON Menu.person_type_id = Person_Types.id");
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
    }
    ?>
    <h2>Menus</h2>
    <form action="index.php?act=createmenuform" method="post">
        <input type="submit" name="add" value="Add Menu">
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Category ID</th>
            <th>Person Type ID</th>
            <th>Dish ID</th>
            <th>Action</th>
        </tr>
        <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dm) {
                    echo '
                        <tr>
                        <td>'.$i.'</td>
                        <td>'.$dm['namecategories'].'</td>
                        <td>'.$dm['person_types'].'</td>
                        <td>'.$dm['dish_id'].'</td>
                        <td><a href="index.php?act=updatemenuform&id='.$dm['id'].'">Update</a> | <a href="index.php?act=deletemenu&id='.$dm['id'].'">Delete</a></td>
                        </tr>
                    ';
                    $i++;
                }
            }
        ?>
    </table>
</section>
<?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project_sem2"; 

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $stmt = $conn->prepare("SELECT id, person_types FROM Person_Types");
            $stmt->execute();
            $personTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt = $conn->prepare("SELECT id, namecategories FROM Categories");
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
        }
    ?>
<section>
    <h2>Create New Menu</h2>
    <form action="index.php?act=createmenuform" method="post">
        <label for="category_id">Category ID:</label>
        <!-- <input type="text" name="category_id" id="category_id" required><br> -->
        <select name="category_id" id="category_id" required class="form-select">
            <?php
            foreach ($categories as $category) {
                echo '<option value="'.$category['id'].'">'.$category['namecategories'].'</option>';
            }
            ?>
        </select><br>
        <label for="person_type_id">Person Type ID:</label>
        <!-- <input type="text" name="person_type_id" id="person_type_id" required><br> -->
        <select name="person_type_id" id="person_type_id" class="form-select" required>
            <?php foreach ($personTypes as $type): ?>
                <option value="<?= $type['id'] ?>"><?= $type['person_types'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="dish_id">Dish ID:</label>
        <input type="text" name="dish_id" id="dish_id" required><br>
        <input type="submit" value="Create">
    </form>
</section>
