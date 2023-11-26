<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $court_type = $_POST['court_type'];
    $max_capacity = $_POST['max_capacity'];

    $sql = "INSERT INTO courts (court_type) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $court_type);

    if ($stmt->execute()) {
        echo "Court created successfully.";
    } else {
        echo "Court creation failed.";
    }

    $stmt->close();
}

$conn->close();

?>
