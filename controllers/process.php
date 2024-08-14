<?php

include('./function.php');

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

        // Jika proses update berhasil
        if ($result) {
            echo "
                <script>
                    alert('Data pelanggan berhasil ditambahkan');
                    // Redirect ke halaman utama sgitetelah alert
                    window.location.href = '../index.php?page=pelangganData';
                </script>
            ";
    }
}

// Mengecek apakah parameter 'id' ada di URL untuk menentukan apakah tombol hapus diklik
if (isset($_GET['id'])) {
    // Memanggil fungsi mejaDelete untuk menghapus data meja berdasarkan id
    $result = mejaDelete($_GET);

    // Jika proses penghapusan berhasil
    if ($result) {
        echo "
            <script>
                alert('Data meja berhasil dihapus');
                // Redirect ke halaman utama setelah alert
                window.location.href = '../index.php?page=mejaData';
            </script>
        ";
    } 
}


?>