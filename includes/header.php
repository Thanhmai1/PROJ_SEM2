<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="icon" href="images/quicksnacklogo.png" type="images/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="./css/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEQngsV7Zt27NXF@a@ApmYm81iuXoPkF0JwJ8ERdkLPM0" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/search.css">
</head>

<body>
    <div class="sticky">
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #00aaa3">
            <a style="color: #fff;" class="navbar-brand" href="./index.html"><i
                    style="font-family: 'Dancing Script', cursive;">Quick Snack</i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a style="color: #fff;" class="nav-link" href="/index.php">Home <span
                                class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="http://localhost:3000/menu.php">Recipe</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="http://localhost:3000/contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="http://localhost:3000/about.php">About Us</a>
                    </li>
                </ul>
                <form id="search-box">
                    <input type="text" id="search-text" placeholder="Search Food..." required>
                    <button id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="dropdown">
                    <div class="dropdown-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            width="24" height="24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A4.992 4.992 0 0112 20a4.992 4.992 0 016.879-2.196M12 14a5 5 0 100-10 5 5 0 000 10z" />
                        </svg>
                        <?php
                        if (isset($_SESSION['loggedin'])) {
                            $username = $_SESSION['username'];
                            echo $username;
                        } else {
                            echo "Guest";
                        }
                        ?>
                    </div>
                    <div class="dropdown-content">
                        <?php
                        if (isset($_SESSION['loggedin'])) {
                            echo '<a  href="/userDetail/display/userdetail.php">My Account</a>';
                            echo '<a href="#">Send feedback</a>';
                            echo '<a href="/login/logout.php">Logout</a>';
                        } else {
                            echo '<a href="http://localhost:3000/html/login.php">Login</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>