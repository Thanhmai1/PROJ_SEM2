<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/contact.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" defer></script>
</head>
<body>
    <?php include './includes/header.php'; ?>
    <?php if (isset($_SESSION["loggedin"])) { ?>
        <div class="container contact-info">
            <div>
                <i class="fas fa-map-marker-alt"></i>
                <p>8a Ton That Thuyet, My Đinh, Cau Giay, Ha Noi</p>
            </div>
            <div>
                <i class="fas fa-phone"></i>
                <p><a style="text-decoration: none; color:#333;" href="tel:+1235235598">+ 1235 2355 98</a></p>
            </div>
            <div>
                <i class="fas fa-envelope"></i>
                <p><a style="text-decoration: none;color:#333;" href="mailto:thanhmainguyen20120119@gmail.com">thanhmainguyen20120119@gmail.com</a></p>
            </div>
            <div>
                <i class="fas fa-globe"></i>
                <p><a style="text-decoration: none;color:#333;" href="http://localhost:3000/index.php">quicksnack.com</a></p>
            </div>
        </div>
        <div class="container contact-section">
            <div class="contact-form">
                <p>Contact Us</p>
                <form action="contact.php" method="POST">
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="fullname">Full Name:</label>
                            <input type="text" id="fullname" name="fullname" class="form-control" required>
                        </div>
                        <div class="form-group half-width">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
            <div class="contact-details">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2122.9329453976306!2d105.78082135639623!3d21.02865078376905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cd376479b%3A0xbc2e0bb9db373ed2!2zOGEgVMO0biBUaOG6pXQgVGh1eeG6v3QsIE3hu7kgxJDDrG5oLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSAxMDAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1708056544050!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    <?php } else { ?>
        <div class="container contact-info">
            <div>
                <i class="fas fa-map-marker-alt"></i>
                <p>8a Ton That Thuyet, My Đinh, Cau Giay, Ha Noi</p>
            </div>
            <div>
                <i class="fas fa-phone"></i>
                <p><a style="text-decoration: none; color:#333;" href="tel:+1235235598">+ 1235 2355 98</a></p>
            </div>
            <div>
                <i class="fas fa-envelope"></i>
                <p><a style="text-decoration: none;color:#333;" href="mailto:thanhmainguyen20120119@gmail.com">thanhmainguyen20120119@gmail.com</a></p>
            </div>
            <div>
                <i class="fas fa-globe"></i>
                <p><a style="text-decoration: none;color:#333;" href="http://localhost:3000/index.php">quicksnack.com</a></p>
            </div>
        </div>
        <div class="container contact-section">
            <div class="contact-form">
                <p>Contact Us</p>
                <form action="contact.php" method="POST">
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="fullname">Full Name:</label>
                            <input type="text" id="fullname" name="fullname" class="form-control" disabled>
                        </div>
                        <div class="form-group half-width">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" class="form-control" rows="5" disabled></textarea>
                    </div>
                    <?php echo "<a href='http://localhost:3000/html/login.php' style='text-decoration:none;'><h6 style='color:red;'>Please login to send feedback!</h6></a>"; ?>
                </form>
            </div>
            <div class="contact-details">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2122.9329453976306!2d105.78082135639623!3d21.02865078376905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cd376479b%3A0xbc2e0bb9db373ed2!2zOGEgVMO0biBUaOG6pXQgVGh1eeG6v3QsIE3hu7kgxJDDrG5oLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSAxMDAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1708056544050!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    <?php }
    include './includes/footer.php'; ?>
</body>
</html>
