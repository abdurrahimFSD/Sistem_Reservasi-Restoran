<!-- Start Body Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card card-body py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-space-between">
                        <h4 class="mb-4 mb-sm-0 card-title">Data Reservasi</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="./">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                    <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                <li class="breadcrumb-item my-auto" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary"> Data Reservasi </span>
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
                    <div class="col-md-6">
                        <h3 class="mb-0 d-inline-flex justify-content-center align-items-center">
                            <iconify-icon icon="solar:card-2-line-duotone" class="me-1 align-middle"></iconify-icon>
                            <span class="align-middle">Daftar Reservasi</span>
                        </h3>
                    </div>
                    <div class="col-md-6 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        <a href="?page=reservasiCreate" id="btn-add-data" class="btn btn-primary d-inline-flex justify-content-center align-items-center">
                            <iconify-icon icon="fluent:add-24-filled" class="text-white me-1 fs-5 d-inline-flex align-items-center"></iconify-icon> Tambah Data
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Card Header -->

            <!-- Start Card body main content -->
            <div class="card card-body">
                <div class="table-responsive">
                    <table id="dataTables" class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <th>No</th>
                            <th>Tanggal Reservasi</th>
                            <th>No Meja</th>
                            <th>Nama Pelanggan</th>
                            <th>Catatan</th>
                            <th>Jumlah Orang</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                                include('./config/connection.php');

                                $queryReservasi = "SELECT 
                                                reservasi.id_reservasi,
                                                reservasi.tanggal_reservasi,
                                                meja.no_meja,
                                                pelanggan.nama_pelanggan,
                                                reservasi.catatan,
                                                reservasi.jumlah_orang
                                            FROM 
                                                reservasi
                                            JOIN 
                                                meja ON reservasi.meja_id = meja.id_meja
                                            JOIN 
                                                pelanggan ON reservasi.pelanggan_id = pelanggan.id_pelanggan;";
                                $dataReservasi = mysqli_query($connection, $queryReservasi);
                                $no = 1;

                                foreach ($dataReservasi as $row) {
                            ?>
                            <!-- start row -->
                            <tr class="search-items">
                                <td class="text-dark">
                                    <?= $no++; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['tanggal_reservasi']; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['no_meja']; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['nama_pelanggan']; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['catatan']; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['jumlah_orang']; ?>
                                </td>
                                <td class="text-center">
                                    <div class="action-btn">
                                        <a href="?page=reservasiDetail&id_reservasi=<?= $row['id_reservasi']; ?>" class="d-inline-flex btn btn-sm btn-info edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <iconify-icon icon="tabler:info-square" class="fs-5"></iconify-icon>
                                        </a>
                                        <a href="?page=reservasiUpdate&id_reservasi=<?= $row['id_reservasi']; ?>" class="d-inline-flex btn btn-sm btn-outline-warning edit mx-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <iconify-icon icon="tabler:edit" class="fs-5"></iconify-icon>
                                        </a>
                                        <a href="#" id="deleteButtonPelanggan" onclick="confirmDelete('<?= $row['id_reservasi']; ?>', 'reservasi')"  class="d-inline-flex btn btn-sm btn-danger delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <iconify-icon icon="tabler:trash" class="fs-5"></iconify-icon>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <!-- end row -->
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ENd Card body main content -->
        </div>
    </div>
    
</div>
<!-- End Body Wrapper -->

<!-- Alert delete reservasi -->
<!-- <script>
    function confirmDelete(idReservasi) {
        Swal.fire({
            title: "Hapus?",
            text: "Apakah yakin menghapus data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`./controllers/process.php?id_reservasi=${idReservasi}`)
                    .then(response => response.text())
                    .then(response => {
                        if (response === 'successDelete') {
                            Swal.fire({
                                title: "Dihapus!",
                                text: "Data reservasi berhasil dihapus",
                                icon: "success"
                            }).then(() => {
                                window.location.href = './index.php?page=reservasiData';
                            });
                        } else if (response === 'errorDelete') {
                            Swal.fire("Gagal", "Data reservasi gagal dihapus", "error");
                        }
                    })
                    .catch(error => {
                        Swal.fire("Gagal", "Terjadi kesalahan", "error");
                    });
            }
        });
    }
</script> -->