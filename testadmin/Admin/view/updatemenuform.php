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