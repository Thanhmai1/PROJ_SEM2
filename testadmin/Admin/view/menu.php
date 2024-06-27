
<section>
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
                        <td>'.$dm['category_id'].'</td>
                        <td>'.$dm['person_type_id'].'</td>
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


<section>
    <h2>Create New Menu</h2>
    <form action="index.php?act=createmenuform" method="post">
        <label for="category_id">Category ID:</label>
        <input type="text" name="category_id" id="category_id" required><br>
        <label for="person_type_id">Person Type ID:</label>
        <input type="text" name="person_type_id" id="person_type_id" required><br>
        <label for="dish_id">Dish ID:</label>
        <input type="text" name="dish_id" id="dish_id" required><br>
        <input type="submit" value="Create">
    </form>
</section>


<section>
    <h2>Update Menu</h2>
    <form action="index.php?act=updatemenuform" method="post">
        <label for="category_id">Category ID:</label>
        <input type="text" name="category_id" id="category_id" value="<?=$kq1[0]['category_id']?>" required><br>
        <label for="person_type_id">Person Type ID:</label>
        <input type="text" name="person_type_id" id="person_type_id" value="<?=$kq1[0]['person_type_id']?>" required><br>
        <label for="dish_id">Dish ID:</label>
        <input type="text" name="dish_id" id="dish_id" value="<?=$kq1[0]['dish_id']?>" required><br>
        <input type="hidden" name="id" value="<?=$kq1[0]['id']?>">
        <input type="submit" name="update" value="Update">
    </form>
</section>
