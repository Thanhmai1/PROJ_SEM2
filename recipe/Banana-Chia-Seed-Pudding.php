<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_sem2"; // Đổi tên cơ sở dữ liệu cho phù hợp

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy bài viết cụ thể từ cơ sở dữ liệu
$recipe_id = 1; // Bạn có thể thay đổi ID bài viết theo nhu cầu
$sql = "SELECT * FROM dish_detail WHERE recipe_id = $recipe_id";
$result = $conn->query($sql);

// Kiểm tra xem truy vấn có trả về kết quả không
if ($result->num_rows > 0) {
    // Lấy dữ liệu của bài viết
    $row = $result->fetch_assoc();
} else {
    die("No data found.");
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <title>Quick Snack Recipe Details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/quicksnacklogo.png" type="images/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--link awesome để chèn logo vào-->
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

<body>
    <div class="sticky">
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
    </div>
    <hr>


    <!-- Single Post Start-->
    <div class="single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content">
                        <?php
                        // Kiểm tra và hiển thị hình ảnh từ cơ sở dữ liệu
                        if (isset($row["thumbnail"])) {
                            $imageURL = htmlspecialchars($row["thumbnail"]);
                            echo "<img src='$imageURL' alt='Recipe Image' />";
                        } else {
                            echo "No image available.";
                        }
                        ?>
                        <div class="ready">
                            <span>
                                <b>Prepare</b>
                                <br>
                                <?php
                                if (isset($row["prepare"])) {
                                    echo htmlspecialchars($row["prepare"]);
                                } else {
                                    echo "N/A";
                                }
                                ?>
                            </span>
                            <span class="span-2">
                                <b>Process</b>
                                <br>
                                <?php
                                if (isset($row["process"])) {
                                    echo htmlspecialchars($row["process"]);
                                } else {
                                    echo "N/A";
                                }
                                ?>
                            </span>
                            <span class="span-3">
                                <b>Intended For</b>
                                <br>
                                <?php
                                if (isset($row["intendedFor"])) {
                                    echo htmlspecialchars($row["intendedFor"]);
                                } else {
                                    echo "N/A";
                                }
                                ?>
                            </span>
                        </div>
                        <br>
                        <h2 style="text-align: center;">Conduct Simple Banana Chia Seed Pudding Making at Home</h2>
                        <br>
                        <h3>| About at a Glance Banana Chia Seed Pudding</h3>
                        <br>
                        <p>
                            <?php
                            if (isset($row["introduction"])) {
                                echo nl2br(htmlspecialchars($row["introduction"]));
                            } else {
                                echo "No introduction available.";
                            }
                            ?>
                        </p>
                        <p>
                            <u><b>Popularity</b></u>:
                        <ul>
                            <?php
                            if (isset($row["popularity"])) {
                                $popularityItems = explode("\n", $row["popularity"]);
                                foreach ($popularityItems as $item) {
                                    echo "<li>" . htmlspecialchars($item) . "</li>";
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
                                    echo "<li>" . htmlspecialchars($item) . "</li>";
                                }
                            } else {
                                echo "<li>No about-at-food information available.</li>";
                            }
                            ?>
                        </ul>

                        <h4>2. How To Cook</h4>
                        <h5>_ Cooking Ingredients Include:</h5>
                        <img src="https://cdn.tgdd.vn/2020/12/content/1111-800x429.jpg" alt="">
                        <div class="container-ingredients">
                            <ul>
                                <?php
                                if (isset($row["ingredient"])) {
                                    $ingredientItems = explode("\n", $row["ingredient"]);
                                    foreach ($ingredientItems as $item) {
                                        echo "<li>" . htmlspecialchars($item) . "</li>";
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
                                echo "<ol start=\"" . ($index + 1) . "\"><li>" . htmlspecialchars($item) . "</li></ol>";
                            }
                        } else {
                            echo "<ol><li>No how-to information available.</li></ol>";
                        }
                        ?>
                        <br>
                        <!-- <h6><b>Tips:</b></h6>
                        <ol>
                            <li>You can substitute milk with plant-based milk such as almond milk, soy milk, or oat
                                milk.</li>
                            <li>You can adjust the amount of honey or sugar to taste.</li>
                            <li>You can add other nuts such as almonds or walnuts to the pudding mixture for extra
                                flavor and nutrition.</li>
                            <li>Banana chia seed pudding can be stored in the refrigerator for up to 3 days.</li>
                        </ol> -->
                        <br>
                        <center>
                            <h2>🎉GOOD LUCK🎉</h2>
                        </center>
                    </div>

                    <div class="single-bio">
                        <div class="single-bio-img">
                            <img
                                src="https://vcdn1-giaitri.vnecdn.net/2023/04/29/edsheeran1-1682736968-2694-1682737066.png?w=500&h=300&q=100&dpr=2&fit=crop&s=b3maUedzEKGZx_GYYctj4A" />
                        </div>
                        <div class="single-bio-text">
                            <h3>Ed Sheeran</h3>
                            <p>
                                Indulge in a healthy and satisfying snack or dessert with this quick and easy recipe for
                                Banana Chia Seed Pudding! So, whip up this delicious Banana Chia Seed Pudding and
                                experience its refreshing taste and health benefits! &#10084;.
                            </p>
                        </div>
                    </div>
                    <div class="single-related">
                        <h2>Related Post</h2>
                        <div class="owl-carousel related-slider">
                            <div class="post-item">
                                <div class="post-img">
                                    <a href="./Banana-Chia-Seed-Pudding.html"><img
                                            src="https://xbeauty.com.vn/upload/news/54/pudding-hat-chia.jpg" /> </a>
                                </div>
                                <div class="post-text">
                                    <a href="./Banana-Chia-Seed-Pudding.html">Banana Chia Seed Pudding</a>
                                    <div class="post-meta">
                                        <p>By<a href="">Son Tung</a></p>
                                        <p>In<a href="">Web Design</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="post-img">
                                    <a href="./Deep-fried-Elderberry.html"><img
                                            src="https://cdn.tgdd.vn/2021/07/CookProduct/pastedimage0(1)-1200x676.jpg" />
                                    </a>
                                </div>
                                <div class="post-text">
                                    <a href="/Deep-fried-Elderberry.html">Deep-fried Elderberry</a>
                                    <div class="post-meta">
                                        <p>By<a href="">Doja</a></p>
                                        <p>In<a href="">Web Design</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="post-img">
                                    <a href="/Oat-cookies.html"><img
                                            src="https://cdn.tgdd.vn/Files/2021/07/26/1370892/cach-lam-banh-quy-keto-yen-mach-chuoi-don-gian-thom-ngon-bo-duong-202107261555234258.jpg" />
                                    </a>
                                </div>
                                <div class="post-text">
                                    <a href="./Oat-cookies.html">Oat Cookies</a>
                                    <div class="post-meta">
                                        <p>By<a href="">Katty Perry</a></p>
                                        <p>In<a href="">Web Design</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="post-img">
                                    <a href="./Sweet-potato-crisps.html"><img
                                            src="https://cdn.tgdd.vn/2021/10/CookDishThumb/cach-lam-khoai-lang-ken-thumb-620x620-4.jpg" />
                                    </a>
                                </div>
                                <div class="post-text">
                                    <a href="./Sweet-potato-crisps.html">Sweet potato crisps</a>
                                    <div class="post-meta">
                                        <p>By<a href="">Big Bang</a></p>
                                        <p>In<a href="">Web Design</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-comment">
                        <hr>
                        <h2>3 Comments </h2>
                        <hr>
                        <ul class="comment-list">
                            <li class="comment-item">
                                <div class="comment-body">
                                    <div class="comment-img">
                                        <img
                                            src="https://scontent.fhan2-4.fna.fbcdn.net/v/t39.30808-1/319316314_5347058698736190_2892005646620745536_n.jpg?stp=dst-jpg_p200x200&_nc_cat=103&ccb=1-7&_nc_sid=5740b7&_nc_ohc=AA24h1WK-o0AX8MGdHh&_nc_oc=AQnq2jL68PcF_3wWb2JWjj3GxpJJswvZqJrXZsRZgh_cRTZdHefo6jFHK3pXVVpaMkU&_nc_ht=scontent.fhan2-4.fna&oh=00_AfDSllVed4eQKBPfnxJWzw2DPxqQiETnD26IR6gcCgtSqA&oe=65E8B14B" />
                                    </div>
                                    <div class="comment-text">
                                        <h3><a href="https://github.com/xUankip">xUankip</a></h3>
                                        <span>01 Jan 2045 at 12:00pm</span>
                                        <p>
                                            My name is Xuan. I come from Team 1 | QuickSnack
                                        </p>
                                        <a class="btn" href="">Reply</a>
                                    </div>
                                </div>
                            </li>
                            <li class="comment-item">
                                <div class="comment-body">
                                    <div class="comment-img">
                                        <img
                                            src="https://scontent.fhan2-3.fna.fbcdn.net/v/t39.30808-1/416903533_3711006252553562_4072472987846089312_n.jpg?stp=c0.0.200.200a_dst-jpg_p200x200&_nc_cat=109&ccb=1-7&_nc_sid=5740b7&_nc_ohc=WnUF0nAh5SwAX_-Udo6&_nc_ht=scontent.fhan2-3.fna&oh=00_AfAMnQ7juCTVPHjhdmXkD0vdP0f8PiFEUPYkrqqFCBq30g&oe=65E92034" />
                                    </div>
                                    <div class="comment-text">
                                        <h3><a href="https://github.com/lamphandsome">lamphandsome</a></h3>
                                        <p><span>21 Feb 2004 at 12:01pm</span></p>
                                        <p>
                                            My name is Lam Pham. I come from Team 1 | QuickSnack
                                        </p>
                                        <a class="btn" href="">Reply</a>
                                    </div>
                                </div>
                                <ul class="comment-child">
                                    <li class="comment-item">
                                        <div class="comment-body">
                                            <div class="comment-img">
                                                <img
                                                    src="https://scontent.fhan2-3.fna.fbcdn.net/v/t39.30808-1/415558852_687021370245501_6632527841390993160_n.jpg?stp=cp6_dst-jpg_p200x200&_nc_cat=106&ccb=1-7&_nc_sid=5740b7&_nc_ohc=nxcVIdoVE5QAX_kFJK3&_nc_ht=scontent.fhan2-3.fna&oh=00_AfDcZ5PYjLY_LLJiFWN0GNYTTrAWdPf0OW3qZxOhGMmp4Q&oe=65E95D9A" />
                                            </div>
                                            <div class="comment-text">
                                                <h3><a href="https://github.com/quanganh221">Kwangh Ahn</a></h3>
                                                <p><span>22 Jan 2005 at 12:05pm</span></p>
                                                <p>
                                                    My name is Quang Anh. I come from Team 1 | QuickSnack
                                                </p>
                                                <a class="btn" href="">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="comment-form">
                        <h2>Leave a comment</h2>
                        <form>
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn custom-btn">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2 class="widget-title">Recent Post</h2>
                            <div class="recent-post">
                                <div class="post-item">
                                    <div class="post-img">
                                        <a href="#"><img
                                                src="data:image/jpeg;base64,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" /></a>
                                    </div>
                                    <div class="post-text">
                                        <a href="#">Banana Oatmeal Bread</a>
                                        <div class="post-meta">
                                            <p>By<a href="#">xUankip</a></p>
                                            <p>In<a href="#">Web Design</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-img">
                                        <a href="./Tokbokki.html"><img
                                                src="https://sethohler.com/wp-content/uploads/2021/09/banh-gao-han-quoc.jpg" /></a>
                                    </div>
                                    <div class="post-text">
                                        <a href="./Tokbokki.html">Tokbokki</a>
                                        <div class="post-meta">
                                            <p>By<a href="">lamphamhandsome</a></p>
                                            <p>In<a href="">Web Design</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-img">
                                        <a href="./Seasoned-Fries-with-Cheese.html"><img
                                                src="https://cdn.tgdd.vn/Files/2021/08/02/1372502/cach-lam-khoai-tay-lac-pho-mai-thom-ngon-de-lam-202108021531458032.jpg" /></a>
                                    </div>
                                    <div class="post-text">
                                        <a href="./Seasoned-Fries-with-Cheese.html">Seasoned Fries with Cheese</a>
                                        <div class="post-meta">
                                            <p>By<a href="">KwanghAhn</a></p>
                                            <p>In<a href="">Web Design</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-img">
                                        <a href="./Shrimp-and-Pork-Rice-Paper-Rolls.html"><img
                                                src="https://cdn.tgdd.vn/Files/2017/03/22/963738/cach-lam-goi-cuon-tom-thit-thom-ngon-cho-bua-com-gian-don-202203021427281747.jpg" /></a>
                                    </div>
                                    <div class="post-text">
                                        <a href="./Shrimp-and-Pork-Rice-Paper-Rolls.html">Shrimp and Pork Rice Paper
                                            Rolls</a>
                                        <div class="post-meta">
                                            <p>By<a href="">Mia</a></p>
                                            <p>In<a href="">Web Design</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-img">
                                        <a href="./Fried-Chicken.html"><img
                                                src="https://beptruong.edu.vn/wp-content/uploads/2013/03/ga-chien-xu.jpg" /></a>
                                    </div>
                                    <div class="post-text">
                                        <a href="./Fried-Chicken.html">Fried Chicken</a>
                                        <div class="post-meta">
                                            <p>By<a href="">SonTung-MTP</a></p>
                                            <p>In<a href="">Web Design</a></p>
                                        </div>
                                    </div>
                                </div>
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
                            <div class="tab-post">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="featured" class="container tab-pane active">
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="/Smoothy-Socola.html"><img
                                                        src="https://www.bartender.edu.vn/wp-content/uploads/2016/02/socola-da-xay.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="/Smoothy-Socola.html">Smoothy Socola</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">MCK</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Sweet-Potato-Pie-With-Cheese-Filling.html"><img
                                                        src="https://cdn.tgdd.vn/Files/2021/06/29/1364086/cach-lam-banh-khoai-lang-nhan-pho-mai-chien-xu-mem-thom-beo-ngay-202106291025313191.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Sweet-Potato-Pie-With-Cheese-Filling.html">Sweet Potato Pie
                                                    With Cheese Filling</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">TLinh</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a
                                                    href="/Salad-of-shrimp,-green-apple-cabbage-with-roasted-sesame-sauce.html"><img
                                                        src="https://cookbeo.com/media/2020/10/salad-tom/salad-tom-high-resolution.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a
                                                    href="./Salad-of-shrimp,-green-apple-cabbage-with-roasted-sesame-sauce.html">Salad
                                                    of shrimp, green apple, cabbage with roasted sesame sauce</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Wxdie</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Cherry-tomatoes-and-Mozzarella-cheese.html"><img
                                                        src="https://www.ottimacheese.com/images/recipes/Salad_Mozzarella__Mozzarella.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Cherry-tomatoes-and-Mozzarella-cheese.html">Cherry tomatoes
                                                    and Mozzarella cheese</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Binh Gold</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Dumplings.html"><img
                                                        src="https://tasteshare.net/uploads/posts/thumbnails/1580370059001410_BANHBAO_FTIMG.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Dumplings.html">Dumplings</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Andree RightHand</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="popular" class="container tab-pane fade">
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Salad,-Fruit,-Yogurt-Sauce.html"><img
                                                        src="https://cdn.marrybaby.vn/wp-content/uploads/2022/12/nhung-mon-an-healthy-de-lam_1952562595.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Salad,-Fruit,-Yogurt-Sauce.html">Salad, Fruit, Yogurt
                                                    Sauce</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Rhyder</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Sauteed-Chicken-Breast-With-Cabbage.html"><img
                                                        src="https://cdn.marrybaby.vn/wp-content/uploads/2022/12/nhung-mon-an-healthy-de-lam_007.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="/Sauteed-Chicken-Breast-With-Cabbage.html">Sauteed Chicken
                                                    Breast With Cabbage</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Do Mixi</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="/Soursop-Butter-Smoothie.html"><img
                                                        src="https://cdn.tgdd.vn/Files/2022/03/19/1421247/tong-hop-14-cach-lam-sinh-to-trai-cay-mat-lanh-don-gian-tai-nha-202203192221445857.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Soursop-Butter-Smoothie.html">Soursop Butter Smoothie</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Bich Phuong</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Grape-Smoothie.html"><img
                                                        src="https://cdn.tgdd.vn/Files/2022/03/19/1421247/tong-hop-14-cach-lam-sinh-to-trai-cay-mat-lanh-don-gian-tai-nha-202203192318547939.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Grape-Smoothie.html">Grape Smoothie</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Hoa Minzy</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="/Sausage.html"><img
                                                        src="https://muachuannaungon.com/wp-content/uploads/2021/10/Noi-ve-xuc-xich-no-duoc-lam-tu-thit-gia-suc-hoac-gia-cam..png" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Sausage.html">Sausage</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Phuong Ly</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="latest" class="container tab-pane fade">
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Hot-Dog.html"><img
                                                        src="https://cdn.tgdd.vn/Files/2020/03/02/1239549/2-cong-thuc-lam-banh-hotdog-xuc-xich-hotdog-pho-mai-han-quoc-gay-nghien-14-760x367.png" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Hot-Dog.html">Hot Dog</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Hoang Thuy Linh</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Spaghetti.html"><img
                                                        src="https://i-giadinh.vnecdn.net/2022/04/20/Buoc-9-9-3230-1650439557.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Spaghetti.html">Spaghetti</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Min</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Burgers.html"><img
                                                        src="https://www.huongnghiepaau.com/wp-content/uploads/2019/08/banh-mi-kep-thit-nuong-thom-phuc.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Burgers.html">Burgers</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Wren</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Beef-Noodle-Soup.html"><img
                                                        src="https://tiki.vn/blog/wp-content/uploads/2023/07/thumb-12.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Beef-Noodle-Soup.html">Beef Noodle Soup</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Orange</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-item">
                                            <div class="post-img">
                                                <a href="./Stir-Fried-Shrimp-Noodles.html"><img
                                                        src="https://www.thatlangon.com/wp-content/uploads/2020/11/mi-xao-bo-2-e1607316904890.jpg" /></a>
                                            </div>
                                            <div class="post-text">
                                                <a href="./Stir-Fried-Shrimp-Noodles.html">Stir-Fried Shrimp Noodles</a>
                                                <div class="post-meta">
                                                    <p>By<a href="">Faker</a></p>
                                                    <p>In<a href="">Web Design</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image-widget">
                                <a href="#"><img
                                        src="https://i.pinimg.com/736x/3d/3b/20/3d3b207d3274e223bc41b0dde40fa134.jpg"
                                        alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="widget-title">Categories</h2>
                            <div class="category-widget">
                                <ul>
                                    <li><a href="">Healthy</a><span>(4)</span></li>
                                    <li><a href="">For Kid</a><span>(5)</span></li>
                                    <li><a href="">Smoothy</a><span>(6)</span></li>
                                    <li><a href="">Quick Filling</a><span>(7)</span></li>
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
    <!-- Single Post End-->


    <!-- Footer Start -->
    <footer class="text-center text-white" style="background-color: #00aaa3">
        <div class="container">
            <section class="mt-5">
                <div class="row text-center d-flex justify-content-center pt-5">
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="../html/contact.html" class="text-white">Contact</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="../html/about.html" class="text-white">About Us</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="../html/login.html" class="text-white">Login</a>
                        </h6>
                    </div>
                </div>
            </section>

            <hr class="my-5" />

            <section class="mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <p>
                            Welcome to Quick Snack, your go-to online library for a culinary journey like no other! If
                            you're a passionate home chef or someone eager to explore the art of cooking, this website
                            is your one-stop destination for a plethora of mouthwatering recipes and cooking
                            inspiration.
                        </p>
                    </div>
                </div>
            </section>
            <section class="text-center mb-5">
                <a style="text-decoration: none;" href="https://www.facebook.com/lamphandsome" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a style="text-decoration: none;" href="https://twitter.com/?lang=vi" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a style="text-decoration: none;" href="https://www.google.com.vn/?hl=vi" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a style="text-decoration: none;" href="https://www.instagram.com/__ph.vmlam/" class="text-white me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a style="text-decoration: none;" href="https://www.linkedin.com/" class="text-white me-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a style="text-decoration: none;" href="https://github.com/xUankip/Project" class="text-white me-4">
                    <i class="fab fa-github"></i>
                </a>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright: QuickSnack
        </div>
    </footer>

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