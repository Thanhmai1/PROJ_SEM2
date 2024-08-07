<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/quicksnacklogo.png" type="images/x-icon">
  <title>| Home</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!--link awesome để chèn logo vào-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEQngsV7Zt27NXF@a@ApmYm81iuXoPkF0JwJ8ERdkLPM0" crossorigin="anonymous">
  <!-- <link rel="stylesheet" type="text/css" href="./css/css/bootstrap.css" /> -->
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
    integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
    crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="./css/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="./css/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="./css/css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css">  
  
</head>

<body>
  
<?php include './includes/header.php'; ?>
  <div class="container text-center my-3">
    <h2 style="color: #fbc86b;">Delicious Daily Dish</h2>
    <div class="row mx-auto my-auto justify-content-center">
      <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="col-md-3">
              <a href="">
                <div class="card">
                  <div class="card-img">
                    <img src="https://xbeauty.com.vn/upload/news/54/pudding-hat-chia.jpg"
                      style="width: 400px; height: 160px;" class="img-fluid">
                  </div>
                  <div class="cards-img-overlay img-content "><a href="/recipe/Banana-Chia-Seed-Pudding.html">Banana Chia
                      Seed Pudding</a></div>
                </div>
              </a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="col-md-3">
              <a href="">
                <div class="card">
                  <div class="card-img">
                    <img
                      src="https://cdn.tgdd.vn/Files/2017/03/22/963738/cach-lam-goi-cuon-tom-thit-thom-ngon-cho-bua-com-gian-don-202203021427281747.jpg"
                      style="width: 400px; height: 160px;" class="img-fluid">
                  </div>
                  <div class="cards-img-overlay img-content"><a
                      href="/recipe/Shrimp-and-Pork-Rice-Paper-Rolls.html">Shrimp, Green Apple, And Cbbage Salad</a>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="col-md-3">
              <a href="">
                <div class="card">
                  <div class="card-img">
                    <img src="https://lamsonfood.com/wp-content/uploads/2022/03/khoai-tay-lac-pho-mai.jpg"
                      style="width: 400px; height: 160px;" class="img-fluid">
                  </div>
                  <div class="cards-img-overlay img-content"><a href="/recipe/Seasoned-Fries-with-Cheese.html">Fries With
                      Shaken Cheese</a></div>
                </div>
              </a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="col-md-3">
              <a href="">
                <div class="card">
                  <div class="card-img">
                    <img src="https://beptruong.edu.vn/wp-content/uploads/2013/03/ga-chien-xu.jpg"
                      style="width: 400px; height: 160px;" class="img-fluid">
                  </div>
                  <div class="cards-img-overlay img-content"><a href="/recipe/Fried-Chicken.html">Fried Chicken</a></div>
                </div>
              </a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="col-md-3">
              <a href="/recipe/Tokbokki.html">
                <div class="card">
                  <div class="card-img">
                    <img
                      src="https://cdn.shopify.com/s/files/1/0617/2497/files/cach-lam-tokbokki_a2179426-f894-4dda-a709-52fe9f07d6ab.jpg?v=1636019190"
                      style="width: 400px; height: 160px;" class="img-fluid">
                  </div>
                  <div class="cards-img-overlay img-content"><a href="/recipe/Tokbokki.html">Tokbokki</a></div>
                </div>
              </a>
            </div>
          </div>
          <div class="carousel-item">
            <div class="col-md-3">
              <a href="">
                <div class="card">
                  <div class="card-img">
                    <img src="https://i.ytimg.com/vi/4TRp9tc_SBM/maxresdefault.jpg" style="width: 400px; height: 160px;"
                      class="img-fluid">
                  </div>
                  <div class="cards-img-overlay img-content"><a href="">Fried Crispy Rice </a></div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
      </div>
    </div>
  </div>
  <div class="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="about-img">
            <img src="images/quicksnacklogo.png" alt="Image">

          </div>
        </div>
        <div class="col-lg-6">
          <div class="about-content">
            <div class="section-header">
              <!-- <p>About Us</p> -->
              <h2 style="color: #fbc86b;">Established since 2024</h2>
            </div>
            <div class="about-text">
              <p class="p-div">What sets Quick Snack apart is our commitment to providing not just recipes, but also
                detailed step-by-step instructions, cooking tips, and ingredient substitutes to ensure your culinary
                endeavors are a resounding success. Our user-friendly interface allows you to easily search for recipes,
                save your favorites, and even create personalized meal plans.</p>
              <p class="p-div">But it doesn't stop there - join our vibrant community of food enthusiasts! Share your
                own kitchen adventures, connect with fellow cooks, and discover the latest culinary trends. Whether
                you're a solo cook or part of a family that loves to gather around the table, FlavorfulFeast.com is here
                to elevate your cooking experience.</p>
              <p class="p-div">Embark on a flavorful journey with us at Quick Snack - where the joy of cooking meets the
                art of savoring every bite!</p>
              <a style="color: #fbc86b;" class="btn custom-btn" href="./html/about.html">-> Read More..</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="feature">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-header">
            <!-- <p>Why Choose Us</p> -->
            <h2 style="color: #fbc86b;">Our Key Features</h2>
          </div>
          <div class="feature-text">
            <div class="feature-img">
              <div class="row">
                <div class="col-6">
                  <img height="195px" src="https://sethohler.com/wp-content/uploads/2021/09/banh-gao-han-quoc.jpg"
                    alt="Image">
                </div>
                <div class="col-6">
                  <img height="195px"
                    src="https://cdn.tgdd.vn/Files/2022/01/24/1412588/salad-la-gi-15-mon-salad-dinh-duong-cho-bua-com-gia-dinh-202201241950443123.jpg"
                    alt="Image">
                </div>
                <div class="col-6">
                  <img height="195px" src="https://xbeauty.com.vn/upload/news/54/pudding-hat-chia.jpg" alt="Image">
                </div>
                <div class="col-6">
                  <img height="195px" src="https://beptruong.edu.vn/wp-content/uploads/2013/03/ga-chien-xu.jpg"
                    alt="Image">
                </div>
              </div>
            </div>
            <p>
              Variety is the spice of life, and our recipe reflects that philosophy. From traditional favorites to
              daring, avant-garde creations, we cater to diverse palates and preferences. Gluten-free, vegetarian, or
              indulgent carnivorous delights – our menu is a celebration of culinary diversity, ensuring there's
              something for everyone at our table
            </p>
          </div>
        </div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-5">
          <div class="hihi">
          </div>
          <div class="row">
            <div class="col-sm-7">
              <div class="feature-item">
                <h2 style="color: #fbc86b;">Healthy and Balance</h2>
                <p>
                  Maintaining a healthy and balanced lifestyle is crucial for overall
                </p>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="feature-item">
                <h2 style="color: #fbc86b;">Carefully Selected</h2>
                <p>
                  Elevating your experience with thoughtfully curated choices for excellence and satisfaction.
                </p>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="feature-item">
                <h2 style="color: #fbc86b;">Simple and Easy</h2>
                <p>
                  Simplifying your kitchen journey for quick and delicious meals
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <section class="food_section layout_padding">
      <div class="container">
        <div class="filters-content">
          <div class="heading_container heading_center">
            <h2 style="color: #fbc86b;">
              Our Recipe
            </h2>
          </div>
          <div class="row grid">
            <div class="col-sm-6 col-lg-3 all smoothy">
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
                      Banana Chia Seed Pudding is said to have been around since the early 2000s, when chia seeds began
                      to be favored by people pursuing a healthy lifestyle. This dish quickly became popular on social
                      networking sites and food blogs because of its simplicity, ease of making and high nutritional
                      value.
                    </p>
                    <a href="./recipe/Banana-Chia-Seed-Pudding.html"><button style="border-radius: 10px; border: 0;">See
                        More</button></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3 all healthy">
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
            <div class="col-sm-6 col-lg-3 all filling">
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
            <div class="col-sm-6 col-lg-3 all kid">
              <div class="box">
                <div>
                  <div class="img-box" style="background: url(images/toboki.jpg); background-size: cover;">
                  </div>
                  <div class="detail-box">
                    <h5>
                      Tteokbokki
                    </h5>
                    <p class="p-menu">
                      Tteokbokki is a Korean street food made from Korean rice cake (Tteok) and spicy sauce. The dish
                      has a spicy taste from Korean chili paste, a sweet taste from sugar, and a chewy texture from rice
                      cake. Tteokbokki is a popular dish loved by many people for its delicious taste and affordable
                      price.
                    </p>
                    <a href="./recipe/Tokbokki.html"><button style="border-radius: 10px; border: 0;">See
                        More</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="team">
      <div class="container">
        <div class="section-header text-center">
          <!-- <p>Our Team</p> -->
          <h2 style="color: #fbc86b;">Our Member</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="team-item">
              <div class="team-img">
                <img style="height: 360px;"
                  src=""
                  alt="Image">
                <div class="team-social">
                  <a href=""><i class="fab fa-twitter"></i></a>
                  <a href="https://www.facebook.com/PhDuxng"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://github.com/xUankip"><i class="fab fa-github"></i></a>
                  <a href=""><i class="fab fa-instagram"></i></a>
                </div>
              </div>
              <div class="team-text">
                <h2></h2>
                <p>Team Member</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="team-item">
              <div class="team-img">
                <img style="height: 360px;" src="images/lamphamtruoc.jpg" alt="Image">
                <div class="team-social">
                  <a href=""><i class="fab fa-twitter"></i></a>
                  <a href="https://www.facebook.com/lamphandsome"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://github.com/lamphandsome"><i class="fab fa-github"></i></a>
                  <a
                    href="https://www.instagram.com/__ph.vmlam?fbclid=IwAR3GuEdkrvdnMG0rZCnPDtbCzZt8iVwVBckEcFdGVxSdrR_QrnvOIRpD4rQ"><i
                      class="fab fa-instagram"></i></a>
                </div>
              </div>
              <div class="team-text">
                <h2>Lam Pham</h2>
                <p>Team Member</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="team-item">
              <div class="team-img">
                <img style="height: 360px;" src="https://khafa.org.vn/wp-content/uploads/2021/12/quy-kiem-da-xoa.jpg"
                  alt="Image">
                <div class="team-social">
                  <a href="https://twitter.com/NguynQu04653639"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.facebook.com/anh.trinh.221/"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://github.com/AnkTrink"><i class="fab fa-github"></i></a>
                  <a href="https://www.instagram.com/kwangh_ahn/"><i class="fab fa-instagram"></i></a>
                </div>
              </div>
              <div class="team-text">
                <h2>Quang Anh</h2>
                <p>Team Member</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="team-item">
              <div class="team-img">
                <img style="height: 360px;" src="images/ThanhMai2.jpg" alt="Image">
                <div class="team-social">
                  <a href=""><i class="fab fa-twitter"></i></a>
                  <a href=""><i class="fab fa-facebook-f"></i></a>
                  <a href="https://github.com/Thanhmai1"><i class="fab fa-github"></i></a>
                  <a href=""><i class="fab fa-instagram"></i></a>
                </div>
              </div>
              <div class="team-text">
                <h2>Thanh Mai</h2>
                <p>Team Member</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial Start -->
    <div class="testimonial">
      <div class="container">
        <div class="section-header text-center">
          <h2 style="color: #fbc86b;">Master Chef</h2>
        </div>
        <div class="owl-carousel testimonials-carousel owl-loaded owl-drag">
          <div class="owl-stage-outer">
            <div class="owl-item active" style="width: 380px;">
              <div class="testimonial-item">
                <div class="testimonial-img">
                  <img height="100px" src="images/testimonial-1.jpg" alt="Image">
                </div>
                <p>
                  This recipe is truly remarkable, skillfully harmonizing ingredients to produce a delicious outcome
                  with a touch of simplicity in the cooking method
                </p>
                <h2>Julia Child</h2>
                <h3>Master Chef</h3>
              </div>
            </div>
            <div class="owl-item active center" style="width: 380px;">
              <div class="testimonial-item">
                <div class="testimonial-img">
                  <img height="100px" src="images/testimonial-2.jpg" alt="Image">
                </div>
                <p>
                  This culinary creation stands out for its exceptional recipe, seamlessly blending ingredients to yield
                  a delightful taste and simplicity in preparation
                </p>
                <h2>Gordon Ramsay</h2>
                <h3>Master Chef</h3>
              </div>
            </div>
            <div class="owl-item active" style="width: 380px;">
              <div class="testimonial-item">
                <div class="testimonial-img">
                  <img height="100px" src="images/testimonial-3.jpg" alt="Image">
                </div>
                <p>
                  An outstanding culinary formula, skillfully intertwining ingredients to create a flavorful
                  masterpiece, while ensuring ease and simplicity in the cooking process.
                </p>
                <h2>Giada De Lảuentiis</h2>
                <h3>Master Chef</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial End -->
</body>
<!-- <div class="container-fluid"> -->
<!-- Footer -->
<?php include'./includes/footer.php'; ?>
<!-- </div> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="./js/index.js"></script>
<script src="/js/preheader.js"></script>
<script src="/js/js/main.js"></script>
<script src="/js/js/owl.carousel.min.js"></script>
<script src="/js/js/owl.carousel.js"></script>

</html>