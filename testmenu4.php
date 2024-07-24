<?php
// Kiểm tra xem phiên đã được khởi động chưa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/quicksnacklogo.png" type="images/x-icon">
    <title>Recipe</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--link awesome để chèn logo vào-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="styleshee" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../css/about.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEQngsV7Zt27NXF@a@ApmYm81iuXoPkF0JwJ8ERdkLPM0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/css/style.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./filter.css">
    <style>
        .recipe-card {
            width: 300px;
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
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: auto;
            /* Ensures all cards are of equal height */
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

        .btn-custom {
            background-color: #21d7d1 !important;
            border: none !important;
            padding: 5px 10px;
            color: white !important;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-custom:hover {
            background-color: #1ab8b3 !important;
        }

        .button-container {
            text-align: right;
        }

        .button-container2 {
            margin-top: auto;

            text-align: left;


        }

        .btn-primary {
            background-color: #1ab8b3;
        }

        /* Điều chỉnh vị trí nút */
        .btn-box {
            text-align: center;
            /* Căn giữa nút theo chiều ngang */
            margin-top: 20px;
            /* Thêm khoảng cách phía trên nút */
        }

        /* Đảm bảo nút hiển thị ngay sau các món ăn */
        .btn-box a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fbc86b;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-box a:hover {
            background-color: #e5b557;
        }

        /* Ẩn thẻ mà không ảnh hưởng đến bố cục */
        .recipe-card.hidden {
            visibility: hidden;
            position: absolute;
        }
    </style>

</head>
<?php include './includes/header.php'; ?>

<body>
    <!-- food section -->
    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2 style="color: #fbc86b;">
                    Our Recipe
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">All</li>
                <li data-filter=".Healthy">Healthy</li>
                <li data-filter=".Fat-Food">Fat Food</li>
                <li data-filter=".Smoothy">Smoothy</li>
                <li data-filter=".Quick-Filling">Quick Filling</li>
            </ul>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var filterButtons = document.querySelectorAll('.filters_menu li');
                    var recipeCards = document.querySelectorAll('.recipe-card');
                    var viewMoreBtn = document.getElementById('viewMoreBtn');

                    // Hiển thị giới hạn món ăn ban đầu
                    var currentFilter = '*';
                    showLimitedDishes(currentFilter, 6);

                    filterButtons.forEach(function (button) {
                        button.addEventListener('click', function () {
                            var filter = this.getAttribute('data-filter');

                            filterButtons.forEach(function (btn) {
                                btn.classList.remove('active');
                            });
                            this.classList.add('active');

                            currentFilter = filter;
                            showLimitedDishes(filter, 6);
                        });
                    });

                    function showLimitedDishes(filter, limit) {
                        var count = 0;
                        recipeCards.forEach(function (card) {
                            if (filter === '*' || card.classList.contains(filter.substring(1))) {
                                if (count < limit) {
                                    card.style.display = 'inline-block';
                                    card.classList.remove('hidden');
                                } else {
                                    card.style.display = 'none';
                                    card.classList.add('hidden');
                                }
                                count++;
                            } else {
                                card.style.display = 'none';
                                card.classList.add('hidden');
                            }
                        });

                        // Hiển thị nút "View More" nếu có thẻ bị ẩn
                        if (document.querySelectorAll('.recipe-card.hidden').length > 0) {
                            viewMoreBtn.style.display = 'inline-block';
                        } else {
                            viewMoreBtn.style.display = 'none';
                        }
                    }

                    function filterDishes(filter) {
                        var count = 0;
                        recipeCards.forEach(function (card) {
                            if (filter === '*' || card.classList.contains(filter.substring(1))) {
                                card.style.display = 'inline-block';
                                card.classList.remove('hidden');
                                count++;
                            } else {
                                card.style.display = 'none';
                                card.classList.add('hidden');
                            }
                        });

                        // Hiển thị nút "View More" nếu có thẻ bị ẩn
                        if (count > 6) {
                            viewMoreBtn.style.display = 'inline-block';
                        } else {
                            viewMoreBtn.style.display = 'none';
                        }
                    }

                    viewMoreBtn.addEventListener('click', function (event) {
                        event.preventDefault();
                        var hiddenCards = document.querySelectorAll('.recipe-card.hidden');
                        var count = 0;

                        hiddenCards.forEach(function (card) {
                            if (currentFilter === '*' || card.classList.contains(currentFilter.substring(1))) {
                                if (count < 6) {
                                    card.style.display = 'inline-block';
                                    card.classList.remove('hidden');
                                    count++;
                                }
                            }
                        });

                        if (document.querySelectorAll('.recipe-card.hidden').length === 0) {
                            viewMoreBtn.style.display = 'none';
                        }
                    });

                    // Kiểm tra chiều cao và cân nặng
                    var heightInput = document.getElementById('height');
                    var weightInput = document.getElementById('weight');

                    heightInput.addEventListener('input', checkEmptyInputs);
                    weightInput.addEventListener('input', checkEmptyInputs);

                    function checkEmptyInputs() {
                        if (heightInput.value === '' || weightInput.value === '') {
                            showAllDishes();
                        }
                    }

                    function showAllDishes() {
                        recipeCards.forEach(function (card) {
                            card.style.display = 'inline-block';
                            card.classList.remove('hidden');
                        });
                        viewMoreBtn.style.display = 'none';
                    }
                });
            </script>

            <div id="BMI">
                <div class="bmi-calculator">
                    <h2><?php
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        echo $username;
                    } else {
                        echo "";
                    }
                    ?> BMI là</h2>
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

            <script>
                function calculateBMI() {
                    var height = document.getElementById('height').value;
                    var weight = document.getElementById('weight').value;

                    if (height > 0 && weight > 0) {
                        var heightInMeters = height / 100;
                        var bmi = weight / (heightInMeters * heightInMeters);
                        var bmiRounded = bmi.toFixed(2);

                        document.getElementById('result').innerText = "Your BMI is " + bmiRounded;

                        // Lấy các món ăn dựa trên BMI
                        fetch('get_dishes_by_bmi.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'bmi=' + bmiRounded
                        })
                            .then(response => response.json())
                            .then(data => {
                                updateDishes(data);
                            })
                            .catch((error) => {
                                console.error('Error:', error);
                            });

                    } else {
                        document.getElementById('result').innerText = "Please enter valid your height and your weight";
                    }
                }

                function updateDishes(dishes) {
                    var container = document.querySelector('.recipes-container');
                    container.innerHTML = ''; // Xóa nội dung hiện tại

                    if (dishes.length === 0) {
                        container.innerHTML = '<p>Không tìm thấy món ăn nào cho BMI này</p>';
                        return;
                    }

                    dishes.forEach(dish => {
                        var dishHtml = `
                    <div class='recipe-card ${dish.category_class}' style="display: none;">
                        <div class='image-container'>
                            <img src='${dish.thumbnail}' alt='${dish.title}'>
                        </div>
                        <h3>${dish.title}</h3>
                        <p><strong>Danh mục:</strong> ${dish.category_name}</p>
                        <p><strong>Dành cho BMI:</strong> ${dish.bmi_category}</p>
                        <p><strong>Mô tả:</strong> ${dish.description}</p>
                        <div class='button-container2'>
                            <a href='#' class='btn btn-primary'>Xem thêm</a>
                        </div>
                    </div>
                `;
                        container.innerHTML += dishHtml;
                    });

                    // Hiển thị tất cả các món ăn ban đầu
                    showAllDishes();
                }

                // Thêm hàm mới để hiển thị tất cả các món ăn
                function showAllDishes() {
                    var allDishes = document.querySelectorAll('.recipe-card');
                    allDishes.forEach(dish => {
                        dish.style.display = 'inline-block';
                    });
                }

                // Sửa đổi hàm lọc danh mục
                document.addEventListener('DOMContentLoaded', function () {
                    var filterButtons = document.querySelectorAll('.filters_menu li');

                    filterButtons.forEach(function (button) {
                        button.addEventListener('click', function () {
                            var filter = this.getAttribute('data-filter');

                            filterButtons.forEach(function (btn) {
                                btn.classList.remove('active');
                            });
                            this.classList.add('active');

                            var recipeCards = document.querySelectorAll('.recipe-card');
                            recipeCards.forEach(function (card) {
                                if (filter === '*') {
                                    card.style.display = 'inline-block';
                                } else if (card.classList.contains(filter.substring(1))) {
                                    card.style.display = 'inline-block';
                                } else {
                                    card.style.display = 'none';
                                }
                            });
                        });
                    });
                });
            </script>

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
                        echo "<div class='recipes-container'>";
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
                            echo "<p><strong>Category:</strong> " . htmlspecialchars($category, ENT_QUOTES, 'UTF-8') . "</p>";
                            echo "<p><strong>For BMI:</strong> " . htmlspecialchars($bmiCategory, ENT_QUOTES, 'UTF-8') . "</p>";
                            echo "<p><strong>Description:</strong> " . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . "</p>";
                            echo "<div class='button-container2'>";
                            echo "<a href='dish_detail.php?recipe_id=" . htmlspecialchars($recipeId, ENT_QUOTES, 'UTF-8') . "' class='btn btn-primary'>See More</a>";
                            echo "</div>";
                            echo "</div>"; // Đóng thẻ recipe-card
                        }
                        echo "</div>"; // Đóng thẻ recipes-container
                    } else {
                        echo "Không tìm thấy món ăn nào.";
                    }

                    $conn->close();
                }
                ?>
            </div>

            <div class="btn-box">
                <a href="#" id="viewMoreBtn">
                    View More
                </a>
            </div>
        </div>
    </section>



    <?php include './includes/footer.php'; ?>

    <!-- footer section -->

    <!-- jQery -->
    <script src="./js/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <!-- bootstrap js -->
    <script src="./js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="./js/js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
</body>

</html>