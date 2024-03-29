<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Kelas Proyek</title>

    <!-- Custom fonts for this template-->
     <link href="{{url('/')}}/asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
    <link href="{{url('/')}}/asset/css/select2.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
     <link href="{{url('/')}}/asset/css/sb-admin-2.min.css" rel="stylesheet">
     <link href="{{url('/')}}/asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center"
         href="
            @if(Auth::guard('mahasiswa')->check())
                /mahasiswa/dashboard
            @elseif(Auth::guard('dosen')->check())
                /dosen/dashboard
            @elseif(Auth::guard('admin')->check())
                /admin/dashboard
            @endif">
            <div class="sidebar-brand-icon">
                <i class="fas fa-sitemap"></i>
            </div>
            <div class="sidebar-brand-text mx-4"><h4>KELAS PROYEK</h4>
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider mb-2">

        <div class="sidebar-heading mx-auto text-center">
            @if(Auth::guard('mahasiswa')->check())
            {{Auth::guard('mahasiswa')->user()->statusUser}}
            <br>
            @elseif(Auth::guard('dosen')->check())
            {{Auth::guard('dosen')->user()->statusUser}}
            <br>
            @elseif(Auth::guard('admin')->check())
            {{Auth::guard('admin')->user()->statusUser}}
            <br>
            @endif
        </div>

        <hr class="sidebar-divider mt-2 mb-2">


        <!-- Nav Item - Dashboard -->

        @if(Auth::guard('admin')->check())
        <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item {{ (request()->is('admin/admin')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/admin">
                <i class="fas fa-fw fa-user"></i>
                <span>Admin</span></a>
        </li>

        <li class="nav-item {{ (request()->is('admin/dosen')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/dosen">
                <i class="fas fa-fw fa-user"></i>
                <span>Dosen</span></a>
        </li>

        <li class="nav-item {{ (request()->is('admin/mahasiswa')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/mahasiswa">
                <i class="fas fa-fw fa-user"></i>
                <span>Mahasiswa</span></a>
        </li>

        <li class="nav-item {{ (request()->is('admin/periode')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/periode">
                <i class="fas fa-fw fa-clock"></i>
                <span>Periode</span></a>
        </li>

        <li class="nav-item {{ (request()->is('admin/kelasproyek', 'admin/kelasproyek*')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/kelasproyek">
                <i class="fas fa-fw fa-chalkboard-teacher"></i>
                <span>Kelas Proyek</span></a>
        </li>

        <li class="nav-item {{ (request()->is('admin/mahasiswaproyek')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/mahasiswaproyek">
                <i class="fas fa-fw fa-book-reader"></i>
                <span>Mahasiswa Proyek</span></a>
        </li>

        <li class="nav-item {{ (request()->is('admin/proyek', 'admin/proyek/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/proyek">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Proyek</span></a>
        </li>

        <li class="nav-item {{ (request()->is('admin/usulmahasiswa', 'admin/usul/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/usulmahasiswa">
                <i class="fas fa-fw fa-sticky-note"></i>
                <span>Usul Proyek</span></a>
        </li>

        <li class="nav-item {{ (request()->is('admin/kelompokproyek', 'admin/kelompok/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/kelompokproyek">
                <i class="fas fa-fw fa-users"></i>
                <span>Kelompok Proyek</span></a>
        </li>
        @endif


        <!-- Divider -->

    @if(Auth::guard('dosen')->check())
        <div class="sidebar-heading mx-auto text-center">
            Data Dosen
        </div>

        <li class="nav-item {{ (request()->is('dosen/dashboard')) ? 'active' : '' }}">
            <a class="nav-link" href="/dosen/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item {{ (request()->is('dosen/profil')) ? 'active' : '' }}">
            <a class="nav-link" href="/dosen/profil">
                <i class="fas fa-fw fa-user"></i>
                <span>Profil</span>
            </a>
        </li>

        <li class="nav-item {{ (request()->is('dosen/proyek', 'dosen/proyek-aktif', 'dosen/proyek-selesai')) ? 'active' : '' }}">
            <a class="nav-link" href="/dosen/proyek">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Proyek</span>
            </a>
        </li>

        <li class="nav-item {{ (request()->is('dosen/kelompok-bimbingan', 'dosen/kelompok-bimbingan/*/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/dosen/kelompok-bimbingan">
                <i class="fas fa-fw fa-users"></i>
                <span>Kelompok Bimbingan</span>
            </a>
        </li>

        <li class="nav-item {{ (request()->is('dosen/laporan', 'dosen/laporan/*/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/dosen/laporan">
                <i class="fas fa-fw fa-copy"></i>
                <span>Laporan</span>
            </a>
        </li>

        <hr>
        <div class="sidebar-heading mx-auto text-center">
            Data Sistem
        </div>

        <li class="nav-item {{ (request()->is('admin/usulmahasiswa', 'admin/usul/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/usulmahasiswa">
                <i class="fas fa-fw fa-sticky-note"></i>
                <span>Usul Proyek</span></a>
        </li>

        <li class="nav-item {{ (request()->is('admin/kelompokproyek', 'admin/kelompok/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/admin/kelompokproyek">
                <i class="fas fa-fw fa-users"></i>
                <span>Kelompok Proyek</span></a>
        </li>
    @endif


    @if(Auth::guard('mahasiswa')->check())
        <li class="nav-item {{ (request()->is('mahasiswa/dashboard')) ? 'active' : '' }}">
            <a class="nav-link " href="/mahasiswa/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item {{ (request()->is('mahasiswa/profileMahasiswa')) ? 'active' : '' }}">
            <a class="nav-link" href="/mahasiswa/profileMahasiswa">
                <i class="fas fa-fw fa-user"></i>
                <span>Profil</span>
            </a>
        </li>

        <li class="nav-item {{ (request()->is('mahasiswa/proyek/kelompok', 'mahasiswa/proyek/kelompok/show/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/mahasiswa/proyek/kelompok">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Kelompok Proyek</span>
            </a>
        </li>

        <li class="nav-item {{ (request()->is('mahasiswa/undangan', 'mahasiswa/undangan/detail/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/mahasiswa/undangan">
                <i class="fas fa-fw fa-inbox"></i>
                <span>Undangan</span>
            </a>
        </li>

        <li class="nav-item {{ (request()->is('mahasiswa/laporan', 'mahasiswa/laporan/index/*', 'mahasiswa/laporan/detail/*')) ? 'active' : '' }}">
            <a class="nav-link" href="/mahasiswa/laporan">
                <i class="fas fa-fw fa-copy"></i>
                <span>Laporan</span>
            </a>
        </li>
    @endif

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

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
{{--                    <li class="nav-item dropdown no-arrow d-sm-none">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Messages -->--}}
{{--                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">--}}
{{--                            <form class="form-inline mr-auto w-100 navbar-search">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <button class="btn btn-primary" type="button">--}}
{{--                                            <i class="fas fa-search fa-sm"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}




                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            
                                @if(Auth::guard('mahasiswa')->check())
                                    @php
                                        $id = Auth::guard('mahasiswa')->user()->id_mahasiswa;
                                        $users = DB::table('profilmahasiswa')->where('mahasiswa_id', $id)->first()->fileFoto;
                                    @endphp

                                        {{Auth::guard('mahasiswa')->user()->namaMahasiswa}}

                                    @if($users != NULL)
                                    <img class="img-profile rounded-circle" src="{{asset('data_profilmhs/'.$users)}}">
                                    @else
                                    <img class="img-profile rounded-circle" src="{{url('/')}}/asset/img/user.svg">
                                    @endif

                                @elseif(Auth::guard('dosen')->check())
                                    @php
                                        $fo = Auth::guard('dosen')->user()->fileFoto;
                                    @endphp

                                    {{Auth::guard('dosen')->user()->namaDosen}}

                                    @if($fo != NULL)
                                    <img class="img-profile rounded-circle" src="{{asset('data_profildos/'.$fo)}}">
                                    @else
                                    <img class="img-profile rounded-circle" src="{{url('/')}}/asset/img/user.svg">
                                    @endif

                                @elseif(Auth::guard('admin')->check())
                                    {{Auth::guard('admin')->user()->namaAdmin}}
                                    <img class="img-profile rounded-circle" src="{{url('/')}}/asset/img/user.svg">
                                @endif</span>


                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="/ganti-password">
                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ganti Password
                            </a>
                            <div class="dropdown-divider"></div>
                            @if(Auth::guard('mahasiswa')->check())
                                <a class="dropdown-item" href="{{route('mahasiswa.logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{route('mahasiswa.logout')}}" method="post" style="display: none">
                                    @csrf
                                </form>

                            @elseif(Auth::guard('dosen')->check())
                                <a class="dropdown-item" href="{{route('dosen.logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{route('dosen.logout')}}" method="post" style="display: none">
                                    @csrf
                                </form>

                            @elseif(Auth::guard('admin')->check())
                                <a class="dropdown-item" href="{{route('admin.logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{route('admin.logout')}}" method="post" style="display: none">
                                    @csrf
                                </form>
                            @endif
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @include('flash-message')


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
                <script src="{{url('/')}}/asset/js/select2.min.js"></script>
                <script src="{{url('/')}}/asset/js/sweetalert.min.js"></script>



                <!-- Page level plugins -->
                <script src="{{url('/')}}/asset/vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="{{url('/')}}/asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#example').dataTable( {
                            "language": {
                                "url": "dataTables.indonesian.lang"
                            }
                        } );
                    } );
                </script>

                <!-- Page level custom scripts -->
{{--                <script src="{{url('/')}}/asset/js/demo/datatables-demo.js"></script>--}}

            <script>

                $(document).ready(function() {
                    $('.selectbox').select2();
                });

                $('#table-test').DataTable();

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

                
            </script>
            @stack('scripts')
</body>


</html>
