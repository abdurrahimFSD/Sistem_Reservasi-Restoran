<?php

if (file_exists('./config/connection.php')) {
    include('./config/connection.php');
} elseif (file_exists('../config/connection.php')) {
    include('../config/connection.php');
} else {
    die('Connection file not found');
}

// Function untuk mendapatakan total reservasi
function getTotalReservasi() {
    global $connection;

    // Query SQL untuk mendapatakn total reservasi
    $queryGetTotalReservasi = "SELECT COUNT(*) as total_reservasi FROM reservasi";
    $resultGetTotalReservasi = mysqli_query($connection, $queryGetTotalReservasi);

     if($resultGetTotalReservasi) {
        $data = mysqli_fetch_assoc($resultGetTotalReservasi);
        return $data['total_reservasi'];
     } else {
        die("Error: " . mysqli_error($connection));
     }
}

// Function untuk mendapatkan jumlah meja yang tersedia 
function getMejaTersedia() {
    global $connection;

    // Query SQL untuk mendapatkan jumlah meja yang tersedia
    $queryGetMejaTersedia = "SELECT COUNT(*) as meja_tersedia
                            FROM meja
                            WHERE id_meja NOT IN (SELECT meja_id FROM reservasi WHERE tanggal_reservasi = CURDATE())";
    $resultGetMejaTersedia = mysqli_query($connection, $queryGetMejaTersedia);

    if ($resultGetMejaTersedia) {
        $data = mysqli_fetch_assoc($resultGetMejaTersedia);
        return $data['meja_tersedia'];
    } else {
        die("Error: " . mysqli_error($connection));
    }
}

// Function untuk mendapatkan total pelanggan
function getTotalPelanggan() {
    global $connection;

    // Query SQL untuk mendapatkan total pelanggan
    $queryGetTotalPelanggan = "SELECT COUNT(*) as total_pelanggan FROM pelanggan";
    $resultGetTotalPelanggan = mysqli_query($connection, $queryGetTotalPelanggan);

    if ($resultGetTotalPelanggan) {
        $data = mysqli_fetch_assoc($resultGetTotalPelanggan);
        return $data['total_pelanggan'];
    } else {
        die("Error: ". mysqli_error($connection));
    }
}

// Function untuk mendapatkan jumlah reservasi hari ini
function getReservasiHariIni() {
    global $connection;

    // Query SQL untuk mendapatkan jumlah reservasi hari ini
    $queryGetReservasiHariIni = "SELECT COUNT(*) as total_reservasi_hari_ini FROM reservasi WHERE tanggal_reservasi = CURDATE()";
    $resultGetResevasiHariIni = mysqli_query($connection, $queryGetReservasiHariIni);

    if ($resultGetResevasiHariIni) {
        $data = mysqli_fetch_assoc($resultGetResevasiHariIni);
        return $data['total_reservasi_hari_ini'];
    } else {
        die("Error: ". mysqli_error($connection));
    }
}

// Function untuk mendapatkan data reservasi bulanan
function getReservasiBulanan() {
    global $connection;

    // Array untuk nama bulan
    $namaBulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    $queryReservasiBulanan = " SELECT MONTH(tanggal_reservasi) as bulan, YEAR(tanggal_reservasi) as tahun, COUNT(id_reservasi) as total 
                                FROM reservasi 
                                GROUP BY YEAR(tanggal_reservasi), MONTH(tanggal_reservasi)";
    $result = mysqli_query($connection, $queryReservasiBulanan);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row['bulan'] = $namaBulan[$row['bulan']] . ' ' . $row['tahun'];
        $data[] = $row;
    }

    return $data;
}


// Function untuk mendapatkan data reservasi mingguan
function getReservasiMingguan() {
    global $connection;

    // Mapping nama hari dari bahasa Inggris ke bahasa Indonesia
    $namaHari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];

    $queryReservasiMingguan = " SELECT DATE_FORMAT(tanggal_reservasi, '%Y-%m-%d') as tanggal, DAYNAME(tanggal_reservasi) as hari, COUNT(id_reservasi) as total 
                                FROM reservasi 
                                WHERE WEEK(tanggal_reservasi, 1) = WEEK(CURDATE(), 1) 
                                AND YEAR(tanggal_reservasi) = YEAR(CURDATE())
                                GROUP BY tanggal, DAYOFWEEK(tanggal_reservasi)";
                                
    $result = mysqli_query($connection, $queryReservasiMingguan);

    $data = [
        'Minggu' => ['total' => 0, 'tanggal' => ''],
        'Senin' => ['total' => 0, 'tanggal' => ''],
        'Selasa' => ['total' => 0, 'tanggal' => ''],
        'Rabu' => ['total' => 0, 'tanggal' => ''],
        'Kamis' => ['total' => 0, 'tanggal' => ''],
        'Jumat' => ['total' => 0, 'tanggal' => ''],
        'Sabtu' => ['total' => 0, 'tanggal' => '']
    ];

    while ($row = mysqli_fetch_assoc($result)) {
        $hariDalamBahasaIndonesia = $namaHari[$row['hari']];
        $data[$hariDalamBahasaIndonesia] = [
            'total' => $row['total'],
            'tanggal' => $row['tanggal']
        ];
    }

    return $data;
}


// Function untuk mendapatkan data reservasi berdasarkan kapasitas meja
function getReservasiKapasitas() {
    global $connection;

    $queryReservasiKapasitas = " SELECT m.kapasitas, COUNT(r.id_reservasi) as total 
                                FROM reservasi r
                                JOIN meja m ON r.meja_id = m.id_meja
                                GROUP BY m.kapasitas
                                ";
    $result = mysqli_query($connection, $queryReservasiKapasitas);

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row['kapasitas'] = 'Kapasitas ' . $row['kapasitas'];
        $data[] = $row;
    }

    return $data;
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

    // Mengecek apakah no meja sudah ada
    $queryCekNoMeja = "SELECT * FROM meja WHERE no_meja = '$noMeja'";
    $resultCekNoMeja = mysqli_query($connection, $queryCekNoMeja);
    if (mysqli_num_rows($resultCekNoMeja) > 0) {
        // Jika no meja sudah ada, ambil no meja yg duplikat
        $existingMeja = mysqli_fetch_assoc($resultCekNoMeja);
        return $existingMeja['no_meja'];    // Mengembalikan no_meja yang sudah ada
    }
    
    // Query SQL untuk menambahkan data meja baru
    $queryCreateMeja = "INSERT INTO meja (no_meja, kapasitas, posisi) VALUES ('$noMeja', '$kapasitas', '$posisi')";
    $resultCreateMeja = mysqli_query($connection, $queryCreateMeja);

    // Kembalikan true jika berhasil
    if ($resultCreateMeja) {
        return 'success';
    } else {
        return 'error';
    }
}

// Function updateMeja
function mejaUpdate($data) {
    global $connection;

    // Ambil data meja dari array $data
    $idMeja = $data['idMeja'];
    $noMeja = $data['noMeja'];
    $kapasitas = $data['kapasitas'];
    $posisi = $data['posisi'];

    // Mengecek apakah ada no meja yg sama
    $queryCheckNoMeja = "SELECT * FROM meja WHERE no_meja = '$noMeja' AND id_meja != '$idMeja'";
    $resultCheckNoMejaUpdate = mysqli_query($connection, $queryCheckNoMeja);

    if (mysqli_num_rows($resultCheckNoMejaUpdate) > 0) {
        $existingMeja = mysqli_fetch_assoc($resultCheckNoMejaUpdate);
        return $existingMeja['no_meja'];
    } else {
        // Query SQL untuk mengedit data meja
        $queryUpdateMeja = "UPDATE meja SET no_meja='$noMeja', kapasitas='$kapasitas', posisi='$posisi' WHERE id_meja = $idMeja";
        $resultUpdateMeja = mysqli_query($connection, $queryUpdateMeja);
    
        // Kembalikan success jika berhasil
        if ($resultUpdateMeja) {
            return 'success';
        } else {
            return 'error';
        }
    }
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

    // Kembalikan success jika berhasil
    if ($resultPelangganCreate) {
        return 'success';
    } else {
        return 'error';
    }
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
    $waktuMulai = $data['waktuMulai'];
    $waktuSelesai = $data['waktuSelesai'];
    $noMeja = $data['noMeja'];
    $namaPelanggan = $data['namaPelanggan'];
    $catatan = $data['catatan'];
    $jumlahOrang = $data['jumlahOrang'];

    // Mengecek apakah rentang waktu bentrok dengan reservasi yang sudah ada
    $queryCheckAvailability = "SELECT COUNT(*) as jumlah FROM reservasi WHERE meja_id = '$noMeja' AND tanggal_reservasi = '$tanggalReservasi' AND
                                (
                                    ('$waktuMulai' <= waktu_selesai AND '$waktuSelesai' >= waktu_mulai)
                                )";
    $resultCheckAvailability = mysqli_query($connection, $queryCheckAvailability);
    $dataCheckAvailability = mysqli_fetch_assoc($resultCheckAvailability); 
    if ($dataCheckAvailability['jumlah'] > 0) {
        // Jika ada bentrok waktu, return bentrokWaktu
        return 'bentrokWaktu';
    } else {
        // Jika tidak bentrok, simpan data reservasi
        $queryReservasiCreate = "INSERT INTO reservasi (tanggal_reservasi, waktu_mulai, waktu_selesai, meja_id, pelanggan_id, catatan, jumlah_orang)
                  VALUES ('$tanggalReservasi', '$waktuMulai', '$waktuSelesai', '$noMeja', '$namaPelanggan', '$catatan', '$jumlahOrang')";
        $resultReservasiCreate = mysqli_query($connection, $queryReservasiCreate);

        // Kembalikan success jika berhasil
        if ($resultReservasiCreate) {
            return 'success';
        } else {
            return 'error';
        }
    }
}

// Function reservasiUpdate
function reservasiUpdate($data) {
    global $connection;

    // Ambil data reservasi dari array $data
    $idReservasi = $data['idReservasi'];
    $tanggalReservasi = $data['tanggalReservasi'];
    $waktuMulai = $data['waktuMulai'];
    $waktuSelesai = $data['waktuSelesai'];
    $noMeja = $data['noMeja'];
    $namaPelanggan = $data['namaPelanggan'];
    $catatan = $data['catatan'];
    $jumlahOrang = $data['jumlahOrang'];

    // Mengecek apakah rentang waktu bentrok dengan reservasi yang sudah ada
    $queryCheckAvailability = "SELECT COUNT(*) as jumlah FROM reservasi WHERE meja_id = '$noMeja' AND tanggal_reservasi = '$tanggalReservasi' AND
                                (
                                    ('$waktuMulai' <= waktu_selesai AND '$waktuSelesai' >= waktu_mulai)
                                ) AND id_reservasi != $idReservasi";
    $resultCheckAvailability = mysqli_query($connection, $queryCheckAvailability);
    $dataCheckAvailability = mysqli_fetch_assoc($resultCheckAvailability); 
    if ($dataCheckAvailability['jumlah'] > 0) {
        // Jika ada bentrok waktu, return bentrokWaktu
        return 'bentrokWaktu';
    } else {
        // Query SQL untuk mengedit data reservasi berdasarkan idReservasi
        $queryReservasiUpdate = "UPDATE reservasi SET tanggal_reservasi='$tanggalReservasi', waktu_mulai='$waktuMulai', waktu_selesai='$waktuSelesai', meja_id='$noMeja', pelanggan_id='$namaPelanggan', catatan='$catatan', jumlah_orang='$jumlahOrang' WHERE id_reservasi = $idReservasi";
        $resultReservasiUpdate = mysqli_query($connection, $queryReservasiUpdate);
    
        if ($resultReservasiUpdate) {
            // Jika update berhasil
            return 'success';
        } else {
            // Jika delete gagal, tampilkan error
            die("Error: " . mysqli_error($connection));
        }
    }
}

// Function reservasiDelete
function reservasiDelete($idReservasi) {
    global $connection;

    // Query SQL untuk menghapus data reservasi
    $queryReservasiDelete = "DELETE FROM reservasi WHERE id_reservasi = $idReservasi";
    $resultReservasiDelete = mysqli_query($connection, $queryReservasiDelete);

    if ($resultReservasiDelete) {
        // Jika delete berhasil
        return true;
    } else {
        // Jika delete gagal, tampilkan error
        die("Error: " . mysqli_error($connection));
    }
}
?>