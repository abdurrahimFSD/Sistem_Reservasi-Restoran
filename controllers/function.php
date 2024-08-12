<?php

include('./config/connection.php');

// Function fetchData
function fetchData($tableName) {
    global $connection;
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($connection, $query);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

?>