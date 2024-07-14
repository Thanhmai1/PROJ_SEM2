
<section>
    <h2>Create New Dish</h2>
    <form action="index.php?act=createdishform" method="post">
        <label for="category_id">Category ID:</label>
        <input type="text" name="category_id" id="category_id" required><br>

        <label for="thumbnail">Image URL:</label><br>
        <input type="text" id="image_url" name="thumbnail" required><br><br>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>
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
            <th>Category ID</th>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        <?php
        if (isset($kq) && (count($kq) > 0)) {
            $i = 1;
            foreach ($kq as $dm) {
                echo '
                        <tr>
                        <td>' . $i . '</td>
                        <td>' . $dm['category_id'] . '</td>
                        <td>' . $dm['thumbnail'] . '</td>
                        <td>' . $dm['title'] . '</td>
                        <td><a href="index.php?act=updatedishform&id=' . $dm['id'] . '">Update</a> | <a href="index.php?act=deletedish&id=' . $dm['id'] . '">Delete</a></td>
                        </tr>
                    ';
                $i++;
            }
        }
        ?>
    </table>
</section>


