<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $timeslot_id = $_POST['timeslot_id'];

    $sql = "INSERT INTO reservations (user_id, timeslot_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $timeslot_id);

    if ($stmt->execute()) {
        echo "Reservation created successfully.";
    } else {
        echo "Reservation creation failed.";
    }

    $stmt->close();
}

$conn->close();

?>
