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
                            <i class="fab fa-instagram-square"></i>
                        </a>
                        <a href="https://twitter.com/?lang=vi">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </div>
                    <span>Sign up with Email</span>
                    <label>
                        <input type="text" placeholder="Name" id="name" name="name" autocomplete="off"
                            class="form-control" required pattern="[A-Za-z\s]+" title="Enter a valid name">
                    </label>
                    <label>
                        <input type="email" class="form-control" autocomplete="off" name="email" id="email"
                            placeholder="Email" required title="Enter a valid email">
                    </label>
                    <label>
                        <div class="input-group">
                            <input type="password" placeholder="Password" id="password" autocomplete="off"
                                name="password" class="form-control" required minlength="8"
                                title="Enter a valid password">                            
                            <i class="fas fa-eye fas2" onclick="togglePassword('password', this)"></i>
                        </div>
                    </label>
                    <label>
                        <div class="input-group">
                            <input type="password" placeholder="Confirm Password" id="confirm_password"
                                autocomplete="off" name="confirm_password" class="form-control" required
                                title="Confirm your password">
                                <i class="fas fa-eye fas1" onclick="togglePassword('confirm_password', this)"></i>
                        </div>
                    </label>

                    <button type="submit" class="submit-btn">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="../login/sign_in.php" method="post">
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="https://www.facebook.com/">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/">
                            <i class="fab fa-instagram-square"></i>
                        </a>
                        <a href="https://twitter.com/?lang=vi">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </div>
                    <span>Sign in with E-Mail Address</span>
                    <label>
                        <input type="text" placeholder="Name" name="name" id="signin_name" required>
                    </label>
                    <label>
                        <div class="input-group">
                            <input type="password" placeholder="Password" name="password" id="signin_password" required
                                title="Enter your password">
                            <i class="fas fa-eye" onclick="togglePassword('signin_password', this)"></i>
                        </div>
                    </label>
                    <a href="#">Forgot your password?</a>
                    <button type="submit" class="submit-btn">Sign In</button>
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
        function togglePassword(fieldId, icon) {
            const field = document.getElementById(fieldId);
            const type2 = field.getAttribute('type') === 'password' ? 'text': 'password';
            field.setAttribute('type', type1);
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
            const type1 = field.getAttribute('type') === 'confirm_password' ? 'text': 'password';
            
            field.setAttribute('type', type1);
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        }

    </script>
</body>

</html>