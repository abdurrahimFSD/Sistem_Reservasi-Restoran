<?php
include('./config/connection.php');

// Ambil data dari table meja dan pelanggan
$queryMeja = "SELECT id_meja, no_meja, kapasitas FROM meja";
$resultMeja = mysqli_query($connection, $queryMeja);

$queryPelanggan = "SELECT id_pelanggan, nama_pelanggan FROM pelanggan";
$resultPelanggan = mysqli_query($connection, $queryPelanggan);
?>

<!-- Start Body Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card card-body py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-space-between">
                        <h4 class="mb-4 mb-sm-0 card-title">Tambah Data</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="./">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                    <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                <li class="breadcrumb-item my-auto" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary"> Tambah Data </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="widget-content searchable-container list">

            <!-- Start Card Header -->
            <div class="card card-body">
                <div class="row">
                    <div class="col">
                        <h3 class="mb-0 d-flex align-items-center">
                            <iconify-icon icon="solar:card-2-line-duotone" class="ms-1 me-1"></iconify-icon>
                            <span class="align-middle">Tambah Daftar Reservasi</span>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card Header -->

            <!-- Start Card body main content -->
            <div class="card card-body">
                <h4 class="card-title mb-0">Masukkan Data Reservasi</h4>
                <hr class="mb-4">
                <form id="reservasiCreateForm">
                    <div class="mb-3">
                        <label for="tanggalReservasi" class="form-label">Tanggal Reservasi</label>
                        <input type="date" class="form-control" name="tanggalReservasi" id="tanggalReservasi" onfocus="this.showPicker()" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktuMulai" class="form-label">Waktu Mulai</label>
                        <input type="time" class="form-control" name="waktuMulai" id="waktuMulai" onfocus="this.showPicker()" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktuSelesai" class="form-label">Waktu Selesai</label>
                        <input type="time" class="form-control" name="waktuSelesai" id="waktuSelesai" onfocus="this.showPicker()" required>
                    </div>
                    <div class="mb-3">
                        <label for="noMeja" class="form-label">No Meja</label>
                        <select name="noMeja" id="noMeja" class="form-select" required>
                            <option value="" disabled selected >Pilih No Meja</option> <!-- Opsi default -->
                            <?php while ($dataMeja = mysqli_fetch_assoc($resultMeja)) { ?>
                                <option value="<?= $dataMeja['id_meja']; ?>" data-kapasitas="<?= $dataMeja['kapasitas']; ?>">
                                    <?= $dataMeja['no_meja']; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <div id="kapasitasMeja" class="form-text fs-3"></div>
                    </div>                   
                    <div class="mb-3">
                        <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                        <select name="namaPelanggan" id="namaPelanggan" class="form-select" required>
                            <option value="" selected disabled>Pilih Nama Pelanggan</option>
                            <?php while ($dataPelanggan = mysqli_fetch_assoc($resultPelanggan)) { ?>
                                <option value="<?= $dataPelanggan['id_pelanggan']; ?>"> <?= $dataPelanggan['nama_pelanggan']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Makan Malam" required>
                    </div>
                    <div class="mb-4">
                        <label for="jumlahOrang" class="form-label">Jumlah Orang</label>
                        <input type="number" class="form-control" name="jumlahOrang" id="jumlahOrang" min="1" placeholder="4"  required>
                        <div id="keteranganKapasitas" class="form-text fs-3"></div>
                    </div>
                    <a href="?page=reservasiData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-secondary me-2">
                        <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Kembali
                    </a>
                    <input type="hidden" name="simpan" value="reservasiCreate">
                    <button type="submit" class="d-inline-flex justify-content-center align-items-center btn btn-primary">
                        <iconify-icon icon="fluent:save-24-regular" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Simpan
                    </button>
                </form>
            </div>
            <!-- ENd Card body main content -->
        </div>
    </div>
    
</div>
<!-- End Body Wrapper -->