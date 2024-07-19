<?php
function createUser($username, $email, $password, $role_id, $person_type_id){
    $conn = connectdb();
    $sql = "INSERT INTO user (username, email, password, role_id, person_type_id, created_at, update_at) VALUES (:username, :email, :password, :role_id, :person_type_id, NOW(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->bindParam(':person_type_id', $person_type_id);
    $stmt->execute();
}

function getOneUser($id){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, username, email, role_id, person_type_id FROM user WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUser($id, $username, $email, $role_id, $person_type_id, $password = null){
    $conn = connectdb();
    if ($password) {
        $sql = "UPDATE user SET username = :username, email = :email, role_id = :role_id, person_type_id = :person_type_id, password = :password, updated_at = NOW() WHERE id = :id";
    } else {
        $sql = "UPDATE user SET username = :username, email = :email, role_id = :role_id, person_type_id = :person_type_id, updated_at = NOW() WHERE id = :id";
    }
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->bindParam(':person_type_id', $person_type_id);
    if ($password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashed_password);
    }
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function deleteUser($id){
    $conn = connectdb();
    $sql = "DELETE FROM user WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function getAllUsers(){
    $conn = connectdb();
    $stmt = $conn->prepare("
        SELECT u.id, u.username, u.email, r.name AS role, pt.person_types AS person_type 
        FROM user u 
        LEFT JOIN role r ON u.role_id = r.id 
        LEFT JOIN person_types pt ON u.person_type_id = pt.id
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>