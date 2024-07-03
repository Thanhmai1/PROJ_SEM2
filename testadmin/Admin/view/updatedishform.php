<section>
    <h2>Update Dish</h2>
    <form action="index.php?act=updatedishform" method="post">
        <label for="category_id">Category ID:</label>
        <input type="text" name="category_id" id="category_id" value="<?=$kq1[0]['category_id']?>" required><br>
        <label for="thumbnail">Thumbnail:</label>
        <!-- <input type="text" name="thumbnail" id="thumbnail" value="<?=$kq1[0]['thumbnail']?>" required><br> -->
        <input class="mb-3" class="form-control" type="file" name="thumbnail" id="thumbnail" value="<?=$kq1[0]['thumbnail']?>" multiple>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?=$kq1[0]['title']?>" required><br>
        <input type="hidden" name="id" value="<?=$kq1[0]['id']?>">
        <input type="submit" name="update" value="Update">
    </form>
</section>