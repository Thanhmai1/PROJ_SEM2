<section>
    <h2>Update Categories</h2>
    <form action="index.php?act=updateform" method="post">
        <label for="person_types">Person Types:</label>
        <input type="text" name="person_types" id="person_types" value="<?=$kq1[0]['person_types']?>" required><br>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?=$kq1[0]['description']?>"><br>
        <label for="bmi_min">BMI Min:</label>
        <input type="text" name="bmi_min" id="bmi_min" value="<?=$kq1[0]['bmi_min']?>"><br>
        <label for="bmi_max">BMI Max:</label>
        <input type="text" name="bmi_max" id="bmi_max" value="<?=$kq1[0]['bmi_max']?>"><br>
        <input type="hidden" name="id" value="<?=$kq1[0]['id']?>">
        <input type="submit" name="update" value="Update">
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
