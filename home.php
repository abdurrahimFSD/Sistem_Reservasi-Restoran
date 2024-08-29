<?php

include('./controllers/function.php');

// Mendapatkan total reservasi
$totalReservasi = getTotalReservasi();

// Mendapatkan jumlah meja yang tersedia
$mejaTersedia = getMejaTersedia(); 

// Mendapatkan total pelanggan
$totalPelanggan = getTotalPelanggan();

// Mendapatkan jumlah reservasi hari ini
$reservasiHariIni = getReservasiHariIni();

// Mendapatkan data untuk chart
$reservasiBulanan = getReservasiBulanan();
$reservasiMingguan = getReservasiMingguan();
$reservasiKapasitas = getReservasiKapasitas();

// Menyiapkan data untuk chart Tren Reservasi Bulanan
$dataBulan = [];
$dataTotalReservasi = [];

foreach ($reservasiBulanan as $row) {
    $dataBulan[] = $row['bulan']; // Nama bulan dengan tahun
    $dataTotalReservasi[] = $row['total'];
}

// Menyiapkan data untuk chart Tren Reservasi Mingguan
$dataHari = array_keys($reservasiMingguan);
$dataTotalReservasiMingguan = array_values($reservasiMingguan);

// Menyiapkan data untuk chart Reservasi Berdasarkan Kapasitas Meja
$dataKapasitas = [];
$dataTotalReservasiKapasitas = [];

foreach ($reservasiKapasitas as $row) {
    $dataKapasitas[] = $row['kapasitas'];
    $dataTotalReservasiKapasitas[] = $row['total'];
}
?>

<!-- Start Body Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Dashboard Header -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:calendar" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">
                                    <?= $totalReservasi; ?>
                                </h4>
                                <p class="card-subtitle">Total Reservasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:layout-grid" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">
                                    <?= $mejaTersedia; ?>
                                </h4>
                                <p class="card-subtitle">Meja Tersedia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:users" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">
                                    <?= $totalPelanggan; ?>
                                </h4>
                                <p class="card-subtitle">Total Pelanggan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                                <iconify-icon icon="tabler:clock" class="fs-6"></iconify-icon>
                            </div>
                            <div class="align-self-center">
                                <h4 class="card-title mb-1">
                                    <?= $reservasiHariIni; ?>
                                </h4>
                                <p class="card-subtitle">Reservasi Hari Ini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row for Charts -->
        <div class="row mt-4">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Tren Reservasi</h5>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="toggleView">
                                <label class="form-check-label" for="toggleView">Mingguan</label>
                            </div>
                        </div>
                        <canvas id="reservasiChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reservasi Berdasarkan Kapasitas Meja</h5>
                        <canvas id="reservasiKapasitasChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

 
    </div>
</div>
<!-- End Body Wrapper -->