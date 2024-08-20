document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('noMeja');
    const jumlahOrangInput = document.getElementById('jumlahOrang');
    const kapasitasElement = document.getElementById('kapasitasMeja');
    const keteranganKapasitas = document.getElementById('keteranganKapasitas');

    // Memperbarui kapasitas dan atribut max serta min pada input jumlah orang
    selectElement.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const kapasitas = selectedOption.getAttribute('data-kapasitas');

        // Perbarui keterangan kapasitas
        kapasitasElement.textContent = `Kapasitas: ${kapasitas}`;

        // Setel atribut max dan keterangan kapasitas pada input jumlah orang
        jumlahOrangInput.setAttribute('max', kapasitas);
        keteranganKapasitas.textContent = `Max ${kapasitas} Orang`;

        // Reset nilai input jumlah orang jika lebih dari kapasitas
        if (jumlahOrangInput.value > kapasitas) {
            jumlahOrangInput.value = kapasitas;
        }
    });

    // Validasi input jumlah orang untuk memastikan tidak melebihi kapasitas dan minimal 1
    jumlahOrangInput.addEventListener('input', function() {
        const max = parseInt(jumlahOrangInput.getAttribute('max'), 10);
        const min = parseInt(jumlahOrangInput.getAttribute('min'), 10);

        if (this.value > max) {
            this.value = max;
        } else if (this.value < min) {
            this.value = min;
        }
    });

    // Inisialisasi kapasitas, atribut max, dan keterangan saat halaman dimuat
    jumlahOrangInput.setAttribute('max', '');
    jumlahOrangInput.setAttribute('min', '1');
    kapasitasElement.textContent = '';
    keteranganKapasitas.textContent = '';
});