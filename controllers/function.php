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

// Function updateMeja
function mejaUpdate($data) {
    global $connection;

    // Ambil data meja dari array $data
    $idMeja = $data['idMeja'];
    $noMeja = $data['noMeja'];
    $kapasitas = $data['kapasitas'];
    $posisi = $data['posisi'];

    // Query SQL untuk mengedit data meja
    $queryUpdateMeja = "UPDATE meja SET no_meja='$noMeja', kapasitas='$kapasitas', posisi='$posisi' WHERE id_meja = $idMeja";
    $resultUpdateMeja = mysqli_query($connection, $queryUpdateMeja);

    // Kembalikan true jika berhasil
    return true;
}

// Function mejaDelete
function mejaDelete($data) {
    global $connection;

    // Ambil parameter id
    $idMeja = $data['id'];

    // Query SQL untuk menghapus data buku
    $queryDeleteMeja = "DELETE FROM meja WHERE id_meja = $idMeja";
    $resultDeleteMeja = mysqli_query($connection, $queryDeleteMeja);

    // Kembalikan true jika berhasil
    return true;
}

// Function pelangganCreate
function pelangganCreate($data) {
    global $connection;

    // Ambil data pelanggan dari array $data
    $namaPelanggan = $data['namaPelanggan'];
    $alamat = $data['alamat'];
    $noTelepon = $data['noTelepon'];

    // Query SQL untuk menambahkan data pelanggan baru
    $queryPelangganCreate = "INSERT INTO pelanggan (nama_pelanggan,alamat,no_telepon) VALUES('$namaPelanggan','$alamat','$noTelepon')";
    $resultPelangganCreate = mysqli_query($connection, $queryPelangganCreate);

    // Kembalikan true jika berhasil
    return true;
}

// Function untuk mendapatakan data pelanggan berdasarkan id_pelanggan
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