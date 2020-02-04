@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Proyek Mahasiswa</h1>
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
                                <h6 class="font-weight-bold text-primary m-0">Proyek</h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Tambah</button>
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
                                    <th>Proyek</th>
                                    <th>Dosen Pembimbing</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>SIM</td>
                                    <td>2019</td>
                                    <td>Elang Bayu Aji Hartanto</td>
                                    <td>Sistem Informasi Kelas Proyek</td>
                                    <td>Irkham Huda</td>
                                    <td>Aktif</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="proyekmahasiswa/lihat">
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
                                    <td>Jaffar Jatmiko Jati</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>Menunggu Persetujuan</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="proyekmahasiswa/lihat">
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
                                    <div class="col-md-12"><b>Project Manager :</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="projectmanager" value="Elang Bayu Aji Hartanto" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Status :</b>
                                        <div class="form-group">
                                            <input class="form-control"  type="text" name="status" value="Menunggu Persetujuan" readonly>
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
