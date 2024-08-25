<?php
if (isset($_GET['status'])) {

    if ($_GET['status'] == 'successMejaCreate') {
?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data meja berhasil ditambah',
                icon: 'success'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './index.php?page=mejaData';
                }
            });
        </script>
<?php
    } elseif ($_GET['status'] == 'duplicateMejaCreate' && isset($_GET['no_meja'])) {
?>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'No Meja <?php echo $_GET['no_meja']; ?> sudah ada, tidak boleh sama!',
                icon: 'warning'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './index.php?page=mejaCreate';
                }
            });
        </script>
<?php
    } elseif ($_GET['status'] == 'errorMejaCreate') {
?>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Data meja gagal ditambah',
                icon: 'error'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './index.php?page=mejaCreate';
                }
            });
        </script>
<?php
    } elseif ($_GET['status'] == 'successPelangganCreate') {
?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data pelanggan berhasil ditambah',
                icon: 'success'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './index.php?page=pelangganData';
                }
            });
        </script>
<?php
    } elseif ($_GET['status'] == 'successReservasiCreate') {
?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data reservasi berhasil ditambah',
                icon: 'success'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = './index.php?page=reservasiData';
                }
            })
        </script>
<?php        
    } elseif ($_GET['status'] == 'bentrokWaktu') {
?>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Maaf, meja ini sudah dipesan pada rentang waktu yang dipilih',
                icon: 'error'
            }).then((result) => {
                if (result.isConfirmed) {
                    history.back();
                }
            })
        </script>
<?php
    }
}
?>