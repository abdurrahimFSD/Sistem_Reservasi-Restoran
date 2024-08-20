document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('noMeja');
    const jumlahOrangInput = document.getElementById('jumlahOrang');
    const kapasitasElement = document.getElementById('kapasitasMeja');
    const keteranganKapasitas = document.getElementById('keteranganKapasitas');

    // Fungsi untuk memperbarui kapasitas dan atribut max pada input jumlah orang
    function updateKapasitas() {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const kapasitas = selectedOption.getAttribute('data-kapasitas');

        // Jika kapasitas ada, perbarui tampilan
        if (kapasitas) {
            kapasitasElement.textContent = `Kapasitas: ${kapasitas}`;
            jumlahOrangInput.setAttribute('max', kapasitas);
            keteranganKapasitas.textContent = `Max ${kapasitas} Orang`;

            // Reset nilai input jumlah orang jika lebih dari kapasitas
            if (jumlahOrangInput.value > kapasitas) {
                jumlahOrangInput.value = kapasitas;
            }
        } else {
            kapasitasElement.textContent = '';
            keteranganKapasitas.textContent = '';
        }
    }

    // Cek apakah ini halaman Create atau Update
    const isUpdatePage = jumlahOrangInput.value !== ''; // Jika input jumlahOrang sudah terisi, berarti ini halaman update

    // Hanya tampilkan kapasitas di halaman Update atau setelah No Meja dipilih di halaman Create
    if (isUpdatePage) {
        updateKapasitas(); // Tampilkan kapasitas langsung di halaman Update
    }

    // Tambahkan event listener untuk memperbarui kapasitas saat meja dipilih
    selectElement.addEventListener('change', updateKapasitas);

    // Validasi input jumlah orang
    jumlahOrangInput.addEventListener('input', function() {
        const max = parseInt(jumlahOrangInput.getAttribute('max'), 10);
        const min = parseInt(jumlahOrangInput.getAttribute('min'), 10);

        // Izinkan nilai kosong
        if (this.value === '') {
            return;
        }

        // Validasi input jumlah orang
        const currentValue = parseInt(this.value, 10);
        if (currentValue > max) {
            this.value = max;
        } else if (currentValue < min) {
            this.value = min;
        }
    });
});
