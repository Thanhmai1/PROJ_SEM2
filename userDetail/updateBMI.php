<?php
include "./../includes/conn.php";
session_start();

$username = $_SESSION['username'];
$weight = isset($_POST["weight"]) ? $_POST["weight"] : 0;
$height = isset($_POST["height"]) ? $_POST["height"] : 0;
$bmi = $height > 0 ? $weight / ($height * $height) : 0;
$update_at = date("Y-m-d H:i:s");
$updateMessage = '';
$updateErrorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_numeric($weight) || !is_numeric($height) || $height <= 0 || $weight <= 0) {
        $updateErrorMessage = "Invalid input for height or weight.";
    } else {        
        $update_ps = $conn->prepare("UPDATE user SET bmi = ?, updated_at = ? WHERE username = ?");
        if ($update_ps === false) {
            $updateErrorMessage = "Error preparing update statement: " . $conn->error;
        } else {
            $update_ps->bind_param("dss", $bmi, $update_at, $username);
            if ($update_ps->execute()) {
                $updateMessage = "BMI updated successfully.";

                $_SESSION['height'] = $height;
                $_SESSION['weight'] = $weight;
                $_SESSION['bmi'] = $bmi;                
                $email_stmt = $conn->prepare("SELECT email FROM user WHERE username = ?");
                if ($email_stmt === false) {
                    $updateErrorMessage = "Error preparing email query: " . $conn->error;
                } else {
                    $email_stmt->bind_param("s", $username);
                    $email_stmt->execute();
                    $result = $email_stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $_SESSION['userEmail'] = $row['email'];
                    } else {
                        $_SESSION['userEmail'] = "Email not found";
                    }
                }                
                $type_stmt = $conn->prepare("SELECT id FROM person_types WHERE ? BETWEEN bmi_min AND bmi_max 
                OR (? < bmi_max AND bmi_min IS NULL) 
                OR (? > bmi_min AND bmi_max IS NULL)");
                if ($type_stmt === false) {
                    $updateErrorMessage = "Error preparing person type query: " . $conn->error;
                } else {
                    $type_stmt->bind_param("ddd", $bmi, $bmi, $bmi);
                    $type_stmt->execute();
                    $type_result = $type_stmt->get_result();
                    if ($type_result->num_rows > 0) {
                        $type_row = $type_result->fetch_assoc();
                        $person_type_id = $type_row['id'];                        
                        $update_person_type_stmt = $conn->prepare("UPDATE user SET person_type_id = ? WHERE username = ?");
                        if ($update_person_type_stmt === false) {
                            $updateErrorMessage = "Error preparing person type update statement: " . $conn->error;
                        } else {
                            $update_person_type_stmt->bind_param("is", $person_type_id, $username);
                            if ($update_person_type_stmt->execute()) {
                                $_SESSION['bmiType'] = $person_type_id;
                                $updateMessage = "BMI updated successfully.";
                            } else {
                                $updateErrorMessage = "Error updating person_type_id: " . $update_person_type_stmt->error;
                            }
                        }
                    } else {
                        $_SESSION['bmiType'] = "BMI type not found for the given BMI value";
                        $updateErrorMessage = "BMI type not found for the given BMI value";
                    }
                }
            } else {
                $updateErrorMessage = "Error updating BMI: " . $update_ps->error;
            }
        }
    }
} else {
    $updateErrorMessage = "Invalid request method!";
}

$_SESSION['updateMessage'] = $updateMessage;
$_SESSION['updateErrorMessage'] = $updateErrorMessage;

header("Location: http://localhost:3000/userDetail/display/changeBMI.php");
exit;
?>
