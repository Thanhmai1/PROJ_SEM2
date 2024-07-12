<?php
function getAllDishDetails() {
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM dish_detail");
    $stmt->execute();
    return $stmt->fetchAll();
}
// function getAllDishDetails() {
//     $conn = connectdb();
//     $sql = "SELECT recipe_id, thumbnail, title, prepare, process, intendedFor, introduction, popularity, aboutatfood, thumbnailhtc, ingredient, howdoit FROM dish_detail";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }

function createDishDetail($recipe_id, $thumbnail, $title, $prepare, $process, $intendedFor, $introduction, $popularity, $aboutatfood, $thumbnailhtc, $ingredient, $howdoit) {
    $conn = connectdb();
    $sql = "INSERT INTO dish_detail (recipe_id, thumbnail, title, prepare, process, intendedFor, introduction, popularity, aboutatfood, thumbnailhtc, ingredient, howdoit) VALUES (:recipe_id, :thumbnail, :title, :prepare, :process, :intendedFor, :introduction, :popularity, :aboutatfood, :thumbnailhtc, :ingredient, :howdoit)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':recipe_id', $recipe_id);
    $stmt->bindParam(':thumbnail', $thumbnail);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':prepare', $prepare);
    $stmt->bindParam(':process', $process);
    $stmt->bindParam(':intendedFor', $intendedFor);
    $stmt->bindParam(':introduction', $introduction);
    $stmt->bindParam(':popularity', $popularity);
    $stmt->bindParam(':aboutatfood', $aboutatfood);
    $stmt->bindParam(':thumbnailhtc', $thumbnailhtc);
    $stmt->bindParam(':ingredient', $ingredient);
    $stmt->bindParam(':howdoit', $howdoit);
    
    return $stmt->execute();
}

function getOneDishDetail($recipe_id) {
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM dish_detail WHERE recipe_id = :recipe_id");
    $stmt->bindParam(':recipe_id', $recipe_id);
    $stmt->execute();
    return $stmt->fetch();
}

function updateDishDetail($recipe_id, $thumbnail, $title, $prepare, $process, $intendedFor, $introduction, $popularity, $aboutatfood, $thumbnailhtc, $ingredient, $howdoit) {
    $conn = connectdb();
    $sql = "UPDATE dish_detail SET thumbnail = :thumbnail, title = :title, prepare = :prepare, process = :process, intendedFor = :intendedFor, introduction = :introduction, popularity = :popularity, aboutatfood = :aboutatfood, thumbnailhtc = :thumbnailhtc, ingredient = :ingredient, howdoit = :howdoit WHERE recipe_id = :recipe_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':recipe_id', $recipe_id);
    $stmt->bindParam(':thumbnail', $thumbnail);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':prepare', $prepare);
    $stmt->bindParam(':process', $process);
    $stmt->bindParam(':intendedFor', $intendedFor);
    $stmt->bindParam(':introduction', $introduction);
    $stmt->bindParam(':popularity', $popularity);
    $stmt->bindParam(':aboutatfood', $aboutatfood);
    $stmt->bindParam(':thumbnailhtc', $thumbnailhtc);
    $stmt->bindParam(':ingredient', $ingredient);
    $stmt->bindParam(':howdoit', $howdoit);
    
    return $stmt->execute();
}

function deleteDishDetail($recipe_id) {
    $conn = connectdb();
    $stmt = $conn->prepare("DELETE FROM dish_detail WHERE recipe_id = :recipe_id");
    $stmt->bindParam(':recipe_id', $recipe_id);
    return $stmt->execute();
}
?>
