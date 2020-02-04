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


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nama Proyek</th>
                                <th>Kelas Proyek</th>
                                <th>Periode</th>
                                <th>Tanggal Kirim</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="detailProject">Sistem Informasi Kelas Proyek</a></td>
                                <td>SIM</td>
                                <td>2019</td>
                                <td>14-09-2019</td>
                                <td>
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="laporan/lihat">
                                                <i class="fa fa-lg fa-eye">
                                                </i>
                                            </a>
                                        </div>
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
                                <td><a href="detailProject"> Sistem Informasi Apotek </a></td>
                                <td>SIM</td>
                                <td>2019</td>
                                <td>21-09-2019</td>
                                <td>
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="laporan/lihat">
                                                <i class="fa fa-lg fa-eye">
                                                </i>
                                            </a>
                                        </div>
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
                                <td><a href="detailProject">Sistem Informasi Damkar</td>
                                <td>Proyek Aplikasi</td>
                                <td>2019</td>
                                <td>28-09-2019</td>
                                <td>
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="laporan/lihat">
                                                <i class="fa fa-lg fa-eye">
                                                </i>
                                            </a>
                                        </div>
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
                                <td><a href="detailProject">Sistem Informasi Laundry Asik</td>
                                <td>Proyek Aplikasi</td>
                                <td>2019</td>
                                <td>05-10-2019</td>
\                                <td>
                                    <div class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="laporan/lihat">
                                                <i class="fa fa-lg fa-eye">
                                                </i>
                                            </a>
                                        </div>
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
