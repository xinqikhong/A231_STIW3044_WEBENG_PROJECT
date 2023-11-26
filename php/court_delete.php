<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $court_id = $_POST['court_id'];

    $sql = "DELETE FROM courts WHERE court_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $court_id);

    if ($stmt->execute()) {
        echo "Court deleted successfully.";
    } else {
        echo "Court deletion failed.";
    }

    $stmt->close();
}

$conn->close();

?>
