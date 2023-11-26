<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_id, $user_name, $hashedPassword, $email);

    if ($stmt->execute()) {
        echo "User created successfully.";
    } else {
        echo "User creation failed.";
    }

    $stmt->close();
}

$conn->close();

?>
