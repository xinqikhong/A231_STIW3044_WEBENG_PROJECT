<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM timeslots";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $timeslots = array();
        while ($row = $result->fetch_assoc()) {
            $timeslots[] = $row;
        }
        echo json_encode($timeslots);  // Output timeslot details as JSON
    } else {
        echo "No timeslots found.";
    }
}

$conn->close();

?>
