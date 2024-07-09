<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
    <h2>Dish Details</h2>
    <!-- <form action="index.php?act=createdishdetail" method="post">
        <input type="submit" name="add" value="Add Dish Detail">
    </form> -->
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
        <div class="dish-details">
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
        </div>
    </table>
</section>

<section>
    <h2>Create New Dish Detail</h2>

    <form action="index.php?act=createdishdetail" method="post">
        <label for="recipe_id">Recipe ID:</label>
        <input type="text" name="recipe_id" id="recipe_id" required><br>
        <!-- <label for="thumbnail">Thumbnail:</label>
        <input type="text" name="thumbnail" id="thumbnail" required><br> -->
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
        <!-- <input type="text" name="popularity" id="popularity" required><br> -->
        <textarea class="form-control" name="popularity" id="popularity" rows="12"></textarea>
        <label for="aboutatfood">About at Food:</label>
        <textarea class="form-control" name="aboutatfood" id="aboutatfood" rows="12"></textarea>
        <!-- <label for="thumbnailhtc">Thumbnail HTC:</label>
        <input type="text" name="thumbnailhtc" id="thumbnailhtc" required><br> -->
        <div class="mb-3">
            <label for="thumbnailhtc" class="form-label">Thumbnail HTC</label>
            <input class="form-control" type="file" name="thumbnailhtc" id="thumbnailhtc" multiple>
        </div>
        <label for="ingredient">Ingredient:</label>
        <textarea class="form-control" name="ingredient" id="ingredient" rows="12"></textarea>
        <label for="howdoit">How Do It:</label>
        <textarea class="form-control" name="howdoit" id="howdoit" rows="12"></textarea>
        <input type="submit" value="Create">
        <!-- <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            <textarea class="form-control" name="recipe_id" id="recipe_id" rows="12"></textarea>
        </div> -->
    </form>
</section>
</body>
</html>
