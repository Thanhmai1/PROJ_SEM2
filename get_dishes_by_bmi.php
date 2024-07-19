<?php
$host = 'localhost';
$db   = 'project_sem2';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['bmi'])) {
    $bmi = floatval($_POST['bmi']);
    
    $sql = "SELECT d.*, pt.person_types as category_name 
            FROM Dish d 
            JOIN Menu m ON d.id = m.dish_id
            JOIN Person_Types pt ON m.person_type_id = pt.id
            WHERE $bmi BETWEEN pt.bmi_min AND pt.bmi_max 
            OR ($bmi < pt.bmi_max AND pt.bmi_min IS NULL) 
            OR ($bmi > pt.bmi_min AND pt.bmi_max IS NULL)";
    
    $result = $conn->query($sql);
    
    if ($result === false) {
        echo json_encode(["error" => $conn->error]);
    } else {
        $dishes = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($dishes);
    }
} else {
    echo json_encode([]);
}

$conn->close();
?>