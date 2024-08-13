<!-- Include PHP function -->
<?php include('./controllers/function.php'); ?>

<!-- Start Body Wrapper -->
<div class="body-wrapper">
    <div class="container-fluid">

        <!-- Start Breadcrumb -->
        <div class="card card-body py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-space-between">
                        <h4 class="mb-4 mb-sm-0 card-title">Edit Data</h4>
                        <nav aria-label="breadcrumb" class="ms-auto">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item d-flex align-items-center">
                                    <a class="text-muted text-decoration-none d-flex" href="./">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </a>
                                </li>
                                    <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                <li class="breadcrumb-item my-auto" aria-current="page">
                                    <span class="badge fw-medium fs-2 bg-primary-subtle text-primary"> Edit Data </span>
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
                        <h3 class="mb-0">
                            <iconify-icon icon="solar:bedside-table-2-line-duotone" class="align-middle ms-1 me-1"></iconify-icon> <span class="align-middle">Edit Daftar Meja</span>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card Header -->

            <!-- Start Card body main content -->
            <div class="card card-body">
                <h4 class="card-title">Masukkan Data Meja</h4>
                <hr class="mb-4">
                <form class="form-horizontal" action="./controllers/process.php" method="post">
                    <input type="hidden" name="idMeja" value="<?= $data['id_meja']; ?>">
                    <div class="mb-3">
                        <label for="noMeja" class="form-label">No Meja</label>
                        <input type="text" class="form-control" name="noMeja" id="noMeja" placeholder="M01" value="<?= $data['no_meja']; ?>" required>
                    </div>
                    <div class="mb-3">  
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                        <input type="number" class="form-control" name="kapasitas" id="kapasitas" placeholder="4" value="<?= $data['kapasitas']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="posisi" class="form-label">Posisi</label>
                        <?php
                            $posisi = ['Outdoor', 'Indoor'];
                        ?>
                        <select name="posisi" id="posisi" class="form-select text-dark" required>
                            <option selected disabled>Pilih Posisi</option>
                            <?php foreach($posisi as $posisiData) { ?>
                                <option value="<?= $posisiData; ?>" <?= ($data['posisi'] == $posisiData) ? 'selected' : ''; ?> ><?= $posisiData; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <a href="?page=mejaData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-secondary me-2">
                        <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Kembali
                    </a>
                    <button type="submit" name="simpan" value="mejaUpdate" class="d-inline-flex justify-content-center align-items-center btn btn-primary">
                        <iconify-icon icon="fluent:save-24-regular" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Simpan
                    </button>
                </form>
            </div>
            <!-- ENd Card body main content -->
        </div>
    </div>
    
</div>
<!-- End Body Wrapper -->