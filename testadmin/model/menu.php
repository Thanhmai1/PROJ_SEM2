
<?php
function createMenu($person_type_id, $dish_id) {
    $conn = connectdb();
    $sql = "INSERT INTO menu (person_type_id, dish_id) VALUES (:person_type_id, :dish_id)";
    $stmt = $conn->prepare($sql);
    // $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':person_type_id', $person_type_id);
    $stmt->bindParam(':dish_id', $dish_id);
    $stmt->execute();
}

function getOneMenu($id) {
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, person_type_id, dish_id FROM menu WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $kq;
}

function updateMenu($id, $person_type_id, $dish_id) {
    $conn = connectdb();
    $sql = "UPDATE menu SET person_type_id = :person_type_id, dish_id = :dish_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    // $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':person_type_id', $person_type_id);
    $stmt->bindParam(':dish_id', $dish_id);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function deleteMenu($id) {
    $conn = connectdb();
    try {
        $sql = "DELETE FROM menu WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch(PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}

function getAllMenus() {
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, person_type_id, dish_id FROM menu");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
?>
