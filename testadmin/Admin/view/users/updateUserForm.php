<section>
    <h2>Update User</h2>
    <form action="index.php?act=updateUserForm" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?=$user['username']?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?=$user['email']?>" required><br>
        <label for="password">Password (leave blank to keep current):</label>
        <input type="password" name="password" id="password"><br>
        <label for="role_id">Role:</label>
        <select name="role_id" id="role_id" class="form-select" required>
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role['id'] ?>" <?= $user['role_id'] == $role['id'] ? 'selected' : '' ?>><?= $role['name'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="person_type_id">Person Type:</label>
        <select name="person_type_id" id="person_type_id" class="form-select" required>
            <?php foreach ($person_types as $type): ?>
                <option value="<?= $type['id'] ?>" <?= $user['person_type_id'] == $type['id'] ? 'selected' : '' ?>><?= $type['person_types'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="hidden" name="id" value="<?=$user['id']?>">
        <input type="submit" name="update" value="Update">
    </form>
</section>