<?php
include('./controllers/function.php');

// Ambil ID reservasi dari query string
$idReservasi = isset($_GET['id_reservasi']) ? intval($_GET['id_reservasi']) : 0;

// Mendapatkan detail reservasi dari database
$queryGetDetail = "SELECT r.*, m.no_meja, m.kapasitas, m.posisi, p.nama_pelanggan, p.alamat, p.no_telepon
                    FROM reservasi r
                    JOIN meja m ON r.meja_id = m.id_meja
                    JOIN pelanggan p ON r.pelanggan_id = p.id_pelanggan
                    WHERE r.id_reservasi = $idReservasi";

$resultGetDetail = mysqli_query($connection, $queryGetDetail);

if ($resultGetDetail) {
    $dataReservasi = mysqli_fetch_assoc($resultGetDetail);
} else {
    die("Error: " . mysqli_error($connection));
}
?>


<!-- Start Body Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card card-body py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-space-between">
                        <h4 class="mb-4 mb-sm-0 card-title">Detail Reservasi</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="./">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                    <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                <li class="breadcrumb-item my-auto" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary"> Detail Reservasi </span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="card card-body">
            <div class="row">
                <h3>Detail Reservasi: <?= htmlspecialchars($dataReservasi['nama_pelanggan']); ?></h3>
                <hr class="mb-4">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">ID Reservasi</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['id_reservasi']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Tanggal Reservasi</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['tanggal_reservasi']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Waktu Mulai</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['waktu_mulai']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Waktu Selesai</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['waktu_selesai']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Nomor Meja</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['no_meja']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Kapasitas Meja</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['kapasitas']); ?> orang</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Posisi Meja</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['posisi']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Nama Pelanggan</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['nama_pelanggan']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Alamat Pelanggan</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['alamat']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">No Telepon Pelanggan</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['no_telepon']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Catatan</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['catatan']); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-6 col-md-3">
                                <p class="mb-0 text-dark fw-bolder">Jumlah Orang</p>
                            </td>
                            <td class="col-6 col-md-9">
                                <p class="mb-0 text-dark"><?= htmlspecialchars($dataReservasi['jumlah_orang']); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-3">
                    <a href="?page=reservasiData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-secondary me-2">
                        <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Kembali
                    </a>
                </div>
            </div>
        </div>

    </div>
    
</div>
<!-- End Body Wrapper -->