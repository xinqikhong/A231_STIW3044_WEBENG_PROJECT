<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = $_POST['reservation_id'];

    $sql = "DELETE FROM reservations WHERE reservation_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reservation_id);

    if ($stmt->execute()) {
        echo "Reservation deleted successfully.";
    } else {
        echo "Reservation deletion failed.";
    }

    $stmt->close();
}

$conn->close();

?>
