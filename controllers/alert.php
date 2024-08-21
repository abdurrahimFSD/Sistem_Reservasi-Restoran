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
    }
}
?>