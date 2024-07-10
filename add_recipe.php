<?php
include './cndbqunganh.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem biểu mẫu có được gửi đi hay không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $category = $_POST['category'];

    // Sử dụng prepared statements để ngăn ngừa SQL Injection
    $stmt = $conn->prepare("INSERT INTO recipes (name, description, image_url, category) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $description, $image_url, $category);

    if ($stmt->execute() === TRUE) {
        // Chuyển hướng sau khi thêm món ăn thành công
        header("Location: add_recipe.php?success=true");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
    <link rel="stylesheet" href="styles.css"> <!-- Đường dẫn tới file CSS của bạn -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .recipes-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .recipe-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            width: calc(33% - 20px);
            /* Adjust based on number of columns */
            box-sizing: border-box;
        }

        .recipe-card img {
            width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }

        .recipe-card h3 {
            margin: 10px 0;
            font-size: 1.2em;
        }

        .recipe-card p {
            margin: 5px 0;
        }

        .recipe-card p strong {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Add New Recipe</h2>
    <form action="add_recipe.php" method="post">
        <label for="name">Recipe Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>
        <label for="image_url">Image URL:</label><br>
        <input type="text" id="image_url" name="image_url" required><br><br>
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" required><br><br>
        <input type="submit" value="Add Recipe">
    </form>

    <?php
    if (isset($_GET['success'])) {
        echo "<p>New recipe added successfully.</p>";
    }
    ?>

    <h2>Recipes</h2>
    <div class="recipes-container">
        <?php
        include './cndbqunganh.php';

        $sql = "SELECT name, description, image_url, category FROM recipes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imageUrl = $row["image_url"];
                $imageName = $row["name"];

                // Kiểm tra nếu URL ảnh không hợp lệ
                if (filter_var($imageUrl, FILTER_VALIDATE_URL) === FALSE) {
                    $imageUrl = "path/to/default-image.jpg"; // Đặt đường dẫn tới ảnh mặc định nếu URL không hợp lệ
                }

                echo "<div class='recipe-card'>";
                echo "<img src='" . htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($imageName, ENT_QUOTES, 'UTF-8') . "'>";
                echo "<h3>" . htmlspecialchars($imageName, ENT_QUOTES, 'UTF-8') . "</h3>";
                echo "<p>" . htmlspecialchars($row["description"], ENT_QUOTES, 'UTF-8') . "</p>";
                echo "<p><strong>Category:</strong> " . htmlspecialchars($row["category"], ENT_QUOTES, 'UTF-8') . "</p>";
                echo "</div>";
            }
        } else {
            echo "No recipes found.";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>