<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $court_id = $_POST['court_id'];
    $new_court_type = $_POST['new_court_type'];
    $new_max_capacity = $_POST['new_max_capacity'];

    $sql = "UPDATE courts SET court_type = ?, max_capacity = ? WHERE court_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_court_name, $new_max_capacity, $court_id);

    if ($stmt->execute()) {
        echo "Court updated successfully.";
    } else {
        echo "Court update failed.";
    }

    $stmt->close();
}

$conn->close();

?>
