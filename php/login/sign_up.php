<?php
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project_sem2";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }                        
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hash_password = md5($password);

        $ps = $conn->prepare("INSERT INTO users (UserName, Email, `Password`) VALUES ( ?, ?, ?)");
        $ps->bind_param("sss", $name, $email, $hash_password);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {                    
            $sql = "SELECT * FROM users WHERE UserName = ? OR Email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $name,$email);
            $stmt->execute();
            $result = $stmt->get_result();        
            if ($result->num_rows > 0) {
                if($row["UserName"] == $name){
                    echo '<script>alert("Name not available, please enter again!"); window.location.href = "http://localhost:3000/html/login.html";</script>';                 
                }
                elseif($row["Email"] == $email){
                    echo '<script>alert("Enail not available, please enter again!"); window.location.href = "http://localhost:3000/html/login.html";</script>';                 
                }
            } else{
                echo $result->num_rows;
            }
        }else {
            $ps->execute();
            echo '<script>alert("SIGN UP SUCCESSFULL!"); window.location.href = "http://localhost:3000/html/login.html";</script>';
            exit;
        }             
        $ps->close();    
        $conn->close();
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
    ?>  