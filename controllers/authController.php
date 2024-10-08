<?php
include('../../config/connection.php');

// Function signup untuk menangani signup
function signup($username, $email, $password) {
    global $connection;

    // Cek apakah username atau email sudah ada di database
    $query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika username atau email sudah ada, return pesan yang sesuai
        $row = $result->fetch_assoc();
        if ($row['username'] === $username) {
            return "Username sudah ada";
        } elseif ($row['email'] === $email) {
            return "Email sudah digunakan";
        }
    } else {
        // Jika username dan email belum ada, lanjutkan dengan proses pendaftaran
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
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
            // Menyimpan user_id, username, dan email ke dalam session
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            return true;
        }
    }
    return false;
}

// Function logout untuk menangani logout
function logout() {
    session_start();
    session_unset();
    session_destroy();
}
?>