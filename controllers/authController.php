<?php
include('../../config/connection.php');

// Function signup untuk menangani signup
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

// Function signin untuk menangani signin
function signin($username, $password) {
    global $connection;

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id_user'];
            return true;
        }
    }
    return false;
}
?>