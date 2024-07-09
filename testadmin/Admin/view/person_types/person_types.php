<section>
    <h2>Categories</h2>
    <form action="index.php?act=createform" method="post">
        <input type="submit" name="add" value="add">
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Person Types</th>
            <th>Description</th>
            <th>BMI Min</th>
            <th>BMI Max</th>
            <th>Action</th>
        </tr>
        <?php
            if (isset($kq) && (count($kq) > 0)) {
                $i = 1;
                foreach ($kq as $dm) {
                    echo '
                        <tr>
                        <td>'.$i.'</td>
                        <td>'.$dm['person_types'].'</td>
                        <td>'.$dm['description'].'</td>
                        <td>'.$dm['bmi_min'].'</td>
                        <td>'.$dm['bmi_max'].'</td>
                        <td><a href="index.php?act=updateform&id='.$dm['id'].'">Update</a> | <a href="index.php?act=deletedm&id='.$dm['id'].'">Delete</a></td>
                        </tr>
                    ';
                    $i++;
                }
            }
        ?>
    </table>
</section>
