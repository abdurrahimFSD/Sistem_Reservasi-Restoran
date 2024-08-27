// Mengecek apakah URL mengandung parameter status
const urlParams = new URLSearchParams(window.location.search);
const status = urlParams.get('status');
const noMejaDuplikat = urlParams.get('no_meja');

// Kode alert untuk create
if (status === 'successMejaCreate') {
    Swal.fire({
        title: 'Berhasil',
        text: 'Data meja berhasil ditambah',
        icon: 'success'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = './index.php?page=mejaData';
        }
    });
} else if (status === 'successPelangganCreate') {
    Swal.fire({
        title: 'Berhasil',
        text: 'Data pelanggan berhasil ditambah',
        icon: 'success'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = './index.php?page=pelangganData';
        }
    });
} else if (status === 'successReservasiCreate') {
    Swal.fire({
        title: 'Berhasil',
        text: 'Data reservasi berhasil ditambah',
        icon: 'success'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = './index.php?page=reservasiData';
        }
    });
} else if (status === 'duplicateMejaCreate' && noMejaDuplikat) {
    Swal.fire({
        title: 'Gagal',
        text: `No Meja ${noMejaDuplikat} sudah ada, tidak boleh sama`,
        icon: 'warning'
    }).then((result) => {
        if (result.isConfirmed) {
            history.back();
        }
    });
} else if (status === 'bentrokWaktu') {
    Swal.fire({
        title: 'Gagal!',
        text: 'Maaf, meja ini sudah dipesan pada rentang waktu yang dipilih',
        icon: 'error'
    }).then((result) => {
        if (result.isConfirmed) {
            history.back();
        }
    });
} else if (status === 'errorMejaCreate') {
    Swal.fire({
        title: 'Gagal',
        text: 'Data meja gagal ditambah',
        icon: 'error'
    }).then((result) => {
        if (result.isConfirmed) {
            history.back();
        }
    });
}


// Kode alert untuk update
function setupUpdateButton(buttonId, formId, successStatus, successRedirectPage, successMessage, errorStatus) {
    const button = document.getElementById(buttonId);
    if (button) {
        button.addEventListener('click', function() {
            Swal.fire({
                title: 'Apakah Anda ingin menyimpan perubahan ini?',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengkonfirmasi "Simpan", kirim formulir melalui AJAX
                    const form = document.getElementById(formId);
                    const formData = new FormData(form);

                    fetch('./controllers/process.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(response => {
                        if (response === successStatus) {
                            Swal.fire('Tersimpan', successMessage, 'success').then(() => {
                                window.location.href = `./index.php?page=${successRedirectPage}`;
                            });
                        } else if (response.startsWith('duplicate|')) {    // Jika user memasukkan no meja yg sama
                            const parts = response.split('|');
                            const noMeja = parts[1]; // Mengambil nomor meja dari respons
                            Swal.fire('Gagal', `No meja ${noMeja} sudah ada, tidak boleh sama`, 'warning');
                        } else if (response === errorStatus) {
                            Swal.fire('Gagal!', '', 'error');
                        }
                    })
                    .catch(error => {
                        Swal.fire('Gagal!', 'Terjadi kesalahan.', 'error');
                    });
                } else if (result.isDismissed) {
                    Swal.fire('Perubahan dibatalkan', '', 'info');
                }
            });
        });
    }
}

// Mengatur tombol update untuk meja
setupUpdateButton('simpanMejaUpdate', 'mejaUpdateForm', 'successMejaUpdate' ,'mejaData', 'Data meja berhasil diedit', 'errorMejaUpdate');

// Mengatur tombol update untuk pelanggan
setupUpdateButton('simpanPelangganUpdate', 'pelangganUpdateForm', 'successPelangganUpdate' ,'pelangganData', 'Data pelanggan berhasil diedit', 'errorPelangganUpdate');

// Mengatur tombol update untuk reservasi
setupUpdateButton('simpanReservasiUpdate', 'reservasiUpdateForm', 'successReservasiUpdate' ,'reservasiData', 'Data reservasi berhasil diedit', 'errorReservasiUpdate');


// Kode alert untuk delete
if (document.getElementById('deleteButtonMeja') || 
    document.getElementById('deleteButtonPelanggan') || 
    document.getElementById('deleteButtonReservasi')) {
    
    function confirmDelete(id, type) {
        let url, successMessage, errorMessage, redirectPage;

        switch (type) {
            case 'meja':
                url = `./controllers/process.php?id_meja=${id}`;
                successMessage = "Data meja berhasil dihapus";
                errorMessage = "Data meja gagal dihapus";
                redirectPage = './index.php?page=mejaData';
                break;
            case 'pelanggan':
                url = `./controllers/process.php?id_pelanggan=${id}`;
                successMessage = "Data pelanggan berhasil dihapus";
                errorMessage = "Data pelanggan gagal dihapus";
                redirectPage = './index.php?page=pelangganData';
                break;
            case 'reservasi':
                url = `./controllers/process.php?id_reservasi=${id}`;
                successMessage = "Data reservasi berhasil dihapus";
                errorMessage = "Data reservasi gagal dihapus";
                redirectPage = './index.php?page=reservasiData';
                break;
            default:
                return;
        }

        Swal.fire({
            title: "Hapus",
            text: "Apakah Anda yakin menghapus data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus",
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(url)
                    .then(response => response.text())
                    .then(response => {
                        if (response === 'successDelete') {
                            Swal.fire({
                                title: "Dihapus",
                                text: successMessage,
                                icon: "success"
                            }).then(() => {
                                window.location.href = redirectPage;
                            });
                        } else if (response === 'errorDelete') {
                            Swal.fire("Gagal!", errorMessage, "error");
                        }
                    })
                    .catch(error => {
                        Swal.fire("Gagal!", "Terjadi kesalahan.", "error");
                    });
            }
        });
    }
}
