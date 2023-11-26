<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $court_id = $_POST['court_id'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $date = $_POST['date'];

    $sql = "INSERT INTO timeslots (court_id, start_time, end_time, date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $court_id, $start_time, $end_time, $date);

    if ($stmt->execute()) {
        echo "Timeslot created successfully.";
    } else {
        echo "Timeslot creation failed.";
    }

    $stmt->close();
}

$conn->close();

?>
