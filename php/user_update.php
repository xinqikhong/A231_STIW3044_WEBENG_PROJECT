<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];
    $new_email = $_POST['new_email'];

    $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET user_name = ?, password = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_username, $hashedPassword, $new_email, $user_id);

    if ($stmt->execute()) {
        echo "User updated successfully.";
    } else {
        echo "User update failed.";
    }

    $stmt->close();
}

$conn->close();

?>
