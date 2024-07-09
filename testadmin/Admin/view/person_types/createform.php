<section>
    <h2>Create New Person Types</h2>
    <form action="index.php?act=createform" method="post">
        <label for="person_types">Person Types:</label>
        <input type="text" name="person_types" id="person_types" required><br>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description"><br>
        <label for="bmi_min">BMI Min:</label>
        <input type="text" name="bmi_min" id="bmi_min"><br>
        <label for="bmi_max">BMI Max:</label>
        <input type="text" name="bmi_max" id="bmi_max"><br>
        <input type="submit" value="Create">
    </form>
</section>
