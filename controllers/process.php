<?php

include('./function.php');
include('./alert.php');

// Mengecek apakah form telah di submit/simpan
if (isset($_POST['simpan'])) {

    // Jika tombol simpan adalah mejaCreate
    if ($_POST['simpan'] == 'mejaCreate') {
        // Memanggil fungsi mejaCreate
        $result = mejaCreate($_POST);

        // Jika proses create berhasil
        if ($result) {
            echo "
                <script>
                    alert('Data meja berhasil ditambah');
                    // Redirect ke halaman utama setelah alert
                    window.location.href = '../index.php?page=mejaData';
                </script>
            ";
        } 
        
    } elseif ($_POST['simpan'] == 'mejaUpdate') {   // Jika tombol simpan adalah mejaUpdate
        // Memanggil fungsi mejaUpdate
        $result = mejaUpdate($_POST);

        // Jika proses update berhasil
        if ($result) {
            echo "
                <script>
                    alert('Data meja berhasil diedit');
                    // Redirect ke halaman utama setelah alert
                    window.location.href = '../index.php?page=mejaData';
                </script>
            ";
        } 
    } elseif ($_POST['simpan'] == 'pelangganCreate') {  // Jika tombol simpan adalah pelangganCreate
        // Memanggil fungsi pelangganCreate
        $result = pelangganCreate($_POST);

        // Jika proses create berhasil
        if ($result) {
            echo "
                <script>
                    alert('Data pelanggan berhasil ditambahkan');
                    // Redirect ke halaman utama setelah alert
                    window.location.href = '../index.php?page=pelangganData';
                </script>
            ";
        }
    } elseif ($_POST['simpan'] == 'pelangganUpdate') {  // Jika tombol simpan adalah pelangganUpdate
        // Memanggil fungsi pelangganUpdate
        $result = pelangganUpdate($_POST);

         // Jika proses update berhasil
        if ($result) {
            echo "
                <script>
                    alert('Data pelanggan berhasil diedit');
                    // Redirect ke halaman utama setelah alert
                    window.location.href = '../index.php?page=pelangganData';
                </script>
            ";
        }
    } elseif ($_POST['simpan'] == 'reservasiCreate') {  // Jika tombol simpan adalah reservasiCreate
        // Memanggil fungsi reservasiCreate
        $result = reservasiCreate($_POST);

         // Jika proses create berhasil
         if ($result) {
            echo "
                <script>
                    alert('Data reservasi berhasil ditambahkan');
                    // Redirect ke halaman reservasiData setelah alert
                    window.location.href = '../index.php?page=reservasiData';
                </script>
            ";
        }
    } elseif ($_POST['simpan'] == 'reservasiUpdate') {  // Jika tombol simpan adalah reservasiUpdate
        // Memanggail fungsi reservasiUpdate
        $result = reservasiUpdate($_POST);

        // Jika proses update berhasil
        if ($result) {
            echo "
                <script>
                    alert('Data reservasi berhasil diedit');
                    // Redirect ke halaman reservasiData setelah alert
                    window.location.href = '../index.php?page=reservasiData';
                </script>
            ";
        }
    }
}


// Mengecek apakah parameter 'id_meja' ada di URL untuk menghapus meja
if (isset($_GET['id_meja'])) {
    $resultMeja = mejaDelete($_GET['id_meja']);

    // Jika proses penghapusan meja berhasil
    if ($resultMeja) {
        echo "
            <script>
                alert('Data meja berhasil dihapus');
                // Redirect ke halaman meja setelah alert
                window.location.href = '../index.php?page=mejaData';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menghapus data meja');
                window.history.back();
            </script>
        ";
    }
}

// Mengecek apakah parameter 'id_pelanggan' ada di URL untuk menghapus pelanggan
if (isset($_GET['id_pelanggan'])) {
    $resultPelanggan = pelangganDelete($_GET['id_pelanggan']);

    // Jika proses penghapusan pelanggan berhasil
    if ($resultPelanggan) {
        echo "
            <script>
                alert('Data pelanggan berhasil dihapus');
                // Redirect ke halaman pelanggan setelah alert
                window.location.href = '../index.php?page=pelangganData';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menghapus data pelanggan');
                window.history.back();
            </script>
        ";
    }
}

// Mengecek apakah parameter 'id_reservasi' ada di URL untuk menghapus reservasi
if (isset($_GET['id_reservasi'])) {
    $resultReservasi = reservasiDelete($_GET['id_reservasi']);

    // Jika proses penghapusan reservasi berhasil
    if ($resultReservasi) {
        echo "
            <script>
                alert('Data reservasi berhasil dihapus');
                // Redirect ke halaman reservasi setelah alert
                window.location.href = '../index.php?page=reservasiData';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menghapus data reservasi');
                window.history.back();
            </script>
        ";
    }
}

?>