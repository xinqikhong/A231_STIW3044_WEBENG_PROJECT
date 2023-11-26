<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "User deletion failed.";
    }

    $stmt->close();
}

$conn->close();

?>
