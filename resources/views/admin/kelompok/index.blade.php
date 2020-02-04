@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Kelompok Proyek</h1>
        <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->

    <!-- Content Row -->
    <div class="row">

        <div class="col-1"></div>

        <div class="col-lg-10 mb-4">

            <!-- Approach -->

            <div class="col-md-12">

                <div class="card shadow mb-4">


                    <div class="card-header py-3">

                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Kelompok</h6>
                            </div>

                            <div class="col-md-4 text-right">
{{--                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Tambah</button>--}}

                                {{--                                <a class="btn btn-primary" href="/proyek/tambah">--}}
                                {{--                                    Tambah--}}
                                {{--                                </a>--}}
                                {{--                                <a href="/detailProject" class="btn btn-primary">Detail</a>--}}
                            </div>
                            <!--                      </div>-->

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Kelas Proyek</th>
                                    <th>Periode</th>
                                    <th>Project Manager</th>
                                    <th>Judul Proyek</th>
                                    <th>Dosen pembimbing</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>SIM</td>
                                        <td>2019</td>
                                        <td>Elang Bayu Aji Hartanto</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Aktif</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="kelompokproyek/show">
                                                        <i class="fa fa-lg fa-eye">
                                                        </i>
                                                    </a>
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
                                        <td>SIM</td>
                                        <td>2019</td>
                                        <td>Rosyidin Priyono</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Menunggu Persetujuan</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="kelompokproyek/show">
                                                        <i class="fa fa-lg fa-eye">
                                                        </i>
                                                    </a>
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

            <!-- Modal Insert -->
            <div class="modal fade bd-modal-lg insert" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="tile-body">
                                <div class="row">
                                    <div class="col-md-12"><b>Pilih Kelas Proyek</b>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>SIM</option>
                                                <option>Proyek Aplikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Nama Proyek :</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="kelasProyek" placeholder="Nama Kelas Proyek">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Deskripsi Proyek :</b>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Kelas Proyek"></textarea>
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

            <!-- Modal Update -->
            <div class="modal fade bd-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="tile-body">
                                <div class="row">
                                    <div class="col-md-12"><b>Pilih Kelas Proyek</b>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>SIM</option>
                                                <option>Proyek Aplikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Nama Proyek :</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="kelasProyek" placeholder="Nama Kelas Proyek">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Deskripsi Proyek :</b>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Kelas Proyek"></textarea>
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
