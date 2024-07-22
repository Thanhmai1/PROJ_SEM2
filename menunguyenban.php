<?php
include './cndbqunganh.php';

// Fetch categories
$categories_query = "SELECT * FROM Categories";
$categories_result = $conn->query($categories_query);

// Fetch dishes
$dishes_query = "SELECT d.*, c.namecategories FROM Dish d JOIN Categories c ON d.category_id = c.id";
if (isset($_GET['category'])) {
  $category = $conn->real_escape_string($_GET['category']);
  $dishes_query .= " WHERE c.namecategories = '$category'";
}
$dishes_result = $conn->query($dishes_query);

$conn->close();
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
    <link rel="stylesheet" href="filter.css">
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
                <li class="active" data-filter="*">All</li>
                <?php while ($category = $categories_result->fetch_assoc()): ?>
                <li data-filter=".<?php echo strtolower($category['namecategories']); ?>">
                    <?php echo $category['namecategories']; ?>
                </li>
                <?php endwhile; ?>
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    <?php while ($dish = $dishes_result->fetch_assoc()): ?>
                    <div class="col-sm-6 col-lg-4 all <?php echo strtolower($dish['namecategories']); ?>">
                        <div class="box">
                            <div>
                                <div class="img-box"
                                    style="background-image: url(<?php echo $dish['thumbnail']; ?>); background-size: cover;">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        <?php echo $dish['title']; ?>
                                    </h5>
                                    <p class="p-menu">
                                        <?php echo substr($dish['description'], 0, 100) . '...'; ?>
                                    </p>
                                    <a href="recipe/<?php echo $dish['id']; ?>.php">
                                        <button style="border-radius: 10px; border: 0;">See More</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>


    <!-- end food section -->

    <!-- footer section -->
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
    </script>
</body>

</html>