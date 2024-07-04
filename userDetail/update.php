<?php

$username = $_SESSION['username'];
$email = '';
$update_at = date("Y-m-d H:i:s");
$updateMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $old_password = $_POST['old_password'];
    $confirm_password = $_POST['confirm_password'];
    if ($new_email != $_SESSION['email']) {
        $update_ps = $conn->prepare("UPDATE `user` SET `email` = ?, `update_at` = ? WHERE `username` = ?");
        $update_ps->bind_param("sss", $new_email, $username,$update_at);
        $update_ps->execute();

        if ($update_ps->affected_rows > 0) {
            $_SESSION['email'] = $new_email;
            $updateMessage .= "Email updated successfully<br>";
        } else{
            $updateMessage .= "Fields must not be empty";
        }
    }
    elseif (!empty($new_password) && !empty($old_password) && !empty($confirm_password)) {
        $fetch_ps = $conn->prepare("SELECT `password` FROM `user` WHERE `username` = ?");
        $fetch_ps->bind_param("s", $username);
        $fetch_ps->execute();
        $fetch_result = $fetch_ps->get_result();
        if ($fetch_result->num_rows > 0) {

            $row = $fetch_result->fetch_assoc();            
            if (md5($old_password) === $row['password']) {
                if ($new_password === $confirm_password) {

                    $hash_password = md5($new_password);
                    $update_ps = $conn->prepare("UPDATE `user` SET `password` = ?, `update_at` = ? WHERE `username` = ?");
                    $update_ps->bind_param("sss", $hash_password, $username,$update_at);
                    $update_ps->execute();

                    if ($update_ps->affected_rows > 0) {

                        $updateMessage .= "Password updated successfully<br>";

                    } else {
                        $updateMessage .= "Error updating password: " . $update_ps->error . "<br>";
                    }
                } else {
                    $updateMessage .= "Passwords do not match<br>";
                }
            } else {
                $updateMessage .= "Password is incorrect<br>";
            }
        } else {
            $updateMessage .= "User not found<br>";
        }
    } else {
        $updateMessage .= "Fields mustn't be empty<br>";

    }
}?>