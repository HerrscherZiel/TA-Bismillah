@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Laporan</h1>
        <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->

    <!-- Content Row -->
    <div class="row">

        <div class="col-2"></div>

        <div class="col-lg-8 mb-4">

            <!-- Approach -->

            <div class="col-md-12">

                <div class="card shadow mb-4">


                    <div class="card-header py-3">

                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Laporan Proyek</h6>
                            </div>
                             <div class="col-md-4 text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahLaporan">Tambah</button>
                            </div>
{{--                                <a href="/detailProject" class="btn btn-primary">Detail</a>--}}
                            <!--                      </div>-->

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Proyek</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Sistem Informasi Kelas Proyek</td>
                                    <td>07-09-2019</td>
                                    <td>14-09-2019</td>
                                    <td>14-09-2019</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="laporan/detail">
                                                    <i class="fa fa-lg fa-eye">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                <button class="btn btn-info" data-toggle="modal" data-target="#editLaporan">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="#">
                                                    <i class="fa fa-lg fa-trash">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sistem Informasi Kelas Proyek</td>
                                    <td>14-09-2019</td>
                                    <td>21-09-2019</td>
                                    <td>21-09-2019</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="laporan/detail">
                                                    <i class="fa fa-lg fa-eye">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                <button class="btn btn-info" data-toggle="modal" data-target="#editLaporan">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="#">
                                                    <i class="fa fa-lg fa-trash">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sistem Informasi Kelas Proyek</td>
                                    <td>21-09-2019</td>
                                    <td>28-09-2019</td>
                                    <td>28-09-2019</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="laporan/detail">
                                                    <i class="fa fa-lg fa-eye">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                <button class="btn btn-info" data-toggle="modal" data-target="#editLaporan">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="#">
                                                    <i class="fa fa-lg fa-trash">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sistem Informasi Apotek</td>
                                    <td>28-09-2019</td>
                                    <td>05-10-2019</td>
                                    <td>05-10-2019</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="laporan/detail">
                                                    <i class="fa fa-lg fa-eye">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                <button class="btn btn-info" data-toggle="modal" data-target="#editLaporan">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="#">
                                                    <i class="fa fa-lg fa-trash">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sistem Informasi Apotek</td>
                                    <td>05-10-2019</td>
                                    <td>12-10-2019</td>
                                    <td>12-10-2019</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="laporan/detail">
                                                    <i class="fa fa-lg fa-eye">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                <button class="btn btn-info" data-toggle="modal" data-target="#editLaporan">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="#">
                                                    <i class="fa fa-lg fa-trash">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sistem Informasi Apotek </td>
                                    <td>12-10-2019</td>
                                    <td>19-10-2019</td>
                                    <td>19-10-2019</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="laporan/detail">
                                                    <i class="fa fa-lg fa-eye">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="btn-group">
                                                <button class="btn btn-info" data-toggle="modal" data-target="#editLaporan">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                            </div>
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="#">
                                                    <i class="fa fa-lg fa-trash">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="modal fade bd-modal-lg" id="tambahLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Laporan Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Tanggal Mulai :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tanggalMulai" placeholder="Tanggal Mulai Laporan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Tanggal Selesai :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tanggalSelesai" placeholder="Tanggal Selesai Laporan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Tanggal Kirim :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tanggalKirim" placeholder="Tanggal Kirim Laporan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-modal-lg" id="editLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Tanggal Mulai :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tanggalMulai" placeholder="Tanggal Mulai Laporan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Tanggal Selesai :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tanggalSelesai" placeholder="Tanggal Selesai Laporan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Tanggal Kirim :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tanggalKirim" placeholder="Tanggal Kirim Laporan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
