<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .filter-panel {
            text-align: center;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: block;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        .filter-panel h2 {
            text-align: center;
        }
        .filter-section {
            margin-bottom: 20px;
        }
        .filter-section h3 {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        .more-button {
            display: block;
            margin-top: 5px;
            padding: 5px 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-submit {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .dis-bmi {
            font-weight: bold;
            margin-top: 15px;
        }
    </style>

    <div class="filter-panel">
        <div class="sticky">
            <nav>
                <h3>Calculate BMI</h3>
            </nav>
        </div>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <form id="bmi-form" method="POST" action="">
                        <div class="filter-section">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="number" class="form-control" name="weight" id="weight"
                                placeholder="Enter your weight" required>
                        </div>
                        <div class="filter-section">
                            <label for="height" class="form-label">Height</label>
                            <input type="number" step="0.01" class="form-control" name="height" id="height"
                                placeholder="Enter your height" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Calculate BMI</button>
                    </form>
                    <div id="bmi-result" class="dis-bmi"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $weight = $_POST["weight"];
        $height = $_POST["height"];

        if (is_numeric($weight) && is_numeric($height) && $weight > 0 && $height > 0) {
            $bmi = $weight / ($height * $height);
            $bmi = round($bmi, 2);

            try {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "project-sem2";

                // Tạo kết nối
                $conn = new mysqli($servername, $username, $password, $database);

                // Kiểm tra kết nối
                if ($conn->connect_error) {
                    die("Connect Error: " . $conn->connect_error);
                }

                // Chuẩn bị và bind
                $ps = $conn->prepare("INSERT INTO bmi (weight, height, bmi) VALUES (?, ?, ?)");
                $ps->bind_param("ddi", $weight, $height, $bmi); // Sử dụng "ddi" vì weight và height là số thực, bmi là số nguyên

                // Thực thi truy vấn
                if ($ps->execute()) {
                    echo "Save information success. Your BMI is $bmi.";
                } else {
                    echo "Error: " . $ps->error;
                }

                // Đóng kết nối
                $ps->close();
                $conn->close();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Please Enter valid value your weight and your height.";
        }
    }
    ?>

</body>
</html>
