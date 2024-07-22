<?php
/*
// Kết nối đến cơ sở dữ liệu
$host = 'localhost';
$db = 'project_sem2';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // Truy vấn dữ liệu từ bảng Dish_Detail
    $recipe_id = 1; // ID của công thức mà bạn muốn lấy
    $stmt = $pdo->prepare("SELECT * FROM Dish_Detail WHERE recipe_id = ?");
    $stmt->execute([$recipe_id]);

    if ($stmt->rowCount() > 0) {
        // Lấy dữ liệu
        $row = $stmt->fetch();
    } else {
        echo "No results found.";
    }
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
*/


include './cndbqunganh.php'; // Kết nối đến cơ sở dữ liệu

if (isset($_GET['recipe_id'])) {
    $recipe_id = intval($_GET['recipe_id']);

    $sql = "SELECT * FROM Dish_Detail WHERE recipe_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "There are no dishes with valid recipe_id.";
        exit();
    }

    // Recent Post
    $sql_recent = "SELECT * FROM Dish ORDER BY id DESC LIMIT 5";
    $result_recent = $conn->query($sql_recent);

    if ($result_recent && $result_recent->num_rows > 0) {
        $recent_posts = $result_recent->fetch_all(MYSQLI_ASSOC);
    } else {
        $recent_posts = [];
    }

    // Categories
    $sql_categories = "
    SELECT c.id, c.namecategories, COUNT(d.id) AS dish_count
    FROM Categories c
    LEFT JOIN Dish d ON c.id = d.category_id
    GROUP BY c.id, c.namecategories
";
    $result_categories = $conn->query($sql_categories);

    if ($result_categories && $result_categories->num_rows > 0) {
        $categories = $result_categories->fetch_all(MYSQLI_ASSOC);
    } else {
        $categories = [];
    }

    $stmt->close();
    $conn->close();
} else {
    echo "There is no valid recipe_id.";
    exit();
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Quick Snack Recipe Details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="../images/quicksnacklogo.png" type="images/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEQngsV7Zt27NXF@a@ApmYm81iuXoPkF0JwJ8ERdkLPM0" crossorigin="anonymous">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/recipe.css">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/css/style.css">
</head>
<?php include './includes/header.php'; ?>

<body>
    <!-- <div class="sticky">
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #00aaa3">
            <a style="color: #fff;" class="navbar-brand" href="../index.html"><i
                    style="font-family: 'Dancing Script', cursive;">Quick Snack</i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a style="color: #fff;" class="nav-link" href="../index.html">Home <span
                                class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../menu.html">Recipe</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../html/contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../html/about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../html/login.html">Login</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div> -->
    <hr>


    <!-- Single Post Start-->
    <div class="single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content">
                        <img src="<?php echo htmlspecialchars($row['thumbnail'], ENT_QUOTES, 'UTF-8'); ?>"
                            alt="Thumbnail" />
                        <div class="ready">
                            <span>
                                <b>Prepare</b>
                                <br>
                                <?php echo htmlspecialchars($row['prepare'], ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                            <span class="span-2">
                                <b>Process</b>
                                <br>
                                <?php echo htmlspecialchars($row['process'], ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                            <span class="span-3">
                                <b>Intended For</b>
                                <br>
                                <?php echo htmlspecialchars($row['intendedFor'], ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        </div>
                        <br>
                        <h2 style="text-align: center;">
                            <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>
                        </h2>
                        <br>
                        <h3>| About at a Glance</h3>
                        <br>
                        <p>
                            <?php echo nl2br(htmlspecialchars($row['introduction'], ENT_QUOTES, 'UTF-8')); ?>
                        </p>
                        <p>
                            <u><b>Popularity</b></u>:
                        <ul>
                            <?php
                            if (isset($row["popularity"])) {
                                $popularityItems = explode("\n", $row["popularity"]);
                                foreach ($popularityItems as $item) {
                                    echo "<li>" . htmlspecialchars($item, ENT_QUOTES, 'UTF-8') . "</li>";
                                }
                            } else {
                                echo "<li>No popularity information available.</li>";
                            }
                            ?>
                        </ul>
                        </p>

                        <h3>| Recipe and How To Cook</h3>
                        <br>
                        <h4>1. About at a Glance Recipe</h4>
                        <ul>
                            <?php
                            if (isset($row["aboutatfood"])) {
                                $aboutAtFoodItems = explode("\n", $row["aboutatfood"]);
                                foreach ($aboutAtFoodItems as $item) {
                                    echo "<li>" . htmlspecialchars($item, ENT_QUOTES, 'UTF-8') . "</li>";
                                }
                            } else {
                                echo "<li>No about-at-food information available.</li>";
                            }
                            ?>
                        </ul>
                        <h4>2. How To Cook</h4>
                        <h5>_ Cooking Ingredients Include:</h5>
                        <img src="<?php echo htmlspecialchars($row['thumbnailhtc'], ENT_QUOTES, 'UTF-8'); ?>"
                            alt="Ingredients Thumbnail">
                        <div class="container-ingredients">
                            <ul>
                                <?php
                                if (isset($row["ingredient"])) {
                                    $ingredientItems = explode("\n", $row["ingredient"]);
                                    foreach ($ingredientItems as $item) {
                                        echo "<li>" . htmlspecialchars($item, ENT_QUOTES, 'UTF-8') . "</li>";
                                    }
                                } else {
                                    echo "<li>No ingredient information available.</li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <h5>_ How Do It:</h5>
                        <?php
                        if (isset($row["howdoit"])) {
                            $howDoItItems = explode("\n", $row["howdoit"]);
                            foreach ($howDoItItems as $index => $item) {
                                echo "<ol start=\"" . ($index + 1) . "\"><li>" . htmlspecialchars($item, ENT_QUOTES, 'UTF-8') . "</li></ol>";
                            }
                        } else {
                            echo "<ol><li>No how-to information available.</li></ol>";
                        }
                        ?>
                        <br>
                        <center>
                            <h2>🎉GOOD LUCK🎉</h2>
                        </center>
                    </div>
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                        © 2024 Copyright: QuickSnack
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2 class="widget-title">Recent Post</h2>
                            <div class="recent-post">
                                <?php if (!empty($recent_posts)): ?>
                                    <?php foreach ($recent_posts as $post): ?>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./recipe.php?recipe_id=<?php echo $post['id']; ?>">
                                                    <img src="<?php echo htmlspecialchars($post['thumbnail'], ENT_QUOTES, 'UTF-8'); ?>"
                                                        alt="Thumbnail">
                                                </a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./recipe.php?recipe_id=<?php echo $post['id']; ?>">
                                                    <?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No recent posts available.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image-widget">
                                <a href="#"><img
                                        src="https://www.huongnghiepaau.com/wp-content/uploads/2016/10/sinh-to-viet-quat-vua-dep-mat-vua-ngon.jpg"
                                        alt="Blueberry Smoothie"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="widget-title">Categories</h2>
                            <div class="category-widget">
                                <ul>
                                    <?php if (!empty($categories)): ?>
                                        <?php foreach ($categories as $category): ?>
                                            <li>
                                                <a href="./testmenu2/?category_id=<?php echo urlencode($category['id']); ?>">
                                                    <?php echo htmlspecialchars($category['namecategories'], ENT_QUOTES, 'UTF-8'); ?>
                                                </a>
                                                <span>(<?php echo htmlspecialchars($category['dish_count'], ENT_QUOTES, 'UTF-8'); ?>)</span>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li>No categories available.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>



                        <div class="sidebar-widget">
                            <div class="image-widget">
                                <a href="#"><img
                                        src="https://www.avsforum.com/attachments/transformers-rise-of-the-beasts-header-jpeg.3513474/"
                                        alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="widget-title">QuickSnack</h2>
                            <div class="text-widget">
                                <p>
                                    Welcome to Quick Snack, your go-to online library for a culinary journey like no
                                    other! If you're a passionate home chef or someone eager to explore the art of
                                    cooking, this website is your one-stop destination for a plethora of mouthwatering
                                    recipes and cooking inspiration.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>