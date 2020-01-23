@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Detail Informasi Proyek</h1>
        <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->

    <!-- Content Row -->
    <div class="row">

        <div class="col-1"></div>

        <div class="col-lg-10 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-12">
                        <div class="row">

                            <div class="col-md-8">
                                <h6 class="m-0 font-weight-bold text-primary">Sistem Informasi Kelas Proyek</h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <label class="m-0 font-weight-bold text-black">Status : <b>Aktif</b></label>
                            </div>

                        </div>
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
                                                <div class="col-md-3 text-left">
                                                    Judul :
                                                </div>
                                                <div class="col-md-8 ml-3">
                                                    Sistem Informasi Kelas Proyek
                                                </div>
                                                <hr>
                                                <div class="col-md-3 text-left">
                                                    Pembimbing :
                                                </div>
                                                <div class="col-md-8 ml-3">
                                                    Irkham Huda
                                                </div>
                                                <hr>
                                                <div class="col-md-3 text-left">
                                                    Anggota :
                                                </div>
                                                <div class="col-md-8 ml-3">
                                                    Elang Bayu Aji Hartanto<br>
                                                </div>


                                                <div class="col-md-12 text-left">
                                                    <hr>
                                                </div>

                                                <div class="col-md-3 text-left">
                                                    Laporan :
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-bordered" id="sampleTable">
                                                <thead>
                                                <tr>
                                                    <th>Minggu</th>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>4</td>
                                                    <td>25-08-2019</td>
                                                    <td>17-08-2019</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


{{--                                    <div class="row">--}}
{{--                                    <div class="col-1"></div>--}}
                                    <div class="card-body col-12">

                                        <div class="card-header py-3">

                                            <div class="row">

                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Pencapaian</h6>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <a href="{{ route('pencapaian.tambah')}}" class="btn btn-primary">Tambah</a>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Agenda</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Membuat DAD</td>
                                                        <td>
                                                            <p>sdfjbnaljdbflsjbdfl;abds;ifbha;ksdbfkjsbfkjsbdjkfbsdkjf
                                                            sdfknsdkjkfbnskjdbfnkjsdbfkjsbdkfjb</p>
                                                        </td>
                                                        <td>

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
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
{{--                                    <div class="col-1"></div>--}}
{{--                                    </div>--}}
                                    <div class="card-body col-12">

                                        <div class="card-header py-3">

                                            <div class="row">

                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Agenda Selanjutnya</h6>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <a href="/detailProject" class="btn btn-primary">Tambah</a>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Agenda</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Membuat ERD</td>
                                                        <td>
                                                            <p>sdfjbnaljdbflsjbdfl;abds;ifbha;ksdbfkjsbfkjsbdjkfbsdkjf
                                                                sdfknsdkjkfbnskjdbfnkjsdbfkjsbdkfjb</p>
                                                        </td>
                                                        <td>

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
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="card-body col-12">

                                        <div class="card-header py-3">

                                            <div class="row">

                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Milestone</h6>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <a href="/detailProject" class="btn btn-primary">Tambah</a>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Milestone</th>
                                                        <th>Status</th>
                                                        <th>Target Selesai</th>
                                                        <th>Perkiraan Selesai</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Web Desain</td>
                                                        <td>20%</td>
                                                        <td>17-08-2020</td>
                                                        <td>23-08-2020</td>
                                                        <td>

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
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="card-body col-12">

                                        <div class="card-header py-3">

                                            <div class="row">

                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Lampiran</h6>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <a href="/detailProject" class="btn btn-primary">Tambah</a>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Nama Lampiran</th>
                                                        <th>Foto</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>DAD</td>
                                                        <td>
                                                            <p>sdfjbnaljdbflsjbdfl;abds;ifbha;ksdbfkjsbfkjsbdjkfbsdkjf
                                                                sdfknsdkjkfbnskjdbfnkjsdbfkjsbdkfjb</p>
                                                        </td>
                                                        <td>

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
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>





                                </section>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

@endsection
