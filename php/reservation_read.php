<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM reservations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $reservations = array();
        while ($row = $result->fetch_assoc()) {
            $reservations[] = $row;
        }
        echo json_encode($reservations);  // Output reservation details as JSON
    } else {
        echo "No reservations found.";
    }
}

$conn->close();

?>
