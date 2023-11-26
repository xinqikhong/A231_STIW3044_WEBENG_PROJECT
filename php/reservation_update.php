<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = $_POST['reservation_id'];
    $new_user_id = $_POST['new_user_id'];
    $new_timeslot_id = $_POST['new_timeslot_id'];

    $sql = "UPDATE reservations SET user_id = ?, timeslot_id = ? WHERE reservation_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $new_user_id, $new_timeslot_id, $reservation_id);

    if ($stmt->execute()) {
        echo "Reservation updated successfully.";
    } else {
        echo "Reservation update failed.";
    }

    $stmt->close();
}

$conn->close();

?>
