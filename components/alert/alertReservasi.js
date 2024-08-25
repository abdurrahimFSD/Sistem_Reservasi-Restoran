// Alert update untuk reservasiUpdate
document.getElementById('simpanReservasiUpdate').addEventListener('click', function() {
    Swal.fire({
        title: 'Apakah anda ingin menyimpan perubahan ini?',
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika user mengkonfirmasi 'Simpan', kirim form melalui AJAX
            const form = document.getElementById('reservasiUpdateForm');
            const formData = new FormData(form);

            fetch('./controllers/process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(response => {
                if (response === 'successReservasiUpdate') {
                    Swal.fire('Tersimpan!', '', 'success').then(() => {
                        window.location.href = './index.php?page=reservasiData';
                    });
                } else if (response === 'errorReservasiUpdate') {
                    Swal.fire('Gagal', 'Data reservasi gagal diedit', 'error');
                }
            })
            .catch(error => {
                Swal.fire('Gagal', 'Terjadi Kesalahan', 'error');
            });
        } else if (result.isDismissed) {
            Swal.fire('Perubahan dibatalkan', '', 'info');
        }
    });
});