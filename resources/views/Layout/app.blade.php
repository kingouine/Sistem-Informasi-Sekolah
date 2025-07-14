<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CERDASKEUN| {{ $title }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CERDASKEUN </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $menuDashboard  ?? '' }}">
                <a class="nav-link" href="{{ route ('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            @if(Auth::user()->role == 'TataUsaha')
            <!-- Heading -->
            <div class="sidebar-heading">
                MENU TATA USAHA
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ $menuTataUsahaUser ?? '' }}">
                <a class="nav-link" href="{{ route ('user') }}">
                    <i class="fas fa-address-card"></i>
                    <span>User</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item {{ $menuTataUsahaJurusan ?? '' }}" >
                <a class="nav-link" href="{{ route ('jurusan') }}">
                    <i class="fas fa-book"></i>
                    <span>Jurusan</span></a>
            </li>

            <li class="nav-item {{ $menuTataUsahaMapel ?? '' }}" >
                <a class="nav-link" href="{{ route ('mapel') }}">
                    <i class="fas fa-book"></i>
                    <span>Mata pelajaran</span></a>
            </li>

            <li class="nav-item {{ $menuGuru ?? '' }}" >
                <a class="nav-link" href="{{ route ('guru') }}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Guru</span></a>
            </li>

            <li class="nav-item {{ $menuKelas ?? '' }}" >
                <a class="nav-link" href="{{ route ('kelas') }}">
                    <i class="fas fa-door-closed"></i>
                    <span>Kelas</span></a>
            </li>

            <li class="nav-item {{ $menuSiswa ?? '' }}" >
                <a class="nav-link" href="{{ route ('siswa') }}">
                    <i class="fas fa-users"></i>
                    <span>Siswa</span></a>
            </li>
            @endif
            
            @if(Auth::user()->role == 'Siswa')

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU SISWA
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ $menuNilaiSiswa ?? '' }}">
                <a class="nav-link" href="{{ route('nilaiSiswa') }}">
                    <i class="fas fa-tasks"></i>
                    <span>Nilai Siswa</span></a>
            </li>
            @endif

            <!-- Heading -->
            @if(Auth::user()->role == 'Guru')
            <div class="sidebar-heading">
                MENU GURU
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item {{ $menuNilai ?? '' }}">
                <a class="nav-link" href="{{ route('nilai') }}">
                    <i class="fas fa-tasks"></i>
                    <span>Input Nilai</span></a>
            </li>
            @endif
 
            <!-- Heading -->
            @if(Auth::user()->role == 'KepalaSekolah')
            <div class="sidebar-heading">
                MENU KEPALA SEKOLAH
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item {{ $menuNilaiKepsek ?? '' }}">
                <a class="nav-link" href="{{ route('nilaiSemua') }}">
                    <i class="fas fa-chart-bar"></i>
                    <span>Nilai Siswa</span></a>
            </li>

            <li class="nav-item {{ $menuSiswaKepsek ?? '' }}">
                <a class="nav-link" href="{{ route('kepsekSiswa') }}">
                    <i class="fas fa-users"></i>
                    <span>Siswa</span></a>
            </li>

            <li class="nav-item {{ $menuGuruKepala ?? '' }} ">
                <a class="nav-link" href="{{ route('kepalaGuru') }}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Guru</span></a>
            </li>

            <li class="nav-item {{ $menuMapelKepala ?? '' }}">
                <a class="nav-link" href="{{ route('kepalaMapel') }}">
                    <i class="fas fa-book"></i>
                    <span>Mata Pelajaran</span></a>
            </li>

            <li class="nav-item {{ $menuKelasKepala ?? '' }}">
                <a class="nav-link" href="{{ route ('kepalaKelas') }}">
                    <i class="fas fa-door-closed"></i>
                    <span>Kelas</span></a>
            </li>
            @endif
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ auth()->user()->nama }}
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset ('sbadmin2/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <div class="badge badge-success justify-content-center d-flex">
                                        {{ auth()->user()->role }}
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>
    
    <!-- Page level plugins -->
    <script src="{{ asset('sbadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sbadmin2/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    @session('success')
    <script>
        Swal.fire({
  title: "Sukses!",
  text: "{{ session('success') }}",
  icon: "success"
});
    </script>
    @endsession

    @session('error')
    <script>
        Swal.fire({
  title: "Gagal!",
  text: "{{ session('error') }}",
  icon: "error"
});
    </script>
    @endsession
    
    @stack('scripts')

</body>

</html>