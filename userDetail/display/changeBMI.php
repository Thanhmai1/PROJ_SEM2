<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/css/userdetail.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
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
            font-size: 24px;
            color: #333;
        }

        .form-section .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-section .form-control {
            border-radius: 4px;
            border: 1px solid #ddd;
            box-shadow: none;
        }

        .form-section .form-control:focus {
            border-color: #4e88ff;
            box-shadow: 0 0 0 0.2rem rgba(78, 136, 255, 0.25);
        }

        .form-section .btn-primary {
            background-color: #00aaa3;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            padding: 10px 20px;
        }

        .form-section .btn-primary:hover {
            background-color: #00796b;
        }

        .alert {
            border-radius: 4px;
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
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .error-message {
            display: none;
        }
    </style>
</head>
<body>
    <?php session_start(); include './header-userdetail.php'; ?>
    <div class="container mt-5">
        <?php if (isset($_SESSION["updateErrorMessage"]) && $_SESSION["updateErrorMessage"]): ?>
        <div id="messageDiv" class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($_SESSION["updateErrorMessage"]); ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_SESSION["updateMessage"]) && $_SESSION["updateMessage"]): ?>
        <div id="messageDiv" class="alert alert-info" role="alert">
            <?php echo htmlspecialchars($_SESSION["updateMessage"]); ?>
        </div>
        <?php endif; ?>

        <div class="form-section">
            <h2>Change BMI</h2>
            <form id="bmiForm" action="../updateBMI.php" method="post">
                <div class="mb-3">
                    <label class="form-label" for="height">Height (in meters)</label>
                    <input type="text" class="form-control" id="height" name="height" value="<?php echo htmlspecialchars($_SESSION['height'] ?? ''); ?>" required>
                    <div id="heightError" class="text-danger mt-2 error-message"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="weight">Weight (in kilograms)</label>
                    <input type="text" class="form-control" id="weight" name="weight" value="<?php echo htmlspecialchars($_SESSION['weight'] ?? ''); ?> "required>
                    <div id="weightError" class="text-danger mt-2 error-message"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="bmi">BMI</label>
                    <input type="text" class="form-control" id="bmi" name="bmi" value="<?php echo htmlspecialchars($_SESSION['bmi'] ?? ''); ?>" disabled>
                </div>
                <button type="submit" value="submit" name="updateBMI" class="btn btn-primary">Update BMI</button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const messageDiv = document.getElementById('messageDiv');
            if (messageDiv) {
                setTimeout(() => {
                    messageDiv.style.display = 'none';
                }, 2000);
            }

            const form = document.getElementById('bmiForm');
            form.addEventListener('submit', function (event) {
                const height = parseFloat(document.getElementById('height').value);
                const weight = parseFloat(document.getElementById('weight').value);
                let valid = true;

                if (isNaN(height) || height <= 0) {
                    const heightError = document.getElementById('heightError');
                    heightError.textContent = 'Height must be a positive number.';
                    heightError.style.display = 'block';
                    setTimeout(() => {
                        heightError.style.display = 'none';
                    }, 2000);
                    valid = false;
                } else {
                    document.getElementById('heightError').textContent = '';
                }

                if (isNaN(weight) || weight <= 0) {
                    const weightError = document.getElementById('weightError');
                    weightError.textContent = 'Weight must be a positive number.';
                    weightError.style.display = 'block';
                    setTimeout(() => {
                        weightError.style.display = 'none';
                    }, 2000);
                    valid = false;
                } else {
                    document.getElementById('weightError').textContent = '';
                }

                if (!valid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
