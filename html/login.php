<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" href="../images/quicksnacklogo.png" type="image/x-icon">
</head>

<body>
    <a href="../index.html"><img style="width: 200px; text-align: center;" src="../images/quicksnacklogo.png"
            alt="Quick Snack Logo"></a>
    <section>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="../php/login/sign_up.php" method="post">
                    <h1>Sign Up</h1>
                    <div class="social-container">
                        <a style="text-decoration: none;" href="https://www.facebook.com/" class="text-white me-4">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/"><i class="fa-brands fa-square-instagram"
                                style="color: #000000;"></i></a>
                        <a href="https://twitter.com/?lang=vi"><i class="fa-brands fa-square-x-twitter"
                                style="color: #000000;"></i></a>
                    </div>
                    <span>Sign up with Email</span>
                    <label class="form-group">
                        <input type="text" placeholder="Name" id="name" name="name" autocomplete="off"
                            class="form-control" required oninvalid="this.setCustomValidity('Name is required')"
                            oninput="setCustomValidity('')" title="Name: enter a valid name. Example: Mary" />
                    </label>
                    <label>
                        <input type="email" class="form-control" autocomplete="off" name="email" id="email"
                            placeholder="Email" required oninvalid="this.setCustomValidity('Enter a valid email')"
                            oninput="setCustomValidity('')"
                            title="Email: the email contains '@'. Example: info@ros-bv.nl" />
                    </label>
                    <label>
                        <input type="password" placeholder="Password" id="password" autocomplete="off" name="password"
                            class="form-control" required oninvalid="this.setCustomValidity('Password is required')"
                            oninput="setCustomValidity('')" title="Password: enter a valid password" />
                    </label>
                    <button value="submit" type="submit" style="margin-top: 9px">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="/php/login/sign_in.php" method="post">
                    <form action="/index_logined.php">
                        <h1>Sign in</h1>
                        <div class="social-container">
                            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"
                                    style="color: #000000;"></i></a>
                            <a href="https://www.instagram.com/"><i class="fa-brands fa-square-instagram"
                                    style="color: #000000;"></i></a>
                            <a href="https://twitter.com/?lang=vi"><i class="fa-brands fa-square-x-twitter"
                                    style="color: #000000;"></i></a>
                        </div>
                        <span>Sign in with E-Mail Address</span>
                        <label>
                            <input type="text" placeholder="Name" name="name" id="signin_name" required
                                oninvalid="this.setCustomValidity('Name is required')"
                                oninput="setCustomValidity('')" />
                        </label>
                        <label>
                            <input type="password" placeholder="Password" name="password" id="signin_password" required
                                oninvalid="this.setCustomValidity('Password is required')"
                                oninput="setCustomValidity('')" />
                        </label>
                        <a href="#">Forgot your password?</a>
                        <button type="submit" value="submit">Sign In</button>
                    </form>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Log in</h1>
                        <p>Sign in here if you already have an account</p>
                        <button class="ghost mt-5" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Create Account!</h1>
                        <p>Sign up if you still don't have an account...</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div>
        <a href="../index.html"><button class="Home">Home</button></a>
    </div>
    <script src="../js/login.js"></script>
</body>

</html>