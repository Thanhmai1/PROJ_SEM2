<?php
function getAllRoles(){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT id, name FROM role");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>