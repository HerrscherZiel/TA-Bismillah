@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">


        <!-- Pending Requests Card Example -->
        <div class="col-xl-12 col-md-12 mb-4 mx-auto">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h3 text-center font-weight-bold text-uppercase text-gray-800">Selamat datang, {{Auth::guard('mahasiswa')->user()->namaMahasiswa}} </div>
                            <div class="h6 mb-0 text-center font-weight-bold text-gray-800">Seluruh aktifitas kelas proyek prodi Rekayasa Perangkat Lunak dilakukan pada sistem ini</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div>

{{--        @if--}}
{{--        @endif--}}

        <div class="row list">

            <div class="col-md-6">

                <div class="card shadow mb-4">


                    <div class="card-header py-3">

                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Sistem Informasi Kelas Proyek</h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <a href="/detailProject" class="btn btn-primary">Detail</a>
                            </div>
                            <!--                      </div>-->

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a>Kelas Proyek: SIM<b class="status">
                                    </b>
                                </a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Periode: 17-09-2019<b class="status">
                                    </b>
                                </a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Judul: Sistem Informasi Kelas Proyek</a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Pembimbing: Irkham Huda</a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Project Manager: Elang Bayu Aji Hartanto</a><br><br>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card shadow mb-4">


                    <div class="card-header py-3">

                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Sistem Informasi Kelas Proyek</h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <a href="/detailProject" class="btn btn-primary">Detail</a>
                            </div>
                            <!--                      </div>-->

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a>Kelas Proyek: SIM<b class="status">
                                    </b>
                                </a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Periode: 17-09-2019<b class="status">
                                    </b>
                                </a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Judul: Sistem Informasi Kelas Proyek</a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Pembimbing: Irkham Huda</a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Project Manager: Elang Bayu Aji Hartanto</a><br><br>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card shadow mb-4">


                    <div class="card-header py-3">

                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Sistem Informasi Kelas Proyek</h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <a class="btn btn-primary" href="index2.html">
                                    Detail
                                </a>
                            </div>
                            <!--                      </div>-->

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a>Kelas Proyek: SIM<b class="status">
                                    </b>
                                </a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Periode: 17-09-2019<b class="status">
                                    </b>
                                </a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Judul: Sistem Informasi Kelas Proyek</a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Pembimbing: Irkham Huda</a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Project Manager: Elang Bayu Aji Hartanto</a><br><br>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card shadow mb-4">


                    <div class="card-header py-3">

                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Sistem Informasi Kelas Proyek</h6>
                            </div>

                            <div class="col-md-4 text-right">
                                    <a href="/detailProject" class="btn btn-primary">Detail</a>
                            </div>
                            <!--                      </div>-->

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a>Kelas Proyek: SIM<b class="status">
                                    </b>
                                </a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Periode: 17-09-2019<b class="status">
                                    </b>
                                </a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Judul: Sistem Informasi Kelas Proyek</a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Pembimbing: Irkham Huda</a><br>
                            </div>
                            <div class="col-md-6">
                                <a>Project Manager: Elang Bayu Aji Hartanto</a><br><br>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>




    </div>



    {{--            <!--          {{ $proyek->links() }}-->--}}

    <!-- End of Page Wrapper -->

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

@endsection
