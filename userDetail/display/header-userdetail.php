<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sidebar</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 250px;
            background-color: #00796b;
            color: white;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
        }

        .user-profile {
            text-align: center;
            margin-bottom: 30px;
        }

        .user-profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ffffff;
        }

        .user-profile h3 {
            margin: 10px 0 5px;
            font-size: 20px;
            font-weight: 600;
        }

        .user-profile p {
            margin: 0;
            font-size: 14px;
            color: #e0f2f1;
        }

        .menu-section {
            flex: 1;
        }

        .menu-section h4 {
            margin: 0 0 15px;
            font-size: 14px;
            color: #e0f2f1;
            text-transform: uppercase;
            font-weight: 600;
        }

        .menu-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-section ul li {
            margin: 10px 0;
        }

        .menu-section ul li a {
            text-decoration: none;
            color: #ffffff;
            font-size: 16px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .menu-section ul li a:hover {
            background-color: #004d40;
            color: #b2dfdb;
        }

        .notification {
            background-color: #00796b;
            color: white;
            font-size: 12px;
            border-radius: 10px;
            padding: 2px 6px;
            margin-left: auto;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="user-profile">
            <img src="https://as1.ftcdn.net/v2/jpg/03/46/83/96/1000_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" alt="User Avatar">
            <h3>
                <?php                                
                if (isset($_SESSION['username'])) {
                    echo htmlspecialchars($_SESSION['username']);
                } else {
                    echo "Guest";
                }
                ?>
            </h3>
            <p>
                <?php   
                include '../../includes/conn.php';             
                if (isset($_SESSION["username"])) {
                    $username = $_SESSION["username"];
                    $stmt = $conn->prepare("SELECT `email` FROM `user` WHERE `username` = ?");
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo htmlspecialchars($row["email"]);
                    } else {
                        echo "Email not found";
                    }
                }
                ?>
            </p>
        </div>
        <div class="menu-section">
            <h4>Menu</h4>
            <ul>
                <li><a href="http://localhost:3000/index.php">Home</a></li>
                <li><a href="http://localhost:3000/userDetail/display/userdetail.php">Your Account</a></li>
                <li><a href="http://localhost:3000/userDetail/display/changePassword.php">Change Password</a></li>
                <li><a href="http://localhost:3000/userDetail/display/changeBMI.php">Change your BMI</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
