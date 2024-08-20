<?php

include('./controllers/function.php');

// Mendapatkan total reservasi
$totalReservasi = getTotalReservasi();

// Mendapatkan jumlah meja yang tersedia
$mejaTersedia = getMejaTersedia(); 

// Mendapatkan total pelanggan
$totalPelanggan = getTotalPelanggan();
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
                                <h4 class="card-title mb-1">87</h4>
                                <p class="card-subtitle">Reservasi Hari Ini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

      
    </div>
</div>
<!-- End Body Wrapper -->

        