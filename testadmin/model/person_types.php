<?php
function createform($name, $description, $BMI){
    $conn = connectdb();
    $sql = "INSERT INTO person_types (name, description, BMI) VALUES (:name, :description, :BMI)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':BMI', $BMI);
    $stmt->execute();
}

function getonedm($id){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, name, description, BMI FROM person_types WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $kq; 
}

function updateform($id, $name, $description, $BMI){
    $conn = connectdb();
    $sql = "UPDATE person_types SET name = :name, description = :description, BMI = :BMI WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':BMI', $BMI);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function deletedm($id){
    $conn = connectdb();
    try {
        $sql = "DELETE FROM person_types WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch(PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}

function getall_dm(){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, name, description, BMI FROM person_types");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq ;  
}
?>
