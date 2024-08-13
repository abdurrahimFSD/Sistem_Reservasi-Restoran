<?php

if (file_exists('./config/connection.php')) {
    include('./config/connection.php');
} elseif (file_exists('../config/connection.php')) {
    include('../config/connection.php');
} else {
    die('Connection file not found');
}

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

// Function createMeja
function mejaCreate($data) {
    global $connection;

    // Ambil data meja dari array $data
    $noMeja = $data['noMeja'];
    $kapasitas = $data['kapasitas'];
    $posisi = $data['posisi'];

    // Query SQL untuk menambahkan data meja baru
    $queryCreateMeja = "INSERT INTO meja (no_meja, kapasitas, posisi) VALUES ('$noMeja', '$kapasitas', '$posisi')";
    $resultCreateMeja = mysqli_query($connection, $queryCreateMeja);

    // Kembalikan true jika berhasil
    return true;
}

// Function untuk mendapatakan data meja berdasarkan id_meja
function getMejaById($idMeja) {
    global $connection;

    $query = "SELECT * FROM meja WHERE id_meja = $idMeja";
    $result = mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($result);

    return $data;
}
// Cek apakah id_meja diberikan melalui URL
$data = null;
if (isset($_GET['id'])) {
    $getIdMeja = $_GET['id'];
    $data = getMejaById($getIdMeja);
}

?>