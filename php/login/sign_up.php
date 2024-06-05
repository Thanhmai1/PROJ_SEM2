<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="styleshee" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEQngsV7Zt27NXF@a@ApmYm81iuXoPkF0JwJ8ERdkLPM0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/css/style.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<div class="sticky">
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #00aaa3">
        <a style="color: #fff;" class="navbar-brand" href="/index.html"><i style="font-family: 'Dancing Script', cursive;">Quick Snack</i></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a style="color: #fff;" class="nav-link" href="../index.html">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
            <a style="color: #fff;" class="nav-link" href="../menu.html">Recipe</a>
            </li>
            <li class="nav-item">
            <a style="color: #fff;" class="nav-link" href="./contact.html">Contact</a>
            </li>
            <li class="nav-item">
            <a style="color: #fff;" class="nav-link" href="./about.html">About Us</a>
            </li>
            <li class="nav-item">
            <a style="color: #fff;" class="nav-link" href="/html/login.html">Login</a>
            </li>
          </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
    </nav>
</div>
<body>
<?php
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project_sem2";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }                        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hash_password = md5($password);

        $ps = $conn->prepare("INSERT INTO users (UserName, Email, `Password`) VALUES ( ?, ?, ?)");
        $ps->bind_param("sss", $name, $email, $hash_password);
        if ($ps->execute()) {
          echo '<script>alert("SIGN UP SUCCESSFULL!"); window.location.href = "http://localhost:3000/html/login.html";</script>';
          exit;
        }             
        $ps->close();    
        $conn->close();
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
    ?>
     <footer class="text-center text-white" style="background-color: #00aaa3">
    <div class="container">
      <section class="mt-5">
        <div class="row text-center d-flex justify-content-center pt-5">
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="./contact.html" class="text-white">Contact</a>
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
              Welcome to Quick Snack, your go-to online library for a culinary journey like no other! If you're a passionate home chef or someone eager to explore the art of cooking, this website is your one-stop destination for a plethora of mouthwatering recipes and cooking inspiration.
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
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
      © 2024 Copyright: QuickSnack
    </div>
  </footer>
</body>
</html>