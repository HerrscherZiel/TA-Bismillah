@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Kelas Proyek</h1>
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
                                <h6 class="font-weight-bold text-primary m-0">Sistem Informasi Kelas Proyek</h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <a class="btn btn-primary" href="/kelasproyek/tambah">
                                    Tambah
                                </a>
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
                                    <th>No</th>
                                    <th>Nama Kelas Proyek</th>
                                    <th>Dekripsi</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>SIM</td>
                                    <td>Kelas Proyek Semester 5</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="#">
                                                    <i class="fa fa-lg fa-edit">
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
                                    <td>2</td>
                                    <td>SIM</td>
                                    <td>Kelas Proyek Semester 5</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="#">
                                                    <i class="fa fa-lg fa-edit">
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
                                    <td>3</td>
                                    <td>SIM</td>
                                    <td>Kelas Proyek Semester 5</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="#">
                                                    <i class="fa fa-lg fa-edit">
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
@endsection