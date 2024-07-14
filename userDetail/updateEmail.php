<?php
include "./../includes/conn.php";
session_start();
$username = $_SESSION['username'];
$update_at = date("Y-m-d H:i:s");
$updateMessage = '';
$updateErrorMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["updateEmail"])) {
        
        $new_email = $_POST['email'];

        if (empty($new_email)) {

        $updateErrorMessage = "Email field mustn't be empty!";
        } else if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
            $updateErrorMessage .= "Invalid email format!<br>";
        }else if ($new_email != $_SESSION['email']) {
            $update_ps = $conn->prepare("UPDATE user SET email = ?, update_at = ? WHERE username = ?");
            $update_ps->bind_param("sss", $new_email, $update_at, $username);

            if ($update_ps->execute()) {
                $_SESSION['email'] = $new_email;
                $updateMessage .= "Email updated successfully<br>";
            } else{
                $updateErrorMessage .= "Error updating email: " . $update_ps->error . "<br>";
            }
        }else{
         
            $updateErrorMessage .= "New email is the same as the current email!<br>";
        }
    }
} else {
    $updateErrorMessage = "Invalid request method!";
}
$_SESSION['updateMessage'] = $updateMessage;
$_SESSION['updateErrorMessage'] = $updateErrorMessage;
header("Location: userdetail.php");
exit;
?>