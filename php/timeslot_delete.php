<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $timeslot_id = $_POST['timeslot_id'];

    $sql = "DELETE FROM timeslots WHERE timeslot_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $timeslot_id);

    if ($stmt->execute()) {
        echo "Timeslot deleted successfully.";
    } else {
        echo "Timeslot deletion failed.";
    }

    $stmt->close();
}

$conn->close();

?>
