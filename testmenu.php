


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
        <li data-filter=".healthy">Healthy</li>
        <li data-filter=".kid">For Kid</li>
        <li data-filter=".smoothy">Smoothy</li>
        <li data-filter=".filling">Quick Filling</li>
      </ul>



      <div id="BMI">
        <div class="bmi-calculator">

          <h2><?php
          if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo $username;
          } else {
            echo "";
          }
          ?> BMI is</h2>
          <div class="input-container">
            <div>
              <label for="height">Height (cm):</label>
              <input type="number" id="height" placeholder="Input Your Height">
            </div>
            <div>
              <label for="weight">Weight (kg):</label>
              <input type="number" id="weight" placeholder="Input Your Weight">
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
          } else {
            document.getElementById('result').innerText = "Please input your height and weight valid!";
          }
        }
      </script>



      <div class="filters-content">
        <div class="row grid">
          <div class="col-sm-6 col-lg-4 all smoothy">
            <div class="box">
              <div>
                <div class="img-box"
                  style="background-image: url(https://xbeauty.com.vn/upload/news/54/pudding-hat-chia.jpg); background-size:cover ;">
                </div>
                <div class="detail-box">
                  <h5>
                    Banana Pudding
                  </h5>
                  <p class="p-menu">
                    Banana Chia Seed Pudding is said to have been around since the early 2000s, when chia seeds began to
                    be favored by people pursuing a healthy lifestyle. This dish quickly became popular on social
                    networking sites and food blogs because of its simplicity, ease of making and high nutritional
                    value.
                  </p>
                  <a href="./recipe/Banana-Chia-Seed-Pudding.html"><button style="border-radius: 10px; border: 0;">See
                      More</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all healthy">
            <div class="box">
              <div>
                <div class="img-box" style="background-image: url(images/Salad.jpg); background-size:cover ;">
                </div>
                <div class="detail-box">
                  <h5>
                    Salad
                  </h5>
                  <p class="p-menu">
                    Green salad is a delicious, nutritious and easy-to-make dish. This dish provides many vitamins,
                    minerals and fiber, which are good for health.
                  </p>
                  <a href="./recipe/Salad.html"><button style="border-radius: 10px; border: 0;">See More</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all kid">
            <div class="box">
              <div>
                <a href="#">
                  <div class="img-box"
                    style="background-image: url(https://beptruong.edu.vn/wp-content/uploads/2013/03/ga-chien-xu.jpg); background-size:cover ;">
                  </div>
                </a>
                <div class="detail-box">
                  <h5>
                    Fried Chicken
                  </h5>
                  <p class="p-menu">
                    Covered with a thick ruffled crust, dotted with beautiful dark brown spots. Inside the crust is
                    ivory-white chicken, soft, juicy, exuding a nasal fragrance. And transformed into countless
                    attractive dishes such as chicken salad, chicken soup, chicken porridge, fried chicken, grilled
                    chicken ... In particular, Fried Chicken is a very popular dish, especially for young children.
                  </p>
                  <a href="./recipe/Fried-Chicken.html"><button style="border-radius: 10px; border: 0;">See
                      More</button></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-4 all kid">
            <div class="box">
              <div>
                <div class="img-box" style="background: url(images/SuaChuaHyLap.jpg); background-size: cover;">
                </div>
                <div class="detail-box">
                  <h5>
                    Greek yogurt
                  </h5>
                  <p class="p-menu">
                    Greek yogurt is a type of yogurt made by straining whey from regular yogurt, resulting in a thicker
                    and creamier product. Greek yogurt has a higher protein content and lower sugar content than regular
                    yogurt.
                  </p>
                  <a href="./recipe/Greek-Yogurt.html"><button style="border-radius: 10px; border: 0;">See
                      More</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all smoothy">
            <div class="box">
              <div>
                <div class="img-box" style="background: url(images/SinhToDau.jpg); background-size: cover;">
                </div>
                <div class="detail-box">
                  <h5>
                    Strawberry smoothie
                  </h5>
                  <p class="p-menu">
                    Strawberry yogurt is a type of yogurt made by straining whey from regular yogurt, resulting in a
                    thicker and creamier product. Greek yogurt has a higher protein content and lower sugar content than
                    regular yogurt.
                  </p>
                  <a href="#"><button style="border-radius: 10px; border: 0;">See More</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all filling">
            <div class="box">
              <div>
                <div class="img-box" style="background: url(images/ComChay.jpg); background-size: cover;">
                </div>
                <div class="detail-box">
                  <h5>
                    Crispy Fried Rice
                  </h5>
                  <p class="p-menu">
                    Crispy Fried Rice is a popular snack loved by many people. The dish has the crispy texture of the
                    rice cake, the savory and sweet taste of the sauce, the spiciness of the chili, and the fragrance of
                    the green onions. Crispy Fried Rice is a simple and easy dish that can be made with readily
                    available ingredients.
                  </p>
                  <a href="#"><button style="border-radius: 10px; border: 0;">See More</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all healthy">
            <div class="box">
              <div>
                <div class="img-box" style="background: url(images/boKho.jpg);background-size: cover;">
                </div>
                <div class="detail-box">
                  <h5>
                    Dried beef
                  </h5>
                  <p class="p-menu">
                    Dried beef is a popular snack loved by many people. This dish has a delicious, chewy taste and can
                    be stored for a long time. Dried beef can be eaten directly or used to make other dishes such as
                    dried beef salad, dried beef
                  </p>
                  <a href="#"><button style="border-radius: 10px; border: 0;">See More</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all kid">
            <div class="box">
              <div>
                <div class="img-box" style="background:url(images/PhoMaiQue.jpg) ;background-size: cover;">
                </div>
                <div class="detail-box">
                  <h5>
                    Fried mozzarella
                  </h5>
                  <p class="p-menu">
                    Fried mozzarella sticks are a delicious, easy-to-make snack that many people love. This dish has a
                    crispy outer shell and a gooey, chewy mozzarella cheese center that stretches when you eat it. Fried
                    mozzarella sticks are often served with ketchup, chili sauce, or mayonnaise.
                  </p>
                  <a href="#"><button style="border-radius: 10px; border: 0;">See More</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all smoothy">
            <div class="box">
              <div>
                <div class="img-box" style="background: url(images/SinhTobo.jpg); background-size: cover;">
                </div>
                <div class="detail-box">
                  <h5>
                    Avocado smoothie
                  </h5>
                  <p class="p-menu">
                    Avocado smoothie is a delicious, nutritious and easy-to-make drink. This smoothie has the creamy
                    avocado flavor, the sweetness of honey and the coolness of ice cubes. Avocado smoothie is a rich
                    source of vitamins, minerals and fiber, which helps to improve health and support weight loss.
                  </p>
                  <a href="#"><button style="border-radius: 10px; border: 0;">See More</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all healthy">
            <div class="box">
              <div>
                <div class="img-box" style="background: url(images/socolaDen.jpg); background-size: cover;">
                </div>
                <div class="detail-box">
                  <h5>
                    Dark chocolate
                  </h5>
                  <p class="p-menu">
                    Dark chocolate is a food made from cocoa. Dark chocolate has a slightly bitter, sweet taste and a
                    delicious aroma. Dark chocolate is rich in antioxidants, good for health. Dark chocolate can help
                    reduce the risk of heart disease, cancer, stroke, and improve memory.
                  </p>
                  <a href="#"><button style="border-radius: 10px; border: 0;">See More</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all filling">
            <div class="box">
              <div>
                <div class="img-box" style="background: url(images/toboki.jpg); background-size: cover;">
                </div>
                <div class="detail-box">
                  <h5>
                    Tteokbokki
                  </h5>
                  <p class="p-menu">
                    Tteokbokki is a Korean street food made from Korean rice cake (tteok) and spicy sauce. The dish has
                    a spicy taste from Korean chili paste, a sweet taste from sugar, and a chewy texture from rice cake.
                    Tteokbokki is a popular dish loved by many people for its delicious taste and affordable price.
                  </p>
                  <a href="/recipe/Tokbokki.html"><button style="border-radius: 10px; border: 0;">See More</button></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 all filling">
            <div class="box">
              <div>
                <div class="img-box" style="background: url(images/KhoaiLangen.jpg); background-size: cover;">
                </div>
                <div class="detail-box">
                  <h5>
                    Picky sweet potatoes
                  </h5>
                  <p class="p-menu">
                    Picky sweet potatoes is a popular snack loved by many, especially children. The dish has the sweet
                    and nutty flavor of sweet potatoes, the crispy texture of the batter, and the deliciousness of chili
                    sauce or tomato sauce.
                  </p>
                  <a href="#"><button style="border-radius: 10px; border: 0;">See More</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="#">
          View More
        </a>
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
              <a href="./html/about.html" class="text-white">About Us</a>
            </h6>
          </div>
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="/menu.php" class="text-white">Recipes</a>
            </h6>
          </div>
        </div>
      </section>

      <hr class="my-5" />

      <section class="mb-5">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <p>
              Welcome to Quick Snack, your go-to online library for a culinary journey like no other! If you're a
              passionate home chef or someone eager to explore the art of cooking, this website is your one-stop
              destination for a plethora of mouthwatering recipes and cooking inspiration.
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
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By QuickSnack
        </p>
      </div>
    </div>
  </footer>
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