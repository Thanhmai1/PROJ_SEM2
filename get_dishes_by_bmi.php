<?php
include './cndbqunganh.php';

$bmi = $_POST['bmi'];

$sql = "SELECT d.*, c.namecategories AS category_name, pt.person_types AS bmi_category 
        FROM Dish d 
        JOIN Categories c ON d.category_id = c.id
        JOIN Menu m ON d.id = m.dish_id
        JOIN Person_Types pt ON m.person_type_id = pt.id
        WHERE ? BETWEEN pt.bmi_min AND pt.bmi_max";
$stmt = $conn->prepare($sql);
$stmt->bind_param("d", $bmi);
$stmt->execute();
$result = $stmt->get_result();

$dishes = [];
while ($row = $result->fetch_assoc()) {
    $dishes[] = $row;
}

echo json_encode($dishes);
?>
