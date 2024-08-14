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
                            <iconify-icon icon="solar:user-plus-line-duotone" class="align-middle ms-1 me-1"></iconify-icon>
                            <span class="align-middle">Edit Daftar Pelanggan</span>
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card Header -->

            <!-- Start Card body main content -->
            <div class="card card-body">
                <h4 class="card-title">Masukkan Data Pelanggan</h4>
                <hr class="mb-4">
                <form class="form-horizontal" action="./controllers/process.php" method="post">
                    <div class="mb-3">
                        <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="namaPelanggan" id="namaPelanggan" placeholder="Ahmad" required>
                    </div>
                    <div class="mb-3">  
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Finland" required>
                    </div>
                    <div class="mb-4">
                        <label for="noTelepon" class="form-label">No Telepon</label>
                        <input type="number" class="form-control" name="noTelepon" id="noTelepon" placeholder="081347200001" required>
                    </div>
                    <a href="?page=pelangganData" class="d-inline-flex justify-content-center align-items-center btn btn-outline-secondary me-2">
                        <iconify-icon icon="fluent:arrow-left-24-filled" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Kembali
                    </a>
                    <button type="submit" name="simpan" value="pelangganUpdate" class="d-inline-flex justify-content-center align-items-center btn btn-primary">
                        <iconify-icon icon="fluent:save-24-regular" class="me-1 fs-5 d-inline-flex align-items-center"></iconify-icon>Simpan
                    </button>
                </form>
            </div>
            <!-- ENd Card body main content -->
        </div>
    </div>
    
</div>
<!-- End Body Wrapper -->