<?php
function createDish($category_id, $thumbnail, $title, $description)
{
    $conn = connectdb();
    $sql = "INSERT INTO dish (category_id, thumbnail, title, description) VALUES (:category_id, :thumbnail, :title, :description)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':thumbnail', $thumbnail);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);

    $stmt->execute();
}

function getOneDish($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, category_id, thumbnail, title, description FROM dish WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $kq;
}

function updateDish($id, $category_id, $thumbnail, $title, $description)
{
    $conn = connectdb();
    $sql = "UPDATE dish SET category_id = :category_id, thumbnail = :thumbnail, title = :title, description = :description WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':thumbnail', $thumbnail);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function deleteDish($id)
{
    $conn = connectdb();
    try {
        $sql = "DELETE FROM dish WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}

function getAllDishes()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, category_id, thumbnail, title, description FROM dish");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
?>