<?php
include('../../controllers/authController.php');

session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: ../../");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (signin($username, $password)) {
        header("Location: ../../");
        exit();
    } else {
        $error = "Username atau Password salah!";
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
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
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

        // Menampilkan ikon loading dan mengganti teks tombol
        signinText.textContent = 'Signing In...';
        signinIcon.style.display = 'inline-block';

        // Simulasi waktu proses login (1 detik)
        setTimeout(function() {
            // Mengubah ikon loading menjadi ikon centang
            signinIcon.classList.remove('spinner-border', 'spinner-border-sm');
            signinIcon.classList.add('bi', 'bi-check-lg'); // Menggunakan ikon Bootstrap
            signinText.textContent = 'Success';

            // Redirect ke halaman utama setelah 1 detik
            setTimeout(function() {
                // Form sebenarnya disubmit di sini
                document.getElementById('signinForm').submit(); 
            }, 1000);
        }, 1000);
    });
    </script>
    
</body>
</html>