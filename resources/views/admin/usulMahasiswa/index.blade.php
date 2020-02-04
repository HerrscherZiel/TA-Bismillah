@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Usul Proyek</h1>
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
                                <h6 class="font-weight-bold text-primary m-0">Usul Proyek</h6>
                            </div>
                        </div>

                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Kelas Proyek</th>
                                    <th>Periode</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Pengusul</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>SIM</td>
                                        <td>2019</td>
                                        <td>Sistem Informasi Kelas Proyek</td>
                                        <td>Sistem Informasi Semester 5</td>
                                        <td>Elang Bayu Aji Hartanto</td>
                                        <td>Menunggu Persetujuan</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#updateModal">
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
                                        <td>SIM</td>
                                        <td>2019</td>
                                        <td>Sistem Informasi Kelas Proyek</td>
                                        <td>Sistem Informasi Semester 5</td>
                                        <td>Elang Bayu Aji Hartanto</td>
                                        <td>Menunggu Persetujuan</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#updateModal">
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
                                        <td>SIM</td>
                                        <td>2019</td>
                                        <td>Sistem Informasi Kelas Proyek</td>
                                        <td>Sistem Informasi Semester 5</td>
                                        <td>Elang Bayu Aji Hartanto</td>
                                        <td>Menunggu Persetujuan</td>
                                        <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#updateModal">
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
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>


            <!-- Modal Update -->
            <div class="modal fade bd-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Usul Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="tile-body">
                                <div class="row">
                                    <div class="col-md-12"><b>Pilih Kelas Proyek</b>
                                        <div class="form-group">
                                            <select class="form-control" readonly>
                                                <option>SIM</option>
                                                <option>Proyek Aplikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Pilih Periode</b>
                                        <div class="form-group">
                                            <select class="form-control" readonly>
                                                <option>2019</option>
                                                <option>2018</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Judul Proyek :</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="judulProyek" placeholder="Nama Kelas Proyek" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Deskripsi Proyek :</b>
                                        <div class="form-group">
                                            <textarea readonly="readonly" class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Kelas Proyek"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Status :</b>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Diterima</option>
                                                <option>Ditolak</option>
                                                <option>Pending</option>
                                            </select>
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
