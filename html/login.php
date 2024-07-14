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
    <a href="http://localhost:3000/index.php">
        <img class="logo" src="../images/quicksnacklogo.png" alt="Quick Snack Logo">
    </a>
    <section>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="/login/sign_up.php" method="post">
                    <h1>Sign Up</h1>
                    <div class="social-container">
                        <a href="https://www.facebook.com/" class="text-white me-4">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/">
                            <i class="fa-brands fa-square-instagram"></i>
                        </a>
                        <a href="https://twitter.com/?lang=vi">
                            <i class="fa-brands fa-square-x-twitter"></i>
                        </a>
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
                            oninput="setCustomValidity('')" title="Email: the email contains '@'. Example: info@ros-bv.nl" />
                    </label>
                    <label class="form-group">
                        <div class="input-group">
                            <input type="password" placeholder="Password" id="password" autocomplete="off"
                                name="password" class="form-control" required
                                oninvalid="this.setCustomValidity('Password is required')"
                                oninput="setCustomValidity('')" title="Password: enter a valid password" minlength="8" />
                            <div class="input-group-append">
                                <a class="toggle-password" type="button" >
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </label>
                    <label class="form-group">
                        <div class="input-group">
                            <input type="password" placeholder="Confirm Password" id="confirm_password"
                                autocomplete="off" name="confirm_password" class="form-control" required
                                oninvalid="this.setCustomValidity('Confirm password is required')"
                                oninput="setCustomValidity('')" title="Password: enter a valid password" />
                            <div class="input-group-append">
                                <a class="toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </label>
                    <button value="submit" type="submit" class="submit-btn">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="../login/sign_in.php" method="post">
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="https://www.facebook.com/">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/">
                            <i class="fa-brands fa-square-instagram"></i>
                        </a>
                        <a href="https://twitter.com/?lang=vi">
                            <i class="fa-brands fa-square-x-twitter"></i>
                        </a>
                    </div>
                    <span>Sign in with E-Mail Address</span>
                    <label>
                        <input type="text" placeholder="Name" name="name" id="name" required
                            oninvalid="this.setCustomValidity('Name is required')" oninput="setCustomValidity('')"  />
                    </label>
                    <label class="form-group">
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="password" id="password" required
                                oninvalid="this.setCustomValidity('Password is required')"
                                oninput="setCustomValidity('')"/>
                            <div class="input-group-append">
                                <a class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </label>
                    <a href="#">Forgot your password?</a>
                    <button type="submit" value="submit" class="submit-btn">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Log in</h1>
                        <p>Sign in here if you already have an account</p>
                        <button class="ghost" id="signIn">Sign In</button>
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
        <a href="../index.php"><button class="Home">Home</button></a>
    </div>
    <script src="../js/login.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.toggle-password').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var passwordInput = this.closest('.input-group').querySelector('input');
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        this.innerHTML = '<i class="fa fa-eye-slash"></i>';
                    } else {
                        passwordInput.type = 'password';
                        this.innerHTML = '<i class="fa fa-eye"></i>';
                    }
                });
            });
        });
    </script>
</body>

</html>
