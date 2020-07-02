@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">DASHBOARD</h1>
    </div>

    <div class="row">
        <div class="col-10 offset-1 mb-4 mx-auto">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h3 text-center font-weight-bold text-uppercase text-gray-800">Selamat datang {{Auth::guard('dosen')->user()->namaDosen}} di</div>
                            <div class="h3 text-center font-weight-bold text-uppercase text-gray-800">Sistem Informasi Manajamen Kelas Proyek</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-10 offset-1">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl-left font-weight-bold text-primary text-uppercase mb-1">Proyek</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Dummy</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl-left font-weight-bold text-success text-uppercase mb-1">Kelompok Bimbingan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Dummy</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    {{--            <!-- Earnings (Monthly) Card Example -->--}}
    {{--            <div class="col-xl-3 col-md-6 mb-4">--}}
    {{--                <div class="card border-left-info shadow h-100 py-2">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <div class="row no-gutters align-items-center">--}}
    {{--                            <div class="col mr-2">--}}
    {{--                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>--}}
    {{--                                <div class="row no-gutters align-items-center">--}}
    {{--                                    <div class="col-auto">--}}
    {{--                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="col">--}}
    {{--                                        <div class="progress progress-sm mr-2">--}}
    {{--                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-auto">--}}
    {{--                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

                <!-- Pending Requests Card Example -->
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl-left font-weight-bold text-warning text-uppercase mb-1">Laporan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Dummy</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-10 offset-1 mb-4">

            <div class="col-md-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Laporan</h6>
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDosen">Lebih Banyak</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="table-test" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Judul Proyek</th>
                                    <th>Kelas Proyek</th>
                                    <th>Periode</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
{{--                                @foreach($dosen as $dos)--}}
                                    <tr>
                                        <td>{{--{{$dos->nip}}--}}a</td>
                                        <td>{{--{{$dos->namaDosen}}--}}b</td>
                                        <td>{{--{{$dos->email}}--}}c</td>
                                        <td>{{--{{$dos->statusUser}}--}}d</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-info"
{{--                                                            data-id="{{$dos->id_dosen}}"--}}
{{--                                                            data-nip="{{$dos->nip}}"--}}
{{--                                                            data-email="{{$dos->email}}"--}}
{{--                                                            data-nama="{{$dos->namaDosen}}"--}}
                                                            data-toggle="modal" data-target="#updateDosen">
                                                        <i class="fa fa-lg fa-edit"></i>
                                                    </button>
{{--                                                    <form class="delete" action="{{ route('dosen.destroy', $dos->id_dosen)}}" method="post">--}}
{{--                                                        <input type="hidden" name="_method" value="DELETE">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('DELETE')--}}
{{--                                                        <button type="submit" class="btn btn-danger delete-btn" style="margin-left: -2px">--}}
{{--                                                            <i class="fa fa-lg fa-trash">--}}
{{--                                                            </i>--}}
{{--                                                        </button>--}}
{{--                                                    </form>--}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-1"></div>




    </div>



    <!-- Content Row -->


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
