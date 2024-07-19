<section>
    <h2>Users</h2>
    <form action="index.php?act=createUserForm" method="post">
        <input type="submit" name="add" value="Add">
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Person Type</th>
            <th>Action</th>
        </tr>
        <?php
            if (isset($users) && (count($users) > 0)) {
                $i = 1;
                foreach ($users as $user) {
                    echo '
                        <tr>
                        <td>'.$i.'</td>
                        <td>'.$user['username'].'</td>
                        <td>'.$user['email'].'</td>
                        <td>'.$user['role'].'</td>
                        <td>'.$user['person_type'].'</td>
                        <td><a href="index.php?act=updateUserForm&id='.$user['id'].'">Update</a> | <a href="index.php?act=deleteUser&id='.$user['id'].'">Delete</a></td>
                        </tr>
                    ';
                    $i++;
                }
            }
        ?>
    </table>
</section>
