<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-layout="vertical">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APP Admin Dashboard</title>
    
    <!-- Core Css -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="./assets/libs/sweetalert/sweetalert2.min.css">
    <script src="./assets/libs/sweetalert/sweetalert2.all.min.js"></script>

    <!-- Datatable -->
    <link rel="stylesheet" href="./assets/libs/datatable/datatables.min.css">

    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        html {
            display: none; 
        }
    </style>
    <script>
        (function() {
            const savedTheme = localStorage.getItem('selectedTheme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
            document.documentElement.style.display = 'block'; 
        })();
    </script>
</head>
<body class="link-sidebar">

    <!-- Main Wrapper Start -->
    <div id="main-wrapper">