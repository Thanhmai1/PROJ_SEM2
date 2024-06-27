// model/dish.php
<?php
function createDish($category_id, $thumbnail, $title) {
    $conn = connectdb();
    $sql = "INSERT INTO dish (category_id, thumbnail, title) VALUES (:category_id, :thumbnail, :title)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':thumbnail', $thumbnail);
    $stmt->bindParam(':title', $title);
    $stmt->execute();
}

function getOneDish($id) {
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, category_id, thumbnail, title FROM dish WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $kq;
}

function updateDish($id, $category_id, $thumbnail, $title) {
    $conn = connectdb();
    $sql = "UPDATE dish SET category_id = :category_id, thumbnail = :thumbnail, title = :title WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':thumbnail', $thumbnail);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function deleteDish($id) {
    $conn = connectdb();
    try {
        $sql = "DELETE FROM dish WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch(PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}

function getAllDishes() {
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, category_id, thumbnail, title FROM dish");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
?>
