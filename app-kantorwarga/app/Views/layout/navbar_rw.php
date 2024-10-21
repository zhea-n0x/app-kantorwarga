<div id="wrapper">
    <div class="overlay"></div>
    <!-- mobile navbar -->
    <div class="mobile-navbar">
        <nav class="navbar navbar-dark navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom" style="height:75px; background-color: orangered;">
            <ul class="navbar-nav nav-justified w-100 justify-content-center">
                <li class="nav-item">
                    <a href="/dashboardrw/pengumuman" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-megaphone" viewBox="0 0 16 16">
                            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975l1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z" />
                        </svg>
                        <span class="small d-block">Pengumuman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboardrw" class="nav-link"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg><span class="small d-block">Home</span></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-journal-arrow-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 11a.5.5 0 0 0 .5-.5V6.707l1.146 1.147a.5.5 0 0 0 .708-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 6.707V10.5a.5.5 0 0 0 .5.5z" />
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                        </svg><span class="small d-block">Surat Masuk</span></a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
        <div class="simplebar-content" style="padding: 0px;">
            <a class="sidebar-brand" href="/">
                <span class="align-middle">LaporPak</span>
            </a>

            <ul class="navbar-nav align-self-stretch">

                <li class="sidebar-header">
                    Menu
                </li>
                <li class="">
                    <a class="nav-link text-left" role="button" aria-haspopup="true" aria-expanded="false" href="/dashboardrw" id="nav-item">
                        <i class="fas fa-columns"></i> Dashboard
                    </a>
                </li>
                <li class="">
                    <a class="nav-link text-left" role="button" aria-haspopup="true" aria-expanded="false" href="/dashboardrw/informasi_wilayah" id="nav-item">
                        <i class="fas fa-map"></i> Informasi Wilayah
                    </a>
                </li>

                <!-- sidebar header -->
                <li class="sidebar-header">
                    manajemen
                </li>
                <!-- end sidebar header -->

                <!--<li class="has-sub">
                    <a class="nav-link collapsed text-left" href="#keuangan" role="button" data-toggle="collapse" id="nav-item">
                        <i class="fas fa-tasks"></i> Manajemen Keuangan
                    </a>
                    <div class="collapse menu mega-dropdown" id="keuangan">
                        <div class="dropmenu" aria-labelledby="navbarDropdown">
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-lg-12 px-2">
                                        <div class="submenu-box">
                                            <ul class="list-unstyled m-0">
                                                <li><a href="#">Uang Kas</a></li>
                                                <li><a href="">Sumber Pemasukan</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="has-sub">
                    <a class="nav-link collapsed text-left" href="#admin" role="button" data-toggle="collapse" id="nav-item">
                        <i class="fas fa-pencil-alt"></i> Manajemen Administrasi
                    </a>
                    <div class="collapse menu mega-dropdown" id="admin">
                        <div class="dropmenu" aria-labelledby="navbarDropdown">
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-lg-12 px-2">
                                        <div class="submenu-box">
                                            <ul class="list-unstyled m-0">
                                                <li><a href="#">Surat Masuk & Surat Keluar</a></li>
                                                <li><a href="">Undangan & Pengumuman</a></li>
                                                <li><a href="">Kotak Saran</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="has-sub">
                    <a class="nav-link collapsed text-left" href="#fasilitas" role="button" data-toggle="collapse" id="nav-item">
                        <i class="fas fa-tools"></i> Manajemen Fasilitas
                    </a>
                    <div class="collapse menu mega-dropdown" id="fasilitas">
                        <div class="dropmenu" aria-labelledby="navbarDropdown">
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-lg-12 px-2">
                                        <div class="submenu-box">
                                            <ul class="list-unstyled m-0">
                                                <li><a href="#">Daftar Fasilitas</a></li>
                                                <li><a href="">Pengajuan Fasilitas</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>-->
                <li class="has-sub">
                    <a class="nav-link collapsed text-left" href="#admin" role="button" data-toggle="collapse" id="nav-item">
                        <i class="fas fa-pencil-alt"></i> Manajemen Administrasi
                    </a>
                    <div class="collapse menu mega-dropdown" id="admin">
                        <div class="dropmenu" aria-labelledby="navbarDropdown">
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-lg-12 px-2">
                                        <div class="submenu-box">
                                            <ul class="list-unstyled m-0">
                                                <li><a href="/dashboardrw/pengajuan_surat">Pengajuan Surat</a></li>
                                                <li><a href="/home/comingsoon">Undangan & Pengumuman</a></li>
                                                <li><a href="/home/comingsoon">Kotak Saran</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="has-sub">
                    <a class="nav-link collapsed text-left" href="#warga" role="button" data-toggle="collapse" id="nav-item">
                        <i class="fas fa-users"></i> Manajemen Kewargaan
                    </a>
                    <div class="collapse menu mega-dropdown" id="warga">
                        <div class="dropmenu" aria-labelledby="navbarDropdown">
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-lg-12 px-2">
                                        <div class="submenu-box">
                                            <ul class="list-unstyled m-0">
                                                <li><a href="/dashboardrw/data_warga">Data Warga</a></li>
                                                <li><a href="/dashboardrw/data_rt">Data RT</a></li>
                                                <li><a href="/home/comingsoon">Jadwal Ronda <small>Coming Soon</small></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- sidebar header -->
                <li class="sidebar-header">
                    pengaturan
                </li>
                <!-- end sidebar header -->

                <li class="">
                    <a class="nav-link text-left" role="button">
                        <i class="flaticon-bar-chart-1"></i> pengaturan akun
                    </a>
                </li>
                <li class="">
                    <a class="nav-link text-left" role="button">
                        <i class="flaticon-map"></i> back-up data
                    </a>
                </li>

            </ul>


        </div>


    </nav>
    <!-- /#sidebar-wrapper -->










    <!-- Page Content -->
    <div id="page-content-wrapper">


        <div id="content">

            <div class="container-fluid p-0 px-lg-0 px-md-0">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light my-navbar">

                    <!-- Sidebar Toggle (Topbar) -->
                    <div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>


                    <!-- Topbar Search
                    <form class="d-none d-sm-inline-block form-inline navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light " placeholder="ketikkan sesuatu..." aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown  d-sm-none">

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Notif -->
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown" href="#" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
                                <div class="position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell align-middle mt-1">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                    <span class="indicator">4</span>

                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    4 New Notifications
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                </svg>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the
                                                    update.</div>
                                                <div class="text-muted small mt-1">30m ago</div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li>

                        <!-- Nav Item - User Info -->
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown" href="#" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
                                <div class="position-relative">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $nama_lengkap; ?></span>
                                    <img class="img-profile rounded-circle" src="resources/images/logo/android-icon-36x36.png">

                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header ml-2 mt-2">
                                    Pengaturan Akun
                                </div>
                                <div class="list-group ml-3 mt-2">
                                    <a href=""><i class="fas fa-user"></i> &nbsp;Profil</a>
                                    <a href=""><i class="fas fa-key"></i> &nbsp;Ganti Password</a>
                                    <hr class="w-70">
                                    <a href="/logout" class="mb-2" style="margin-top: -3px;"><i class="fas fa-sign-out-alt"></i> &nbsp;Log-Out</a>
                                </div>
                            </div>
                        </li>



                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Connection Detect  -->

                <div class="connection-detect">
                    <div class="toast">
                        <div class="content">
                            <div class="icon"><i class="fas fa-wifi"></i></div>
                            <div class="details">
                                <span>Kamu Online !</span>
                                <p>Kamu berhasil terkoneksi.</p>
                            </div>
                            <div class="close-icon"><i class="fas fa-times"></i></div>
                        </div>
                    </div>
                </div>

                <!-- End Connection Detect -->