<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-layout="vertical">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APP Admin Dashboard</title>
    
    <!-- Core Css -->
    <link rel="stylesheet" href="./assets/css/styles.css">

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

        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div>
                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div>

                    <!-- Logo Start -->
                    <div class="brand-logo d-flex align-items-center">
                        <a href="#" class="text-nowrap logo-img">
                            <h3 class="mb-0">
                                <iconify-icon icon="tdesign:system-code" class="align-middle ms-1 me-1"></iconify-icon> <span class="align-middle">APP</span>
                            </h3>
                        </a>
                    </div>
                    <!-- Logo End -->
                    
                    <!-- Sidebar Item Start -->
                    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                        <ul class="sidebar-menu" id="sidebarnav">

                            <!-- ---------------------------------- -->
                            <!-- Home Start -->
                            <!-- ---------------------------------- -->
                            <li class="nav-small-cap">
                                <iconify-icon icon="solar:menu-dots-linear" class="mini-icon"></iconify-icon>
                                <span class="hide-menu">Home</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="./" id="get-url" aria-expanded="false">
                                    <iconify-icon icon="tabler:device-analytics"></iconify-icon>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            <!-- ---------------------------------- -->
                            <!-- Home End -->
                            <!-- ---------------------------------- -->
                            
                            <li>
                                <span class="sidebar-divider lg"></span>
                            </li>

                            <!-- ---------------------------------- -->
                            <!-- Apps Start -->
                            <!-- ---------------------------------- -->
                            <li class="nav-small-cap">
                                <iconify-icon icon="solar:menu-dots-linear" class="mini-icon"></iconify-icon>
                                <span class="hide-menu">Apps</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="./menu.html" aria-expanded="false">
                                    <iconify-icon icon="solar:menu-dots-square-line-duotone"></iconify-icon>
                                    <span class="hide-menu">Menu</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                                    <iconify-icon icon="solar:menu-dots-square-line-duotone"></iconify-icon>
                                    <span class="hide-menu">Menu</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="#">
                                            <span class="icon-small"></span>
                                            <span class="hide-menu">Sub Menu</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="#">
                                            <span class="icon-small"></span>
                                            <span class="hide-menu">Sub Menu</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- ---------------------------------- -->
                            <!-- Apps End -->
                            <!-- ---------------------------------- -->

                            <li>
                                <span class="sidebar-divider lg"></span>
                            </li>

                            <!-- ---------------------------------- -->
                            <!-- More Start -->
                            <!-- ---------------------------------- -->
                            <li class="nav-small-cap">
                                <iconify-icon icon="solar:menu-dots-linear" class="mini-icon"></iconify-icon>
                                <span class="hide-menu">More</span>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">
                                    <iconify-icon icon="solar:menu-dots-square-line-duotone"></iconify-icon>
                                    <span class="hide-menu">Menu</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow primary-hover-bg" href="javascript:void(0)" aria-expanded="false">
                                    <iconify-icon icon="solar:align-left-line-duotone"></iconify-icon>
                                    <span class="hide-menu">Menu Level</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="javascript:void(0)" class="sidebar-link">
                                            <span class="icon-small"></span>
                                            <span class="hide-menu">Level 1</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                            <span class="icon-small"></span>
                                            <span class="hide-menu">Level 1.1</span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse two-level">
                                            <li class="sidebar-item">
                                                <a href="javascript:void(0)" class="sidebar-link">
                                                    <span class="icon-small"></span>
                                                    <span class="hide-menu">Level 2</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-item">
                                                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                                    <span class="icon-small"></span>
                                                    <span class="hide-menu">Level 2.1</span>
                                                </a>
                                                
                                                <ul aria-expanded="false" class="collapse three-level">
                                                    <li class="sidebar-item">
                                                        <a href="javascript:void(0)" class="sidebar-link">
                                                            <span class="icon-small"></span>
                                                            <span class="hide-menu">Level 3</span>
                                                        </a>
                                                    </li>
                                                    <li class="sidebar-item">
                                                        <a href="javascript:void(0)" class="sidebar-link">
                                                            <span class="icon-small"></span>
                                                            <span class="hide-menu">Level 3.1</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            
                            <!-- ---------------------------------- -->
                            <!-- More End -->
                            <!-- ---------------------------------- -->

                        </ul>
                    </nav>
                    <!-- Sidebar Item End -->
                    
                </div>
                <!-- ---------------------------------- -->
                <!-- End Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
            </div>
        </aside>
        <!--  Sidebar End -->

        <!-- Page Wrapper Start -->
        <div class="page-wrapper">

            <!--  Header Start -->
            <header class="topbar">

                <div class="with-vertical">
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav">
                            <!-- Start Hamburger Menu -->
                            <li class="nav-item nav-icon-hover-bg rounded-circle d-flex">
                                <a class="nav-link  sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                    <iconify-icon icon="solar:hamburger-menu-line-duotone" class="fs-6"></iconify-icon>
                                </a>
                            </li>
                            <!-- End Hamburger Menu -->
                            
                            <!-- Start Searching -->
                            <li class="nav-item d-none d-lg-flex nav-icon-hover-bg rounded-circle">
                                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#searchModal">
                                    <iconify-icon icon="solar:magnifer-linear" class="fs-6"></iconify-icon>
                                </a>
                            </li>
                            <!-- End Searching -->
                            
                            <!-- Start Menu topbar -->
                            <li class="nav-item d-none d-lg-flex">
                                <a class="nav-link" href="#">Menu Topbar</a>
                            </li>
                            <!-- End Menu topbar -->
                        </ul>
                        
                        <!-- Logo Start width <= 992px -->
                        <div class="d-block d-lg-none py-9 py-xl-0">
                            <h3 class="mb-0 ">
                                <iconify-icon icon="tdesign:system-code" class="align-middle"></iconify-icon> <span class="align-middle">APP</span>
                            </h3>
                        </div>
                        <!-- Logo End width <= 992px -->

                        <!-- Start Kebab menu width <= 992px -->
                        <a class="navbar-toggler p-0 border-0 nav-icon-hover-bg rounded-circle" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <iconify-icon icon="solar:menu-dots-bold-duotone" class="fs-6"></iconify-icon>
                        </a>
                        <!-- End Kebab Menu -->
                        
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">
                                <ul class="navbar-nav flex-row mx-auto ms-lg-auto align-items-center justify-content-center">

                                    <!-- Start Searching -->
                                    <li class="nav-item d-lg-none nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#searchModal">
                                            <iconify-icon icon="solar:magnifer-linear" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <!-- End Searching -->
                                    
                                    <!-- Start Theme mode -->
                                    <li class="nav-item">
                                        <a class="nav-link moon dark-layout nav-icon-hover-bg rounded-circle" href="javascript:void(0)">
                                            <iconify-icon icon="solar:moon-line-duotone" class="moon fs-6"></iconify-icon>
                                        </a>
                                        <a class="nav-link sun light-layout nav-icon-hover-bg rounded-circle" href="javascript:void(0)" style="display: none">
                                            <iconify-icon icon="solar:sun-2-line-duotone" class="sun fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <!-- End Theme mode -->
                                    
                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="javascript:void(0)" id="drop1" aria-expanded="false">
                                            <div class="d-flex align-items-center gap-2 lh-base">
                                                <img src="./assets/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="user-photo" />
                                                <iconify-icon icon="solar:alt-arrow-down-bold" class="fs-2"></iconify-icon>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu profile-dropdown dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                            <div class="position-relative px-4 pt-3 pb-2">
                                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom gap-6">
                                                    <img src="./assets/images/profile/user-1.jpg" class="rounded-circle" width="56" height="56" alt="user-photo" />
                                                    <div>
                                                        <h5 class="mb-0 fs-12">Abdurrahim <span class="text-success fs-11">Pro</span>
                                                        </h5>
                                                        <p class="mb-0 text-dark text-wrap text-break">abdurrahim22student@gmail.com</p>
                                                    </div>
                                                </div>
                                                <div class="message-body">
                                                    <a href="#" class="p-2 dropdown-item h6 rounded-1"> My Profile </a>
                                                    </a>
                                                    <a href="#" class="p-2 dropdown-item h6 rounded-1"> Account Settings </a>
                                                    <a href="#" class="p-2 dropdown-item h6 rounded-1"> Sign Out </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>

            </header>
            <!--  Header End -->

            <!-- Start Body Wrapper -->
            <div class="body-wrapper">
                <div class="container-fluid">

                    <!-- Start Breadcrumb -->
                    <div class="card card-body py-3">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="d-sm-flex align-items-center justify-space-between">
                                    <h4 class="mb-4 mb-sm-0 card-title">Data</h4>
                                    <nav aria-label="breadcrumb" class="ms-auto">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item d-flex align-items-center">
                                                <a class="text-muted text-decoration-none d-flex" href="./">
                                                    <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                                </a>
                                            </li>
                                            <!-- <iconify-icon icon="solar:alt-arrow-right-outline" class="mx-1 my-auto" width="20" height="20"></iconify-icon> -->
                                             <iconify-icon icon="ic:sharp-keyboard-arrow-right" class="mx-1" width="26" height="26"></iconify-icon>
                                            <li class="breadcrumb-item my-auto" aria-current="page">
                                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary"> Data </span>
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
                                <div class="col-md-4 col-xl-3">
                                    <form class="position-relative">
                                        <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Data..." />
                                        <!-- <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i> -->
                                        <iconify-icon icon="tabler:search" class="position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></iconify-icon>
                                    </form>
                                </div>
                                <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                                    <a href="javascript:void(0)" id="btn-add-data" class="btn btn-primary d-flex align-items-center">
                                        <!-- <i class="ti ti-users text-white me-1 fs-5"></i> Add Contact  -->
                                        <iconify-icon icon="tabler:users" class="text-white me-1 fs-5"></iconify-icon>Add Data
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Card Header -->
                        
                        <!-- Start Card body main content -->
                        <div class="card card-body">
                            <div class="table-responsive">
                                <table class="table search-table align-middle text-nowrap">
                                    <thead class="header-item">
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <!-- start row -->
                                        <tr class="search-items">
                                            <td>1</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/images/profile/user-10.jpg" alt="avatar" class="rounded-circle" width="35" />
                                                    <div class="ms-3">
                                                        <div class="user-meta-info">
                                                            <h6 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h6>
                                                            <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="usr-email-addr" data-email="adams@mail.com">adams@mail.com</span>
                                            </td>
                                            <td>
                                                <span class="usr-location" data-location="Boston, USA">Boston, USA</span>
                                            </td>
                                            <td>
                                                <span class="usr-ph-no" data-phone="+1 (070) 123-4567">+91 (070) 123-4567</span>
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="javascript:void(0)" class="text-primary edit">
                                                        <!-- <i class="ti ti-eye fs-5"></i> -->
                                                        <iconify-icon icon="tabler:edit" class="fs-5"></iconify-icon>
                                                    </a>
                                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                                                        <!-- <i class="ti ti-trash fs-5"></i> -->
                                                        <iconify-icon icon="tabler:trash" class="fs-5"></iconify-icon>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end row -->
                                        <!-- start row -->
                                        <tr class="search-items">
                                            <td>2</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/images/profile/user-2.jpg" alt="avatar" class="rounded-circle" width="35" />
                                                    <div class="ms-3">
                                                        <div class="user-meta-info">
                                                            <h6 class="user-name mb-0" data-name="Olivia Allen">Olivia Allen</h6>
                                                            <span class="user-work fs-3" data-occupation="Web Designer">Web Designer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="usr-email-addr" data-email="allen@mail.com">allen@mail.com</span>
                                            </td>
                                            <td>
                                                <span class="usr-location" data-location="Sydney, Australia">Sydney, Australia</span>
                                            </td>
                                            <td>
                                                <span class="usr-ph-no" data-phone="+91 (125) 450-1500">+91 (125) 450-1500</span>
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="javascript:void(0)" class="text-primary edit">
                                                        <iconify-icon icon="tabler:edit" class="fs-5"></iconify-icon>
                                                    </a>
                                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                                                        <iconify-icon icon="tabler:trash" class="fs-5"></iconify-icon>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end row -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- ENd Card body main content -->
                    </div>
                </div>
                
            </div>
            <!-- End Body Wrapper -->
            
        </div>
        <!-- Page Wrapper End -->
        
        <!--  Search Bar -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <input type="search" class="form-control" placeholder="Search here" id="search" />
                        <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                            <iconify-icon icon="tabler:x" class="fs-5 ms-3 align-middle"></iconify-icon>
                        </a>
                    </div>
                    <div class="modal-body message-body" data-simplebar="">
                        <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                        <ul class="list mb-0 py-2">
                            <li class="p-1 mb-1 bg-hover-light-black rounded px-2">
                                <a href="javascript:void(0)">
                                    <span class="text-dark fw-semibold d-block">Analytics</span>
                                    <span class="fs-2 d-block text-body-secondary">/dashboards/dashboard1</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black rounded px-2">
                                <a href="javascript:void(0)">
                                    <span class="text-dark fw-semibold d-block">eCommerce</span>
                                    <span class="fs-2 d-block text-body-secondary">/dashboards/dashboard2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Main Wrapper End -->
    
    <!-- iconify icons -->
    <script src="./assets/libs/iconify-icon/iconify-icon.min.js"></script>
    
    <script src="./assets/js/vendor.min.js"></script>
    <!-- Import Js Files -->
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="./assets/js/theme/app.init.js"></script>
    <script src="./assets/js/theme/theme.js"></script>
    <script src="./assets/js/theme/app.min.js"></script>
    <script src="./assets/js/theme/sidebarmenu-default.js"></script>
</body>
</html>