<?php
include('../../config/connection.php');

// Function untuk menangani signup
function signup($username, $email, $password) {
    global $connection;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sss", $username, $email, $hashedPassword);
    if($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>