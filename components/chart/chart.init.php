<script>
    var ctx = document.getElementById('reservasiChart').getContext('2d');
    
    // Data Mingguan dengan informasi tanggal
    var dataMingguan = {
        labels: <?= json_encode(array_keys($reservasiMingguan)); ?>,
        datasets: [{
            label: 'Total Reservasi Mingguan',
            data: <?= json_encode(array_column($reservasiMingguan, 'total')); ?>,
            backgroundColor: '#3B82F6', // Biru Sedang
            borderColor: '#1E40AF', // Biru Tua
            borderWidth: 1,
            // Tambahkan tanggal untuk tooltip
            tanggal: <?= json_encode(array_column($reservasiMingguan, 'tanggal')); ?>
        }]
    };
    
    // Data Bulanan
    var dataBulanan = {
        labels: <?= json_encode($dataBulan); ?>,
        datasets: [{
            label: 'Total Reservasi Bulanan',
            data: <?= json_encode($dataTotalReservasi); ?>,
            backgroundColor: '#3B82F6', // Biru Sedang
            borderColor: '#1E40AF', // Biru Tua
            borderWidth: 1,
            tahun: <?= json_encode($dataTahun); ?> // Menyimpan tahun untuk tooltip
        }]
    };
    
    
    var reservasiChart = new Chart(ctx, {
        type: 'bar',
        data: dataBulanan, // Default: data bulanan
        options: {
            scales: {
                y: {
                    beginAtZero: true
                },
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: '#1E40AF' // Warna teks legend biru tua
                    }
                },
                tooltip: {
                    callbacks: {
                        title: function(tooltipItems) {
                            // Mengambil data dari tooltipItem
                            var tooltipItem = tooltipItems[0];
                            var dataset = tooltipItem.dataset;
                            var tanggal = dataset.tanggal ? dataset.tanggal[tooltipItem.dataIndex] : '';
    
                            if (tanggal) {
                                // Ubah format tanggal dari 'YYYY-MM-DD' menjadi 'DD-MM-YYYY'
                                var parts = tanggal.split('-');
                                tanggal = parts[2] + '-' + parts[1] + '-' + parts[0];
                            }
    
                            // Gabungkan hari dengan tanggal, bulan, dan tahun
                            return tooltipItem.label + (tanggal ? ' (' + tanggal + ')' : '');
                        },
                        label: function(tooltipItem) {
                            var dataset = tooltipItem.dataset;
                            var value = dataset.data[tooltipItem.dataIndex] || 0;
    
                            return dataset.label + ': ' + value;
                        }
                    }
                }
            }
        }
    });
    
    // Switch between weekly and monthly data
    document.getElementById('toggleView').addEventListener('change', function() {
        if (this.checked) {
            reservasiChart.data = dataMingguan;
            reservasiChart.options.scales.x.title.text = 'Hari';
        } else {
            reservasiChart.data = dataBulanan;
            reservasiChart.options.scales.x.title.text = 'Bulan';
        }
        reservasiChart.update();
    });
    
    
    
    
    var ctx2 = document.getElementById('reservasiKapasitasChart').getContext('2d');
    var reservasiKapasitasChart = new Chart(ctx2, {
        type: 'doughnut', // Ubah tipe chart menjadi doughnut
        data: {
            labels: <?= json_encode($dataKapasitas); ?>,
            datasets: [{
                label: 'Jumlah Reservasi',
                data: <?= json_encode($dataTotalReservasiKapasitas); ?>,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.8)',  // Warna 1
                    'rgba(54, 162, 235, 0.8)',  // Warna 2
                    'rgba(255, 159, 64, 0.8)',  // Warna 3
                    'rgba(255, 99, 132, 0.8)',  // Warna 4
                    'rgba(153, 102, 255, 0.8)', // Warna 5
                    'rgba(255, 206, 86, 0.8)',  // Warna 6
                    'rgba(201, 203, 207, 0.8)',  // Warna 7
                    'rgba(83, 102, 255, 0.8)',  // Warna 8
                    'rgba(255, 105, 97, 0.8)',  // Warna 9
                    'rgba(150, 255, 150, 0.8)'  // Warna 10
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',  // Warna 1
                    'rgba(54, 162, 235, 1)',  // Warna 2
                    'rgba(255, 159, 64, 1)',  // Warna 3
                    'rgba(255, 99, 132, 1)',  // Warna 4
                    'rgba(153, 102, 255, 1)', // Warna 5
                    'rgba(255, 206, 86, 1)',  // Warna 6
                    'rgba(201, 203, 207, 1)',  // Warna 7
                    'rgba(83, 102, 255, 1)',  // Warna 8
                    'rgba(255, 105, 97, 1)',  // Warna 9
                    'rgba(150, 255, 150, 1)'  // Warna 10
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'top', // Posisi legend
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            var label = tooltipItem.label || '';
                            var value = tooltipItem.raw || 0;
                            return 'Total Reservasi ' + ': ' + value; // Menampilkan "Kapasitas" di tooltip
                        }
                    }
                }
            }
        }
    });
</script>