<?php
    session_start();
    ob_start();
    include "../model/connectdb.php";
    include "../model/person_types.php";
    include "../model/dish.php";
    include "../model/dish_detail.php";  // Thêm dòng này để include file model dish_detail
    include "../model/menu.php";
    connectdb();
    include "view/header.php";

    if (isset($_GET["act"])) {
        switch ($_GET["act"]) {
            // person_types
            case "person_types":
                $kq = getall_dm();
                include "view/person_types.php";
                break;
            case "createform":
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["name"])) {
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $BMI = $_POST['BMI'];
                    createform($name, $description, $BMI);
                    $kq = getall_dm();
                    include "view/person_types.php";
                } else {
                    include "view/createform.php";
                }
                break;
            case "product":
                include "view/product.php";
                break;
            case "user":
                include "view/user.php";
                break;
            case "updateform":
                if (isset($_GET["id"])) {
                    $id = $_GET['id'];
                    $kq1 = getonedm($id);
                    $kq = getall_dm();
                    include "view/updateform.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["id"])) {
                    $id = $_POST['id'];
                    $name = $_POST['categoriesname'];
                    $description = $_POST['description'];
                    $BMI = $_POST['BMI'];
                    updateform($id, $name, $description, $BMI);
                    $kq = getall_dm();
                    include "view/person_types.php";
                }
                break;
            case "deletedm":
                if (isset($_GET["id"])) {
                    $id = $_GET['id'];
                    deletedm($id);
                }
                $kq = getall_dm();
                include "view/person_types.php";
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
                    createDish($category_id, $thumbnail, $title);
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
                    include "view/updatedishform.php";
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["id"])) {
                    $id = $_POST['id'];
                    $category_id = $_POST['category_id'];
                    $thumbnail = $_POST['thumbnail'];
                    $title = $_POST['title'];
                    updateDish($id, $category_id, $thumbnail, $title);
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
            case 'createdishdetailform':
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
                    exit(); // Thêm exit() sau khi redirect để ngăn chặn thực thi tiếp
                } else {
                    include 'view/createdishdetailform.php';
                }
                break;
            case 'updatedishdetailform':
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
                    updateDishDetail($recipe_id, $thumbnail, $title, $prepare, $process, $intendedFor, $introduction, $popularity, $aboutatfood, $thumbnailhtc, $ingredient, $howdoit);
                    header("Location: index.php?act=dish_detail");
                    exit(); // Thêm exit() sau khi redirect để ngăn chặn thực thi tiếp
                } else {
                    $recipe_id = $_GET['recipe_id'];
                    $kq1 = getOneDishDetail($recipe_id);
                    include 'view/updatedishdetailform.php';
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
                    $category_id = $_POST['category_id'];
                    $person_type_id = $_POST['person_type_id'];
                    $dish_id = $_POST['dish_id'];
                    createMenu($category_id, $person_type_id, $dish_id);
                    header("Location: index.php?act=menu");
                } else {
                    include 'view/createmenuform.php';
                }
                break;
            case 'updatemenuform':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id'];
                    $category_id = $_POST['category_id'];
                    $person_type_id = $_POST['person_type_id'];
                    $dish_id = $_POST['dish_id'];
                    updateMenu($id, $category_id, $person_type_id, $dish_id);
                    header("Location: index.php?act=menu");
                } else {
                    $id = $_GET['id'];
                    $kq1 = getOneMenu($id);
                    include 'view/updatemenuform.php';
                }
                break;
            case 'deletemenu':
                $id = $_GET['id'];
                deleteMenu($id);
                header("Location: index.php?act=menu");
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
