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
                                                        <h5 class="mb-0 fs-12">
                                                            Abdurrahim
                                                        </h5>
                                                        <p class="mb-0 text-dark text-wrap text-break">
                                                            abdurrahim22student@gmail.com
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="message-body">
                                                    <a href="#" class="p-2 dropdown-item h6 rounded-1"> My Profile </a>
                                                    </a>
                                                    <a href="#" class="p-2 dropdown-item h6 rounded-1"> Account Settings </a>
                                                    <a href="./pages/auth/logout.php" class="p-2 dropdown-item h6 rounded-1"> Logout </a>
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