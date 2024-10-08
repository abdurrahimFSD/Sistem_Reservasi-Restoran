<?php

include('./function.php');

// Mengecek apakah form telah di submit/simpan
if (isset($_POST['simpan'])) {

    // Jika tombol simpan adalah mejaCreate
    if ($_POST['simpan'] == 'mejaCreate') {
        // Memanggil fungsi mejaCreate
        $result = mejaCreate($_POST);

        // Jika proses create berhasil
        if ($result == 'success') {
            echo 'successMejaCreate';
        } elseif ($result == 'error') {
            echo 'errorMejaCreate';
        }elseif (is_string($result)) { // Cek apakah hasilnya adalah string (no meja yang ada)
            echo 'duplicateNoMeja:' . $result; // Mengembalikan no meja yang sudah ada
        }
        
    } elseif ($_POST['simpan'] == 'mejaUpdate') {   // Jika tombol simpan adalah mejaUpdate
        // Memanggil fungsi mejaUpdate
        $result = mejaUpdate($_POST);

        // Jika proses update berhasil
        if ($result == 'success') {
            echo 'successMejaUpdate';
        } elseif ($result == 'error') {
            echo 'errorMejaUpdate';
        } elseif (is_string($result)) { 
            echo 'duplicateNoMeja:' . $result; 
        }
    } elseif ($_POST['simpan'] == 'pelangganCreate') {  // Jika tombol simpan adalah pelangganCreate
        // Memanggil fungsi pelangganCreate
        $result = pelangganCreate($_POST);

        // Jika proses create berhasil
        if ($result == 'success') {
            echo 'successPelangganCreate';
        } elseif ($result == 'error') {
            echo 'errorPelangganCreate';
        }
    } elseif ($_POST['simpan'] == 'pelangganUpdate') {  // Jika tombol simpan adalah pelangganUpdate
        // Memanggil fungsi pelangganUpdate
        $result = pelangganUpdate($_POST);

         // Jika proses update berhasil
        if ($result) {
            echo 'successPelangganUpdate';
        } else {
            echo 'errorPelangganUpdate';
        }
    } elseif ($_POST['simpan'] == 'reservasiCreate') {  // Jika tombol simpan adalah reservasiCreate
        // Memanggil fungsi reservasiCreate
        $result = reservasiCreate($_POST);

        // Jika proses create berhasil
        if ($result == 'success') {
            echo 'successReservasiCreate';
        } elseif ($result == 'bentrokWaktu') {
            echo 'bentrokWaktu';
        } elseif ($result == 'error') {
            echo 'errorReservasiCreate';
        }
    } elseif ($_POST['simpan'] == 'reservasiUpdate') {  // Jika tombol simpan adalah reservasiUpdate
        // Memanggail fungsi reservasiUpdate
        $result = reservasiUpdate($_POST);

        // Jika proses update berhasil
        if ($result == 'success') {
            echo 'successReservasiUpdate';
        } elseif ($result == 'bentrokWaktu') {
            echo 'bentrokWaktuReservasiUpdate';
        } else {
            echo 'errorReservasiUpdate';
        }
    }
}


// Mengecek apakah parameter 'id_meja' ada di URL untuk menghapus meja
if (isset($_GET['id_meja'])) {
    $resultMeja = mejaDelete($_GET['id_meja']);

    // Jika proses penghapusan meja berhasil
    if ($resultMeja) {
        echo "successDelete";
    } else {
        echo "errorDelete";
    }
}

// Mengecek apakah parameter 'id_pelanggan' ada di URL untuk menghapus pelanggan
if (isset($_GET['id_pelanggan'])) {
    $resultPelanggan = pelangganDelete($_GET['id_pelanggan']);

    // Jika proses penghapusan pelanggan berhasil
    if ($resultPelanggan) {
        echo "successDelete";
    } else {
        echo "errorDelete";
    }
}

// Mengecek apakah parameter 'id_reservasi' ada di URL untuk menghapus reservasi
if (isset($_GET['id_reservasi'])) {
    $resultReservasi = reservasiDelete($_GET['id_reservasi']);

    // Jika proses penghapusan reservasi berhasil
    if ($resultReservasi) {
        echo "successDelete";
    } else {
        echo "errorDelete";
    }
}

?>