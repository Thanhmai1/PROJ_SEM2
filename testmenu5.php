<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/quicksnacklogo.png" type="images/x-icon">
    <title>Recipe</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEQngsV7Zt27NXF@a@ApmYm81iuXoPkF0JwJ8ERdkLPM0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/css/style.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="/filter.css">
    <style>
        .recipe-card {
            width: 300px;
            height: auto;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            opacity: 1;
            transform: scale(1);
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
            will-change: opacity, transform;
            backface-visibility: hidden;
        }

        .recipe-card.hidden {
            opacity: 0;
            transform: scale(0.8);
            pointer-events: none;
        }

        .image-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .recipe-card h3 {
            margin: 10px 0;
        }

        .recipe-card p {
            margin: 5px 0;
        }

        .button-container {
            text-align: right;
        }

        .btn-custom {
            background-color: #21d7d1 !important;
            border: none !important;
            padding: 5px 10px;
            color: white !important;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-custom:hover {
            background-color: #1ab8b3 !important;
        }

        .recipe-card {
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body>
    <?php include './includes/header.php'; ?>

    <!-- food section -->
    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2 style="color: #fbc86b;">Our Recipe</h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">Tất cả</li>
                <li data-filter=".Healthy">Healthy</li>
                <li data-filter=".Fat-Food">Fat Food</li>
                <li data-filter=".Smoothy">Smoothy</li>
                <li data-filter=".Quick-Filling">Quick Filling</li>
            </ul>

            <div id="BMI">
                <div class="bmi-calculator">
                    <h2>
                        <?php
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            echo $username;
                        } else {
                            echo "";
                        }
                        ?> BMI là
                    </h2>
                    <div class="input-container">
                        <div>
                            <label for="height">Height (cm):</label>
                            <input type="number" id="height" placeholder="Enter Your Height">
                        </div>
                        <div>
                            <label for="weight">Weight (kg):</label>
                            <input type="number" id="weight" placeholder="Enter Your Weight">
                        </div>
                    </div>
                    <div class="button-container">
                        <button onclick="calculateBMI()">Calculate</button>
                        <div class="result" id="result"></div>
                    </div>
                </div>
            </div>

            <div class="recipes-container">
                <?php
                if (!isset($_POST['bmi'])) {
                    include './cndbqunganh.php';

                    $sql = "SELECT d.*, c.namecategories, pt.person_types as bmi_category 
                    FROM Dish d 
                    JOIN Categories c ON d.category_id = c.id
                    JOIN Menu m ON d.id = m.dish_id
                    JOIN Person_Types pt ON m.person_type_id = pt.id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $imageUrl = $row["thumbnail"];
                            $imageName = $row["title"];
                            $category = $row["namecategories"];
                            $bmiCategory = $row["bmi_category"];
                            $description = $row["description"];
                            $recipeId = $row["id"];

                            if (filter_var($imageUrl, FILTER_VALIDATE_URL) === FALSE) {
                                $imageUrl = "path/to/default-image.jpg";
                            }

                            $categoryClass = str_replace(' ', '-', $category);
                            echo "<div class='recipe-card $categoryClass'>";
                            echo "<div class='image-container'>";
                            echo "<img src='" . htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($imageName, ENT_QUOTES, 'UTF-8') . "'>";
                            echo "</div>";
                            echo "<h3>" . htmlspecialchars($imageName, ENT_QUOTES, 'UTF-8') . "</h3>";
                            echo "<p><strong>Danh mục:</strong> " . htmlspecialchars($category, ENT_QUOTES, 'UTF-8') . "</p>";
                            echo "<p><strong>Dành cho BMI:</strong> " . htmlspecialchars($bmiCategory, ENT_QUOTES, 'UTF-8') . "</p>";
                            echo "<p><strong>Mô tả:</strong> " . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . "</p>";
                            echo "<div class='button-container'>";
                            echo "<a href='dish_detail.php?recipe_id=" . htmlspecialchars($recipeId, ENT_QUOTES, 'UTF-8') . "' class='btn btn-primary'>Xem thêm</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "Không tìm thấy món ăn nào.";
                    }

                    $conn->close();
                }
                ?>
            </div>

            <div class="btn-box">
                <a href="#" id="viewMoreBtn">View More</a>
            </div>
        </div>
    </section>
    <!-- end food section -->

    <!-- footer section -->
    <footer class="text-center text-white" style="background-color: #00aaa3">
        <div class="container">
            <section class="mt-5">
                <div class="row text-center d-flex justify-content-center pt-5">
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="./html/contact.html" class="text-white">Contact</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="./html/about.html" class="text-white">About us</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold">
                            <a href="./html/review.html" class="text-white">Review</a>
                        </h6>
                    </div>
                </div>
            </section>

            <hr class="my-5" />

            <section class="mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <p>
                            Welcome to QuickSnacks! Your go-to destination for quick and delicious meals. Whether you're
                            looking for a quick snack, a healthy smoothie, or a satisfying meal, we've got you covered.
                            Our recipes are designed to be easy to make and delicious to eat. Join our community of food
                            lovers and start enjoying QuickSnacks today!
                        </p>
                    </div>
                </div>
            </section>

            <section class="text-center mb-5">
                <a href="" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-github"></i>
                </a>
            </section>
        </div>
    </footer>
    <!-- end footer section -->

    <script>
        // Filtering logic
        const filtersMenu = document.querySelector('.filters_menu');
        const filterItems = document.querySelectorAll('.filters_menu li');
        const recipeCards = document.querySelectorAll('.recipe-card');

        filterItems.forEach(item => {
            item.addEventListener('click', () => {
                // Remove active class from all filter items
                filterItems.forEach(i => i.classList.remove('active'));
                // Add active class to clicked filter item
                item.classList.add('active');

                // Get the filter category
                const filter = item.getAttribute('data-filter');

                // Show/hide recipe cards based on filter category
                recipeCards.forEach(card => {
                    if (filter === '*' || card.classList.contains(filter.substring(1))) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });
    </script>
</body>

</html>