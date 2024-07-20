<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-section h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            text-align: center;
        }
        .form-section .form-label {
            font-weight: 600;
            color: #333;
        }
        .form-section .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-section .form-control:focus {
            border-color: #4e88ff;
            box-shadow: 0 0 0 0.2rem rgba(78, 136, 255, 0.25);
        }
        .form-section .btn-primary {
            background-color: #00aaa3;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            padding: 12px 24px;
            transition: background-color 0.3s;
        }
        .form-section .btn-primary:hover {
            background-color: #00796b;
        }
        .alert {
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        #messageDiv {
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .password-container {
            position: relative;
        }
        .password-container i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
            transition: color 0.3s;
        }
        .password-container i:hover {
            color: #333;
        }
    </style>
</head>
<body>
    <?php session_start(); include './header-userdetail.php'; ?>
    <div class="container mt-5">
        <?php if (isset($_SESSION["updatePErrorMessage"]) && $_SESSION["updatePErrorMessage"]): ?>
        <div id="messageDiv" class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($_SESSION["updatePErrorMessage"]); ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION["updatePMessage"]) && $_SESSION["updatePMessage"]): ?>
        <div id="messageDiv" class="alert alert-info" role="alert">
            <?php echo htmlspecialchars($_SESSION["updatePMessage"]); ?>
        </div>
        <?php endif; ?>

        <div class="form-section">
            <h2>Change Password</h2>
            <form action="../updatePassword.php" method="post">
                <div class="mb-3 password-container">
                    <label for="old_password" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" required>
                    <i style="padding-top:30px;" class="fas fa-eye" onclick="togglePassword('old_password', this)"></i>
                </div>
                <div class="mb-3 password-container">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" minlength="8" required>
                    <i style="padding-top:30px;"class="fas fa-eye" onclick="togglePassword('new_password', this)"></i>
                </div>
                <div class="mb-3 password-container">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="8" required>
                    <i style="padding-top:30px;" class="fas fa-eye" onclick="togglePassword('confirm_password', this)"></i>
                </div>
                <button type="submit" value="submit" name="updatePassword" class="btn btn-primary">Change password</button>
            </form>
        </div>        
    </div>

    <script>
        function togglePassword(fieldId, icon) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const messageDiv = document.getElementById('messageDiv');
            if (messageDiv) {
                setTimeout(() => {
                    messageDiv.style.display = 'none';
                }, 2000);
            }
        });
    </script>
</body>
</html>
