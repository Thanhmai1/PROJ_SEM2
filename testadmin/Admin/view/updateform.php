<section>
    <h2>Update Categories</h2>
    <form action="index.php?act=updateform" method="post">
        <label for="categoriesname">Name:</label>
        <input type="text" name="categoriesname" id="categoriesname" value="<?=$kq1[0]['name']?>" required><br>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?=$kq1[0]['description']?>"><br>
        <label for="BMI">BMI:</label>
        <input type="text" name="BMI" id="BMI" value="<?=$kq1[0]['BMI']?>"><br>
        <input type="hidden" name="id" value="<?=$kq1[0]['id']?>">
        <input type="submit" name="update" value="Update">
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Person Types</th>
            <th>Description</th>
            <th>BMI</th>
            <th>Action</th>
        </tr>
        <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dm) {
                    echo '
                        <tr>
                        <td>'.$i.'</td>
                        <td>'.$dm['name'].'</td>
                        <td>'.$dm['description'].'</td>
                        <td>'.$dm['BMI'].'</td>
                        <td><a href="index.php?act=updateform&id='.$dm['id'].'">Update</a> | <a href="index.php?act=deletedm&id='.$dm['id'].'">Delete</a></td>
                        </tr>
                    ';
                    $i++;
                }
            }
        ?>
    </table>
</section>
