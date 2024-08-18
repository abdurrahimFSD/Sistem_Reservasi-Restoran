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
function mejaDelete($idMeja) {
    global $connection;

    // Query SQL untuk menghapus data meja
    $queryDeleteMeja = "DELETE FROM meja WHERE id_meja = $idMeja";
    $resultDeleteMeja = mysqli_query($connection, $queryDeleteMeja);

    if ($resultDeleteMeja) {
        // Jika delete berhasil
        return true;
    } else {
        // Jika delete gagal, tampilkan error
        die("Error: " . mysqli_error($connection));
    }
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

// Function pelangganUdpate
function pelangganUpdate($data) {
    global $connection;

    // Ambil data pelanggan dari array $data
    $idPelanggan = $data['idPelanggan'];
    $namaPelanggan = $data['namaPelanggan'];
    $alamat = $data['alamat'];
    $noTelepon = $data['noTelepon'];

    // Query SQL untuk mengedit data pelanggan
    $queryUpdatePelanggan = "UPDATE pelanggan SET nama_pelanggan='$namaPelanggan', alamat='$alamat', no_telepon='$noTelepon' WHERE id_pelanggan = $idPelanggan";
    $resultUpdatePelanggan = mysqli_query($connection, $queryUpdatePelanggan);

    if ($resultUpdatePelanggan) {
        // Jika update berhasil
        return true;
    } else {
        // Jika update gagal, tampilkan error
        die("Error: " . mysqli_error($connection));
    }
}

// Function pelangganDelete
function pelangganDelete($idPelanggan) {
    global $connection;

    // Query SQL untuk menghapus data pelanggan
    $queryDeletePelanggan = "DELETE FROM pelanggan WHERE id_pelanggan = $idPelanggan";
    $resultDeletePelanggan = mysqli_query($connection, $queryDeletePelanggan);

    if ($resultDeletePelanggan) {
        // Jika delete berhasil
        return true;
    } else {
        // Jika delete gagal, tampilkan error
        die("Error: " . mysqli_error($connection));
    }
}

// Function reservasiCreate
function reservasiCreate($data) {
    global $connection;

    // Ambil data reservasi data array data
    $tanggalReservasi = $data['tanggalReservasi'];
    $noMeja = $data['noMeja'];
    $namaPelanggan = $data['namaPelanggan'];
    $catatan = $data['catatan'];
    $jumlahOrang = $data['jumlahOrang'];
    
    // Query SQL untuk menambahkan data reservasi baru
    $queryReservasiCreate = "INSERT INTO reservasi (tanggal_reservasi, meja_id, pelanggan_id, catatan, jumlah_orang) VALUES ('$tanggalReservasi', '$noMeja', '$namaPelanggan', '$catatan', '$jumlahOrang')";
    $resultReservasiCreate = mysqli_query($connection, $queryReservasiCreate);

    if ($resultReservasiCreate) {
        // Jika create berhasil
        return true;
    } else {
        // Jika delete gagal, tampilkan error
        die("Error: " . mysqli_error($connection));
    }
}

// Function reservasiUpdate
function reservasiUpdate($data) {
    global $connection;

    // Ambil data reservasi dari array $data
    $idReservasi = $data['idReservasi'];
    $tanggalReservasi = $data['tanggalReservasi'];
    $noMeja = $data['noMeja'];
    $namaPelanggan = $data['namaPelanggan'];
    $catatan = $data['catatan'];
    $jumlahOrang = $data['jumlahOrang'];

    // Query SQL untuk mengedit data reservasi berdasarkan idReservasi
    $queryReservasiUpdate = "UPDATE reservasi SET tanggal_reservasi='$tanggalReservasi', meja_id='$noMeja', pelanggan_id='$namaPelanggan', catatan='$catatan', jumlah_orang='$jumlahOrang' WHERE id_reservasi = $idReservasi";
    $resultReservasiUpdate = mysqli_query($connection, $queryReservasiUpdate);

    if ($resultReservasiUpdate) {
        // Jika update berhasil
        return true;
    } else {
        // Jika delete gagal, tampilkan error
        die("Error: " . mysqli_error($connection));
    }
}
?>