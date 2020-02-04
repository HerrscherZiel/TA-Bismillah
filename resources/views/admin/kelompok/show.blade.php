@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Kelompok Proyek</h1>
        <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->

    <!-- Content Row -->
    <div class="row">

        <div class="col-1">
        </div>

        <div class="col-lg-10 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-12">
                        <div class="row">

                            <div class="col-md-8">
                                {{--                                <h6 class="m-0 font-weight-bold text-primary">Sistem Informasi Kelas Proyek</h6>--}}
                            </div>

                            <div class="col-md-4 text-right">
                                <label>Edit Kelompok : </label>
                                <div class="btn-group">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#updateModal">
                                        <i class="fa fa-lg fa-edit">
                                        </i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <div class="row invoice-info mb-2">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                Kelas Proyek
                                            </div>
                                            <div class="col-md-8 ml-3">
                                                : SIM
                                            </div>
                                            <hr>
                                            <div class="col-md-3 text-left">
                                                Periode
                                            </div>
                                            <div class="col-md-8 ml-3">
                                                : 2019
                                            </div>
                                            <hr>
                                            <div class="col-md-3 text-left">
                                                Judul
                                            </div>
                                            <div class="col-md-7 ml-3">
                                                : -
                                            </div>
                                            <hr>
                                            <div class="col-md-3 text-left">
                                                Pembimbing
                                            </div>
                                            <div class="col-md-8 ml-3">
                                                : -
                                            </div>
                                            <hr>
                                            <div class="col-md-3 text-left">
                                                Project Manager
                                            </div>
                                            <div class="col-md-8 ml-3">
                                                : Elang Bayu Aji Hartanto<br>
                                            </div>
                                            <hr>
                                            <div class="col-md-3 text-left">
                                                Status Kelompok
                                            </div>
                                            <div class="col-md-8 ml-3">
                                                : Menunggu Persetujuan
                                            </div>
                                            <hr>
                                        </div>
                                    </div>



                                    {{--                                    <div class="row">--}}
                                    {{--                                    <div class="col-1"></div>--}}

                                    {{--                                        <div class="card-header py-3">--}}

                                    {{--                                            <div class="row">--}}

                                    {{--                                                <div class="col-md-8 my-auto">--}}
                                    {{--                                                    <h6 class="font-weight-bold text-primary m-0">Anggota Kelompok</h6>--}}
                                    {{--                                                </div>--}}

                                    {{--                                            </div>--}}

                                    {{--                                        </div>--}}
                                    <div class="col-md-3 text-left">
                                        Anggota Kelompok
                                    </div>
                                    <div class="col-md-8 ml-3">
                                        :
                                    </div>
                                    <div class="card-body col-12">

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Nama Anggota</th>
                                                        <th>Status Anggota</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>Adi Adinegara</td>
                                                        <td>
                                                            Aktif
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Adi Adinegara</td>
                                                        <td>
                                                            Aktif
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Adi Adinegara</td>
                                                        <td>
                                                            Aktif
                                                        </td>
                                                    </tr>



                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    {{--                                    <div class="col-1"></div>--}}
                                    {{--                                    </div>--}}


                                    <div class="col-md-3 text-left">
                                        Judul Pilihan
                                    </div>
                                    <div class="col-md-8 ml-3">
                                        :
                                    </div>
                                    <div class="card-body col-12">

                                        {{--                                        <div class="card-header py-3">--}}

                                        {{--                                            <div class="row">--}}

                                        {{--                                                <div class="col-md-8 my-auto">--}}
                                        {{--                                                    <h6 class="font-weight-bold text-primary m-0">Judul Pilihan</h6>--}}
                                        {{--                                                </div>--}}

                                        {{--                                            </div>--}}

                                        {{--                                        </div>--}}

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Judul</th>
                                                        <th>Keterangan</th>
                                                        <th>Prioritas</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Sistem Informasi Kelas Proyek</td>
                                                        <td>
                                                            <p>sdfjbnaljdbflsjbdfl;abds;ifbha;ksdbfkjsbfkjsbdjkfbsdkjf
                                                                sdfknsdkjkfbnskjdbfnkjsdbfkjsbdkfjb</p>
                                                        </td>
                                                        <td>1</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
    </div>


    <!-- Modal Update -->
    <div class="modal fade bd-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kelompok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Judul Proyek :</b>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Sistem Informasi Kelas Proyek</option>
                                        <option>Sistem Informasi Apotek</option>
                                        <option>Sistem Informasi Laundry Asik</option>
                                        <option>Sistem Informasi Damkar</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Dosen Pembimbing :</b>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Irkham Huda</option>
                                        <option>Wahyono</option>
                                        <option>Umar Taufik</option>
                                    </select>
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
