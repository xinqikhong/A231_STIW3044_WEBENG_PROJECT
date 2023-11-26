<?php

require_once('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        echo json_encode($users);  // Output user details as JSON
    } else {
        echo "No users found.";
    }
}

$conn->close();

?>
