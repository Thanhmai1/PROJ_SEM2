<section>
    <h2>Create New User</h2>
    <form action="index.php?act=createUserForm" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="role_id">Role:</label>
        <select name="role_id" id="role_id" class="form-select" required>
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="person_type_id">Person Type:</label>
        <select name="person_type_id" id="person_type_id" class="form-select" required>
            <?php foreach ($person_types as $type): ?>
                <option value="<?= $type['id'] ?>"><?= $type['person_types'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Create">
    </form>
</section>