<?php
function createform($person_types, $description, $bmi_min,$bmi_max){
    $conn = connectdb();
    $sql = "INSERT INTO person_types (person_types, description, bmi_min, bmi_max) VALUES (:person_types, :description, :bmi_min, :bmi_max)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':person_types', $person_types);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':bmi_min', $bmi_min);
    $stmt->bindParam(':bmi_max', $bmi_max);
    $stmt->execute();
}

function getonedm($id){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, person_types, description, bmi_min, bmi_max FROM person_types WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $kq; 
}

function updateform($id, $person_types, $description, $bmi_min, $bmi_max){
    $conn = connectdb();
    $sql = "UPDATE person_types SET person_types = :person_types, description = :description, bmi_min = :bmi_min, bmi_max = :bmi_max WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':person_types', $person_types);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':bmi_min', $bmi_min);
    $stmt->bindParam(':bmi_max', $bmi_max);
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
    $stmt = $conn->prepare("SELECT id, person_types, description, bmi_min, bmi_max FROM person_types");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq ;  
}
?>
