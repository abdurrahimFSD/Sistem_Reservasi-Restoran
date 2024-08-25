// Alert update untuk mejaUpdate
document.getElementById('simpanMejaUpdate').addEventListener('click', function() {
    Swal.fire({
        title: 'Apakah anda ingin menyimpan perubahan ini?',
        showCancelButton: true, // Menampilkan tombol "Cancel"
        confirmButtonText: 'Simpan', // Tombol "Simpan"
        cancelButtonText: 'Batal', // Tombol "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika pengguna mengkonfirmasi "Simpan", kirim formulir melalui AJAX
            const form = document.getElementById('mejaUpdateForm');
            const formData = new FormData(form);

            fetch('./controllers/process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(response => {
                if (response === 'successMejaUpdate') {
                    Swal.fire('Tersimpan!', '', 'success').then(() => {
                        window.location.href = './index.php?page=mejaData';
                    });
                } else if (response === 'errorMejaUpdate') {
                    Swal.fire('Gagal!', 'Data meja gagal diedit', 'error');
                }
            })
            .catch(error => {
                Swal.fire('Gagal!', 'Terjadi kesalahan', 'error');
            });
        } else if (result.isDismissed) {
            Swal.fire('Perubahan dibatalkan', '', 'info');
        }
    });
});