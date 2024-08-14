<!-- Start Body Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card card-body py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-space-between">
                        <h4 class="mb-4 mb-sm-0 card-title">Data Pelanggan</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="./">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                    <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                <li class="breadcrumb-item my-auto" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary"> Data Pelanggan </span>
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
                            <iconify-icon icon="solar:users-group-rounded-line-duotone" class="me-1 align-middle"></iconify-icon>
                            <span class="align-middle">Daftar Pelanggan</span>
                        </h3>
                    </div>
                    <div class="col-md-6 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        <a href="?page=mejaCreate" id="btn-add-data" class="btn btn-primary d-inline-flex justify-content-center align-items-center">
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
                            <th>No Meja</th>
                            <th>Kapasitas</th>
                            <th>Posisi</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                                include('./controllers/function.php');

                                $mejaData = fetchData('meja');
                                $no = 1;

                                foreach ($mejaData as $row) {
                            ?>
                            <!-- start row -->
                            <tr class="search-items">
                                <td class="text-dark">
                                    <?= $no++; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['no_meja']; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['kapasitas']; ?>
                                </td>
                                <td class="text-dark">
                                    <?= $row['posisi']; ?>
                                </td>
                                <td class="text-center">
                                    <div class="action-btn">
                                        <a href="?page=mejaUpdate&id=<?= $row['id_meja']; ?>" class="d-inline-flex btn btn-sm btn-outline-warning edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <iconify-icon icon="tabler:edit" class="fs-5"></iconify-icon>
                                        </a>
                                        <a href="./controllers/process.php?id=<?= $row['id_meja']; ?>" onclick="return confirm('Apakah yakin menghapus data!')" class="d-inline-flex btn btn-sm btn-danger delete ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
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