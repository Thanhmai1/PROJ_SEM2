<?php
include "./../includes/conn.php";
session_start();
$username = $_SESSION['username'];
$update_at = date("Y-m-d H:i:s");
$updateMessage = '';
$updateErrorMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if (isset($_POST['updatePassword'])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
            $updateErrorMessage .= "Password fields must not be empty!<br>";
        } else if (strlen($new_password) < 8) {
            $updateErrorMessage .= "Password must be at least 8 characters!<br>";
        } else {
            $fetch_ps = $conn->prepare("SELECT password FROM user WHERE username = ?");
            $fetch_ps->bind_param("s", $username);
            $fetch_ps->execute();
            $fetch_result = $fetch_ps->get_result();

            if ($fetch_result->num_rows > 0) {
                $row = $fetch_result->fetch_assoc();
                if (password_verify($old_password, $row['password'])) {
                    if ($new_password === $confirm_password) {
                        $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
                        $update_ps = $conn->prepare("UPDATE user SET password = ?, update_at = ? WHERE username = ?");
                        $update_ps->bind_param("sss", $hash_password, $update_at, $username);                        
                        if ($update_ps->execute()) {
                            $updateMessage .= "Password updated successfully<br>";
                        } else {
                            $updateErrorMessage .= "Error updating password: " . $update_ps->error . "<br>";
                        }
                    } else {
                        $updateErrorMessage .= "Passwords do not match<br>";
                    }
                } else {
                    $updateErrorMessage .= "Current password is incorrect<br>";
                }
            } else {
                $updateErrorMessage .= "User not found<br>";
            }
        }
    } else{
        echo  "error";
    }
} else {
    $updateErrorMessage = "Password fields mustn't empty!";
}
$_SESSION['updateMessage'] = $updateMessage;
$_SESSION['updateErrorMessage'] = $updateErrorMessage;
header('Location:userdetail.php');
?>