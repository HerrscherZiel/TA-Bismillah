<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
     <link href="{{url('/')}}/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
     <link href="{{url('/')}}/asset/css/sb-admin-2.min.css" rel="stylesheet">
     <link href="{{url('/')}}/asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <!--      <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2" href="index2.html">-->

        <!--      </a>-->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index2.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-4"><h4>PROYEK</h4><!--<sup>2</sup>--></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider mb-2">

        <!--      <div class="sidebar-heading mx-auto">-->
        <!--        <h5>Elang</h5>-->
        <!--      </div>-->

        <div class="sidebar-heading mx-auto">
            @if(Auth::guard('mahasiswa')->check())
            {{Auth::guard('mahasiswa')->user()->statusUser}}
            @endif
        </div>

        <hr class="sidebar-divider mt-2 mb-2">


        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Admin</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/dosen">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dosen</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/mahasiswa">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Mahasiswa</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/periode">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Periode</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/kelasproyek">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Kelas Proyek</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/mahasiswaproyek">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Mahasiswa Proyek</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/proyek">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Proyek</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/usulmahasiswa">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Usul Proyek</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/kelompokproyek">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Kelompok Proyek</span></a>
        </li>

        <hr>

        <!-- Divider -->

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/profileDosen">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Profile</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/proyekDosen">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Proyek</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/kelompokbimbingan">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Kelompok Bimbingan</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/laporanDosen">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Laporan</span>--}}
{{--            </a>--}}
{{--        </li>--}}



        <hr>

{{--        <!-- Nav Item - Pages Collapse Menu -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/profileMahasiswa">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Profile</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/proyekmahasiswa">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Proyek</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <!-- Nav Item - Utilities Collapse Menu -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--                <i class="fas fa-fw fa-wrench"></i>--}}
{{--                <span>Proyek</span>--}}
{{--            </a>--}}
{{--            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Daftar Proyek:</h6>--}}
{{--                    <a class="collapse-item" href="/proyek/judul">Judul</a>--}}
{{--                    <a class="collapse-item" href="/proyek/kelompok">Kelompok</a>--}}
{{--                    <a class="collapse-item" href="/proyek/undangan">Undangan</a>--}}
{{--                    <a class="collapse-item" href="/proyek/informasi">Informasi</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/undangan">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Undangan</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/laporan">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Laporan</span>--}}
{{--            </a>--}}
{{--        </li>--}}


{{--        <!-- Sidebar Toggler (Sidebar) -->--}}
{{--        <div class="text-center d-none d-md-inline">--}}
{{--            <button class="rounded-circle border-0" id="sidebarToggle"></button>--}}
{{--        </div>--}}

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

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>




                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                @if(Auth::guard('mahasiswa')->check())
                                    {{Auth::guard('mahasiswa')->user()->namaMahasiswa}}
                                @endif</span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('mahasiswa.logout')}}" onclick="event.preventDefault();
                                                                                            document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{route('mahasiswa.logout')}}" method="post" style="display: none">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                @yield('content')
            <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="{{url('/')}}/asset/vendor/jquery/jquery.min.js"></script>
                <script src="{{url('/')}}/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="{{url('/')}}/asset/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="{{url('/')}}/asset/js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="{{url('/')}}/asset/vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="{{url('/')}}/asset/js/demo/chart-area-demo.js"></script>
                <script src="{{url('/')}}/asset/js/demo/chart-pie-demo.js"></script>

                <!-- Page level plugins -->
                <script src="{{url('/')}}/asset/vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="{{url('/')}}/asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
{{--                <script src="{{url('/')}}/asset/js/demo/datatables-demo.js"></script>--}}

            <script>
                $('#table-test').DataTable();
                $('#updateDosen').on('show.bs.modal', function (event) {

                    // console.log('modal opened');
                    var button = $(event.relatedTarget)

                    var id = button.data('id')
                    var nip = button.data('nip')
                    var username = button.data('username')
                    var namaDosen = button.data('nama')

                    var modal = $(this)
                    modal.find('.modal-body #id').val(id)
                    modal.find('.modal-body #nip').val(nip)
                    modal.find('.modal-body #username').val(username)
                    modal.find('.modal-body #namaDosen').val(namaDosen)
                });

                $('#updateMahasiswa').on('show.bs.modal', function (event) {

                    // console.log('modal opened');
                    var button = $(event.relatedTarget)

                    var id = button.data('id')
                    var nim = button.data('nim')
                    var username = button.data('username')
                    var namaMahasiswa = button.data('nama')

                    var modal = $(this)
                    modal.find('.modal-body #id').val(id)
                    modal.find('.modal-body #nim').val(nim)
                    modal.find('.modal-body #username').val(username)
                    modal.find('.modal-body #namaMahasiswa').val(namaMahasiswa)
                });

                $('#updateMahasiswaProyek').on('show.bs.modal', function (event) {

                    // console.log('modal opened');
                    var button = $(event.relatedTarget)

                    var id = button.data('id')
                    var idmas = button.data('idmas')
                    var nama = button.data('nama')
                    var kelasproyek = button.data('kelasproyek')
                    var periode = button.data('periode')

                    var modal = $(this)
                    modal.find('.modal-body #id').val(id)
                    modal.find('.modal-body #idmas').val(idmas)
                    modal.find('.modal-body #nama').val(nama)
                    // $('.namas').data('nama');
                    modal.find('.modal-body #kelasproyek').val(kelasproyek)
                    modal.find('.modal-body #periode').val(periode)
                })

                $('#updateKelasProyek').on('show.bs.modal', function (event) {

                    // console.log('modal opened');
                    var button = $(event.relatedTarget)

                    var id = button.data('id')
                    var nama = button.data('nama')
                    var deskripsi = button.data('deskripsi')
                    var anggota = button.data('anggota')

                    var modal = $(this)
                    modal.find('.modal-body #id').val(id)
                    modal.find('.modal-body #nama').val(nama)
                    modal.find('.modal-body #deskripsi').val(deskripsi)
                    modal.find('.modal-body #maksAnggota').val(anggota)
                })

                $('#updatePeriode').on('show.bs.modal', function (event) {

                    // console.log('modal opened');
                    var button = $(event.relatedTarget)

                    var id = button.data('id')
                    var tahun = button.data('tahun')
                    var sem = button.data('sem')

                    var modal = $(this)
                    modal.find('.modal-body #id').val(id)
                    modal.find('.modal-body #tahun').val(tahun)
                    modal.find('.modal-body #sem').val(sem)
                })

                $('#updateProyekAdmin').on('show.bs.modal', function (event) {

                    // console.log('modal opened');
                    var button = $(event.relatedTarget)

                    var id = button.data('id')
                    var kelas = button.data('kelas')
                    var periode = button.data('periode')
                    var judul = button.data('judul')
                    var deskripsi = button.data('deskripsi')
                    var status = button.data('status')

                    var modal = $(this)
                    modal.find('.modal-body #id').val(id)
                    modal.find('.modal-body #kelas').val(kelas)
                    modal.find('.modal-body #periode').val(periode)
                    modal.find('.modal-body #judul').val(judul)
                    modal.find('.modal-body #deskripsi').val(deskripsi)
                    modal.find('.modal-body #status').val(status)
                })


            </script>
            @stack('scripts')

</body>

</html>
