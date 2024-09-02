<?php
include('../../controllers/authController.php');

session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: ../../");
    exit();
}

$error = ""; // Inisialisasi variabel error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (signin($username, $password)) {
        echo json_encode(["success" => true]);
        exit();
    } else {
        $error = "Username atau Password salah!";
        echo json_encode(["success" => false, "message" => $error]);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignIn</title>

    <!-- Core Css -->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="link-sidebar">
    <div id="main-wrapper">
        <div class="position-relative overflow-hidden auth-bg min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100 my-5 my-xl-0">
                    <div class="col-md-8 col-lg-6 auth-card">
                        <div class="card mb-0 bg-body auth-login m-auto w-100">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                                    <span class="fw-bolder fs-7">SignIn</span>
                                </a>
                                <form id="signinForm" method="POST" action="">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required minlength="8">
                                        <div class="text-danger mt-1 fw-bold">
                                            <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
                                        </div>
                                    </div>
                                    <button type="submit" id="signinButton" class="btn btn-dark w-100 py-8 mb-4 rounded-2">
                                        <span id="signinText">Sign In</span>
                                        <span id="signinIcon" class="spinner-border spinner-border-sm" style="display: none;" role="status" aria-hidden="true"></span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <p class="fs-4 mb-0 text-dark">Don’t have an account yet?</p>
                                        <a class="text-primary fw-medium ms-2" href="./signup.php">Sign Up Now</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    document.getElementById('signinForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form dari submit default
        const signinButton = document.getElementById('signinButton');
        const signinText = document.getElementById('signinText');
        const signinIcon = document.getElementById('signinIcon');

        // Membersihkan pesan kesalahan sebelumnya
        document.querySelector('.text-danger').innerHTML = '';

        // Mengatur ulang ikon dan teks tombol sebelum mulai proses login
        signinIcon.classList.remove('bi', 'bi-check-lg', 'bi-x-lg');
        signinIcon.classList.add('spinner-border', 'spinner-border-sm');
        signinIcon.style.display = 'inline-block';
        signinText.textContent = 'Signing In...';

        // Mengirim data form via AJAX
        const formData = new FormData(this);

        fetch('', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Menjaga spinner berputar setidaknya selama 1 detik
            setTimeout(() => {
                if (data.success) {
                    // Jika login berhasil
                    signinIcon.classList.remove('spinner-border', 'spinner-border-sm');
                    signinIcon.classList.add('bi', 'bi-check-lg'); // Menggunakan ikon Bootstrap
                    signinText.textContent = 'Success';

                    // Redirect ke halaman utama setelah 1 detik
                    setTimeout(function() {
                        window.location.href = "../../";
                    }, 1000);
                } else {
                    // Jika login gagal
                    signinIcon.classList.remove('spinner-border', 'spinner-border-sm');
                    signinIcon.classList.add('bi', 'bi-x-lg'); // Menggunakan ikon gagal
                    signinText.textContent = 'Failed';

                    // Tampilkan pesan error
                    document.querySelector('.text-danger').innerHTML = `<p>${data.message}</p>`;

                    // Mengembalikan tombol ke keadaan awal setelah 2 detik
                    setTimeout(function() {
                        signinIcon.style.display = 'none';
                        signinIcon.classList.remove('bi-x-lg'); // Menghapus ikon gagal
                        signinText.textContent = 'Sign In';
                    }, 2000);
                }
            }, 1000); // Menjaga spinner selama setidaknya 1 detik
        })
        .catch(error => {
            console.error('Error:', error);
            signinIcon.classList.remove('spinner-border', 'spinner-border-sm');
            signinIcon.classList.add('bi', 'bi-x-lg'); // Menggunakan ikon gagal
            signinText.textContent = 'Error';

            // Tampilkan pesan error umum
            document.querySelector('.text-danger').innerHTML = `<p>Terjadi kesalahan pada koneksi. Silakan coba lagi.</p>`;

            // Mengembalikan tombol ke keadaan awal setelah 2 detik
            setTimeout(function() {
                signinIcon.style.display = 'none';
                signinIcon.classList.remove('bi-x-lg'); // Menghapus ikon gagal
                signinText.textContent = 'Sign In';
            }, 2000);
        });
    });
    </script>
    
</body>
</html>