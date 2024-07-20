<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_sem2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu recipe_id được truyền vào URL
if (isset($_GET['recipe_id']) && !empty($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];

    // Truy vấn thông tin chi tiết món ăn
    $sql = "SELECT * FROM dish_detail WHERE recipe_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy món ăn.";
        exit();
    }
} else {
    echo "Không có recipe_id hợp lệ.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['title']); ?></title>
</head>

<body>
    <h1><?php echo htmlspecialchars($row['title']); ?></h1>
    <img src="<?php echo htmlspecialchars($row['thumbnail']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
    <p><strong>Thời gian chuẩn bị:</strong> <?php echo htmlspecialchars($row['prepare']); ?></p>
    <p><strong>Thời gian chế biến:</strong> <?php echo htmlspecialchars($row['process']); ?></p>
    <p><strong>Dành cho:</strong> <?php echo htmlspecialchars($row['intendedFor']); ?></p>
    <p><strong>Giới thiệu:</strong> <?php echo htmlspecialchars($row['introduction']); ?></p>
    <p><strong>Độ phổ biến:</strong> <?php echo htmlspecialchars($row['popularity']); ?></p>
    <p><strong>Thông tin về món ăn:</strong> <?php echo htmlspecialchars($row['aboutatfood']); ?></p>
    <img src="<?php echo htmlspecialchars($row['thumbnailhtc']); ?>"
        alt="<?php echo htmlspecialchars($row['title']); ?>">
    <p><strong>Nguyên liệu:</strong> <?php echo htmlspecialchars($row['ingredient']); ?></p>
    <p><strong>Cách làm:</strong> <?php echo nl2br(htmlspecialchars($row['howdoit'])); ?></p>
</body>

</html>

<?php
$conn->close();
?>