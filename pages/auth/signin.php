<?php
include('../../controllers/authController.php');
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
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                    </div>
                                    <button type="submit" class="btn btn-dark w-100 py-8 mb-4 rounded-2">Sign In</button>
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
    
</body>
</html>