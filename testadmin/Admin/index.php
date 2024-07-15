<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/style.css">
</head>
<body>
<?php
session_start();
ob_start();
include "../model/connectdb.php";
include "../model/person_types.php";
include "../model/dish.php";
include "../model/dish_detail.php";
include "../model/menu.php";
connectdb();
include "view/header.php";

if (isset($_GET["act"])) {
    switch ($_GET["act"]) {
        // person_types
        case "person_types":
            $kq = getall_dm();
            include "view/person_types/person_types.php";
            break;
        case "createform":
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["person_types"])) {
                $name = $_POST['person_types'];
                $description = $_POST['description'];
                $bmi_min = $_POST['bmi_min'];
                $bmi_max = $_POST['bmi_max'];
                createform($person_types, $description, $bmi_min, $bmi_max);
                $kq = getall_dm();
                include "view/person_types/person_types.php";
            } else {
                include "view/person_types/createform.php";
            }
            break;
        case "updateform":
            if (isset($_GET["id"])) {
                $id = $_GET['id'];
                $kq1 = getonedm($id);
                $kq = getall_dm();
                include "view/person_types/updateform.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["id"])) {
                $id = $_POST['id'];
                $person_types = $_POST['person_types'];
                $description = $_POST['description'];
                $bmi_min = $_POST['bmi_min'];
                $bmi_max = $_POST['bmi_max'];
                updateform($id, $person_types, $description, $bmi_min, $bmi_max);
                $kq = getall_dm();
                include "view/person_types/person_types.php";
            }
            break;
        case "deletedm":
            if (isset($_GET["id"])) {
                $id = $_GET['id'];                
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
                    $confirm = $_POST['confirm_delete'];
                    if ($confirm === 'yes') {                     
                        deletedm($id);
                    }                    
                    header("Location: index.php?act=person_types");
                    exit();
                } else {                    
                    echo '
                            <div class="confirmation-form">
                                <p>Are you sure you want to delete this item?</p>
                                <form method="post">
                                    <input type="hidden" name="confirm_delete" value="yes">
                                    <button type="submit">Yes</button>
                                </form>
                                <a href="index.php?act=person_types">No</a>
                            </div>
                        ';
                }
            }
            $kq = getall_dm();
            include "view/person_types/person_types.php";
            break;

        // dish
        case "dish":
            $kq = getAllDishes();
            include "view/dish.php";
            break;
        case "createdishform":
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["category_id"])) {
                $category_id = $_POST['category_id'];
                $thumbnail = $_POST['thumbnail'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                createDish($category_id, $thumbnail, $title, $description);
                $kq = getAllDishes();
                include "view/dish.php";
            } else {
                include "view/createdishform.php";
            }
            break;
        case "updatedishform":
            if (isset($_GET["id"])) {
                $id = $_GET['id'];
                $kq1 = getOneDish($id);
                $kq = getAllDishes();
                include "view/updatedishform.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["id"])) {
                $id = $_POST['id'];
                $category_id = $_POST['category_id'];
                $thumbnail = $_POST['thumbnail'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                updateDish($id, $category_id, $thumbnail, $title, $description);
                $kq = getAllDishes();
                include "view/dish.php";
            }
            break;
        case "deletedish":
            if (isset($_GET["id"])) {
                $id = $_GET['id'];
                deleteDish($id);
            }
            $kq = getAllDishes();
            include "view/dish.php";
            break;

        // dish_detail
        case 'dish_detail':
            $kq = getAllDishDetails();
            include 'view/dish_detail.php';
            break;
        case 'createdishdetail':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $recipe_id = $_POST['recipe_id'];
                $thumbnail = $_POST['thumbnail'];
                $title = $_POST['title'];
                $prepare = $_POST['prepare'];
                $process = $_POST['process'];
                $intendedFor = $_POST['intendedFor'];
                $introduction = $_POST['introduction'];
                $popularity = $_POST['popularity'];
                $aboutatfood = $_POST['aboutatfood'];
                $thumbnailhtc = $_POST['thumbnailhtc'];
                $ingredient = $_POST['ingredient'];
                $howdoit = $_POST['howdoit'];
                createDishDetail($recipe_id, $thumbnail, $title, $prepare, $process, $intendedFor, $introduction, $popularity, $aboutatfood, $thumbnailhtc, $ingredient, $howdoit);
                header("Location: index.php?act=dish_detail");
                exit();
            } else {
                include 'view/createdishdetail.php';
            }
            break;


        case 'updatedishdetailform':
            if (isset($_GET["recipe_id"])) {
                $recipe_id = $_GET['recipe_id'];
                $kq1 = getOneDishDetail($recipe_id);
                $kq = getAllDishDetails();
                include "view/updatedishdetailform.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["recipe_id"])) {
                $recipe_id = $_POST['recipe_id'];
                $thumbnail = isset($_POST['thumbnail']) ? $_POST['thumbnail'] : '';
                $title = $_POST['title'];
                $prepare = $_POST['prepare'];
                $process = $_POST['process'];
                $intendedFor = $_POST['intendedFor'];
                $introduction = $_POST['introduction'];
                $popularity = $_POST['popularity'];
                $aboutatfood = $_POST['aboutatfood'];
                $thumbnailhtc = isset($_POST['thumbnailhtc']) ? $_POST['thumbnailhtc'] : '';
                $ingredient = $_POST['ingredient'];
                $howdoit = $_POST['howdoit'];
                updateDishDetail($recipe_id, $thumbnail, $title, $prepare, $process, $intendedFor, $introduction, $popularity, $aboutatfood, $thumbnailhtc, $ingredient, $howdoit);
                $kq = getAllDishDetails();
                include "view/dish_detail.php";
            }
            break;
        case 'deletedishdetail':
            $recipe_id = $_GET['recipe_id'];
            deleteDishDetail($recipe_id);
            header("Location: index.php?act=dish_detail");
            exit(); // Thêm exit() sau khi redirect để ngăn chặn thực thi tiếp
            break;

        // menu
        case 'menu':
            $kq = getAllMenus();
            include 'view/menu.php';
            break;
        case 'createmenuform':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // $category_id = $_POST['category_id'];
                $person_type_id = $_POST['person_type_id'];
                $dish_id = $_POST['dish_id'];
                createMenu($person_type_id, $dish_id);
                header("Location: index.php?act=menu");
            } else {
                include 'view/createmenuform.php';
            }
            break;
        case 'updatemenuform':
            if (isset($_GET["id"])) {
                $id = $_GET['id'];
                $kq1 = getOneMenu($id);
                $kq = getAllMenus();
                include "view/updatemenuform.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["id"])) {
                $id = $_POST['id'];
                // $category_id = $_POST['category_id'];
                $person_type_id = $_POST['person_type_id'];
                $dish_id = $_POST['dish_id'];
                updateMenu($id, $person_type_id, $dish_id);
                $kq = getAllMenus();
                include "view/menu.php";
            }
            break;
        case 'deletemenu':
            $id = $_GET['id'];
            deleteMenu($id);
            header("Location: index.php?act=menu");
            break;
        case 'admin_user':
            header("Location: index.php?act=user_admin");
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
?>
</body>
</html>
