<?php
include './cndbqunganh.php';

$offset = $_POST['offset'];
$limit = 5;

$sql = "SELECT d.*, c.namecategories, pt.person_types as bmi_category 
        FROM Dish d 
        JOIN Categories c ON d.category_id = c.id
        JOIN Menu m ON d.id = m.dish_id
        JOIN Person_Types pt ON m.person_type_id = pt.id
        LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();

$dishes = [];
while ($row = $result->fetch_assoc()) {
    $dishes[] = $row;
}

echo json_encode($dishes);
?>
