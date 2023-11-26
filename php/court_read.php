<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM courts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $courts = array();
        while ($row = $result->fetch_assoc()) {
            $courts[] = $row;
        }
        echo json_encode($courts);  // Output court details as JSON
    } else {
        echo "No courts found.";
    }
}

$conn->close();

?>
