<!DOCTYPE html>
<html>

<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/quicksnacklogo.png" type="images/x-icon">
        <title>Contact</title>
        <link href="./css/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="/css/contact.css">

</head>

<body>
        <?php include './includes/header.php'; ?>

        <div class="container">
                <h2>Contact Us</h2>
                <form action="contact.php" method="POST">
                        <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea id="message" name="message" required></textarea>
                        </div>
                        <div class="form-group">
                                <button type="submit">Submit</button>
                        </div>
                </form>
        </div>
        <div class="google-maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2122.9329453976306!2d105.78082135639623!3d21.02865078376905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4cd376479b%3A0xbc2e0bb9db373ed2!2zOGEgVMO0biBUaOG6pXQgVGh1eeG6v3QsIE3hu7kgxJDDrG5oLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSAxMDAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1708056544050!5m2!1sen!2s"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

</body>

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script src="../js/contact.js"></script>

<!-- Footer -->
<?php include './includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</html>