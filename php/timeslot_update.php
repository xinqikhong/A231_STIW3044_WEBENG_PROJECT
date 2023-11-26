<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $timeslot_id = $_POST['timeslot_id'];
    $new_start_time = $_POST['new_start_time'];
    $new_end_time = $_POST['new_end_time'];
    $new_date = $_POST['new_date'];
    $new_is_available = $_POST['new_is_available'];

    $sql = "UPDATE timeslots SET start_time = ?, end_time = ?, date = ?, is_available = ? WHERE timeslot_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $new_start_time, $new_end_time, $new_date, $new_is_available, $timeslot_id);

    if ($stmt->execute()) {
        echo "Timeslot updated successfully.";
    } else {
        echo "Timeslot update failed.";
    }

    $stmt->close();
}

$conn->close();

?>
