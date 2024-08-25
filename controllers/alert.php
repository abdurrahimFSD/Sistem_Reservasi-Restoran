<?php
if (isset($_GET['status'])) {

    if ($_GET['status'] == 'duplicateMejaCreate' && isset($_GET['no_meja'])) {
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