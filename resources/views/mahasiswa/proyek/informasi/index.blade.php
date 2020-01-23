@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Detail Informasi Proyek</h1>
        <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->

    <!-- Content Row -->
    <div class="row">

        <div class="col-2"></div>

        <div class="col-lg-8 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-10">

                        <div class="col-7">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Proyek</h6>
                        </div>
                        <!--                      <div class="col-2">-->
                        <!--                      </div>-->
                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <section class="invoice">
                                    <!--                          <div class="row mb-4">-->

                                    <!--                          </div>-->
                                    <div class="row invoice-info mb-2">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 text-left" style="color: black">
                                                    <h5><b>Judul</b></h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 table-responsive">
                                                        <table class="table" id="sampleTable">
                                                            <thead>
                                                            <tr>
                                                                <th>Pilihan</th>
                                                                <th>Deskripsi</th>
                                                                <th>Prioritas</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Sistem Informasi Kelas Proyek
                                                                </td>
                                                                <td>Sistem Informasi untuk memanajemen kelas proyek yang ada di prodi RPL.</td>
                                                                <td>1</td>
                                                                <td>

                                                                    <div class="btn-group">
                                                                        <a class="btn btn-info" href="#">
                                                                            <i class="fa fa-lg fa-edit">
                                                                            </i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Sistem Informasi Apotek
                                                                </td>
                                                                <td>Sistem Informasi untuk mempermudah proses pendaftaran di apotek.</td>
                                                                <td>2</td>
                                                                <td>

                                                                    <div class="btn-group">
                                                                        <a class="btn btn-info" href="#">
                                                                            <i class="fa fa-lg fa-edit">
                                                                            </i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Sistem Informasi Timesheets
                                                                </td>
                                                                <td>Sistem Informasi membuat timesheets yang digunakan sebagai timnesheet harian karyawan</td>
                                                                <td>3</td>
                                                                <td>

                                                                    <div class="btn-group">
                                                                        <a class="btn btn-info" href="#">
                                                                            <i class="fa fa-lg fa-edit">
                                                                            </i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>


                                                            </tbody>
                                                        </table>
                                                    </div>


                                                    <div class="col-md-12 text-left" style="color: black">
                                                        <br>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <h5><b>Anggota</b></h5>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 table-responsive">
                                                                <table class="table" id="sampleTable">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Nama Anggota</th>
                                                                        <th>Keahlian</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Elang Bayu Aji Hartanto
                                                                        </td>
                                                                        <td>
                                                                            Backend
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn-group">
                                                                                <a class="btn btn-info" href="#">
                                                                                    <i class="fa fa-lg fa-edit">
                                                                                    </i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Adi Priyono
                                                                        </td>
                                                                        <td>
                                                                            Backend
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn-group">
                                                                                <a class="btn btn-info" href="#">
                                                                                    <i class="fa fa-lg fa-edit">
                                                                                    </i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Jaffar Jatmiko Jati
                                                                        </td>
                                                                        <td>
                                                                            Frontend
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn-group">
                                                                                <a class="btn btn-info" href="#">
                                                                                    <i class="fa fa-lg fa-edit">
                                                                                    </i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Rosyidin Adinegara
                                                                        </td>
                                                                        <td>
                                                                            Frontend
                                                                        </td>
                                                                        <td>
                                                                            <div class="btn-group">
                                                                                <a class="btn btn-info" href="#">
                                                                                    <i class="fa fa-lg fa-edit">
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
                                            </div>
                                        </div>


                                </section>
                            </div>
                        </div>
                    </div>


@endsection
