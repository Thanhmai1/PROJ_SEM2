<section>
    <h2>Update Dish Detail</h2>
    <form action="index.php?act=updatedishdetailform" method="post">
        <!-- <label for="thumbnail">Thumbnail:</label>
        <input type="text" name="thumbnail" id="thumbnail" value="<?= htmlspecialchars($kq1['thumbnail']) ?>"
            required><br> -->
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input class="form-control" type="file" name="thumbnail" id="thumbnail"
                value="<?= htmlspecialchars($kq1['thumbnail']) ?>" multiple>
        </div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= htmlspecialchars($kq1['title']) ?>" required><br>
        <label for="prepare">Prepare:</label>
        <input type="text" name="prepare" id="prepare" value="<?= htmlspecialchars($kq1['prepare']) ?>" required><br>
        <label for="process">Process:</label>
        <input type="text" name="process" id="process" value="<?= htmlspecialchars($kq1['process']) ?>" required><br>
        <label for="intendedFor">Intended For:</label>
        <input type="text" name="intendedFor" id="intendedFor" value="<?= htmlspecialchars($kq1['intendedFor']) ?>"
            required><br>
        <label for="introduction">Introduction:</label>
        <!-- <input type="text" name="introduction" id="introduction" value="<?= htmlspecialchars($kq1['introduction']) ?>"
            required><br> -->
        <textarea class="form-control" name="introduction" id="introduction" rows="12"
            value="<?= htmlspecialchars($kq1['introduction']) ?>" ></textarea>
        <label for="popularity">Popularity:</label>
        <!-- <input type="text" name="popularity" id="popularity" value="<?= htmlspecialchars($kq1['popularity']) ?>"
            required><br> -->
        <textarea class="form-control" name="popularity" id="popularity" rows="12"
            value="<?= htmlspecialchars($kq1['popularity']) ?>"></textarea>
        <label for="aboutatfood">About at Food:</label>
        <!-- <input type="text" name="aboutatfood" id="aboutatfood" value="<?= htmlspecialchars($kq1['aboutatfood']) ?>"
            required><br> -->
        <textarea class="form-control" name="aboutatfood" id="aboutatfood" rows="12"
            value="<?= htmlspecialchars($kq1['aboutatfood']) ?>"></textarea>
        <!-- <label for="thumbnailhtc">Thumbnail HTC:</label>
        <input type="text" name="thumbnailhtc" id="thumbnailhtc" value="<?= htmlspecialchars($kq1['thumbnailhtc']) ?>"
            required><br> -->
        <div class="mb-3">
            <label for="thumbnailhtc" class="form-label">Thumbnail HTC</label>
            <input class="form-control" type="file" name="thumbnailhtc" id="thumbnailhtc" value="<?= htmlspecialchars($kq1['thumbnailhtc']) ?>" multiple>
        </div>
        <label for="ingredient">Ingredient:</label>
        <!-- <input type="text" name="ingredient" id="ingredient" value="<?= htmlspecialchars($kq1['ingredient']) ?>"
            required><br> -->
        <textarea class="form-control" name="ingredient" id="ingredient" rows="12" value="<?= htmlspecialchars($kq1['ingredient']) ?>"></textarea>
        <label for="howdoit">How Do It:</label>
        <!-- <input type="text" name="howdoit" id="howdoit" value="<?= htmlspecialchars($kq1['howdoit']) ?>" required><br> -->
        <textarea class="form-control" name="howdoit" id="howdoit" rows="12" value="<?= htmlspecialchars($kq1['howdoit']) ?>"></textarea>
        <input type="hidden" name="recipe_id" value="<?= htmlspecialchars($kq1['recipe_id']) ?>">
        <input type="submit" name="update" value="Update">
    </form>
    <br>
    <table>
        <tr>
            <th>Recipe ID</th>
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
        <?php
        if (isset($kq) && (count($kq) > 0)) {
            foreach ($kq as $dm) {
                echo '
                        <tr>
                            <td>' . $dm['recipe_id'] . '</td>
                            <td>' . $dm['thumbnail'] . '</td>
                            <td>' . $dm['title'] . '</td>
                            <td>' . $dm['prepare'] . '</td>
                            <td>' . $dm['process'] . '</td>
                            <td>' . $dm['intendedFor'] . '</td>
                            <td>' . $dm['introduction'] . '</td>
                            <td>' . $dm['popularity'] . '</td>
                            <td>' . $dm['aboutatfood'] . '</td>
                            <td>' . $dm['thumbnailhtc'] . '</td>
                            <td>' . $dm['ingredient'] . '</td>
                            <td>' . $dm['howdoit'] . '</td>
                            <td>
                                <a href="index.php?act=updatedishdetailform&recipe_id=' . $dm['recipe_id'] . '">Update</a> | 
                                <a href="index.php?act=deletedishdetail&recipe_id=' . $dm['recipe_id'] . '">Delete</a>
                            </td>
                        </tr>
                    ';
            }
        }
        ?>
    </table>
</section>