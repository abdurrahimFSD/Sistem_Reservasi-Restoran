// Alert update untuk pelangganUpdate
document.getElementById('simpanPelangganUpdate').addEventListener('click', function() {
    Swal.fire({
        title: 'Apakah anda ingin menyimpan perubahan ini?',
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika user mengkonfirmasi 'Simpan', kirim form melalui AJAX
            const form = document.getElementById('pelangganUpdateForm');
            const formData = new FormData(form);

            fetch('./controllers/process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(response => {
                if (response === 'successPelangganUpdate') {
                    Swal.fire('Tersimpan!', '', 'success').then(() => {
                        window.location.href = './index.php?page=pelangganData';
                    });
                } else if (response === 'errorPelangganUpdate') {
                    Swal.fire('Gagal', 'Data pelanggan gagal diedit', 'error');
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
