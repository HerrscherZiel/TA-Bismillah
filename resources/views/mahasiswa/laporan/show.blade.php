@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Detail Laporan Proyek</h1>
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
                                                    Project Manager :
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
                                                    <th>Tanggal Kirim</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>4</td>
                                                    <td>25-08-2019</td>
                                                    <td>17-08-2019</td>
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
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPencapaian">Tambah</button>
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
                                                                <button class="btn btn-info" data-toggle="modal" data-target="#editPencapaian">
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

                                    </div> {{--Pencapaian--}}
                                    {{--                                    <div class="col-1"></div>--}}
                                    {{--                                    </div>--}}
                                    <div class="card-body col-12">

                                        <div class="card-header py-3">

                                            <div class="row">

                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Agenda Selanjutnya</h6>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahAgenda">Tambah</button>
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
                                                                <button class="btn btn-info" data-toggle="modal" data-target="#editAgenda">
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


                                    <div class="card-body col-12">

                                        <div class="card-header py-3">

                                            <div class="row">

                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Milestone</h6>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMilestone">Tambah</button>
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
                                                                <button class="btn btn-info" data-toggle="modal" data-target="#editMilestone">
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

        </div>
    </div>
            <!-- End of Main Content -->



    <!-- Modal Insert --> {{--Pencapaian--}}
    <div class="modal fade bd-modal-lg insert" id="tambahPencapaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pencapaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12"><b>Pencapaian :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="pencapaian" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Deskripsi :</b>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Pencapaian"></textarea>
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

    <!-- Modal Update --> {{--Pencapaian--}}
    <div class="modal fade bd-modal-lg" id="editPencapaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Pencapaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12"><b>Pencapaian :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="pencapaian" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Deskripsi :</b>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Pencapaian"></textarea>
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

    <!-- Modal Insert --> {{--Agenda--}}
    <div class="modal fade bd-modal-lg insert" id="tambahAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12"><b>Agenda :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="agenda" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Deskripsi :</b>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Pencapaian"></textarea>
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

    <!-- Modal Update --> {{--Agenda--}}
    <div class="modal fade bd-modal-lg" id="editAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Agenda Selanjutnya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12"><b>Agenda Selanjutnya :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="agenda" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Deskripsi :</b>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Pencapaian"></textarea>
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

    <!-- Modal Insert --> {{--Milestone--}}
    <div class="modal fade bd-modal-lg insert" id="tambahMilestone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Milestone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12"><b>Milestone :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="milestone" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Status Milestone :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="statusMilestone" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Target Selesai :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="targetMilestone" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Tanggal Perkiraan Selesai :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="target" placeholder="Membuat...">
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

    <!-- Modal Update --> {{--Milestone--}}
    <div class="modal fade bd-modal-lg" id="editMilestone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Milestone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12"><b>Milestone :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="milestone" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Status Milestone :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="statusMilestone" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Target Selesai :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="targetMilestone" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Tanggal Perkiraan Selesai :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="target" placeholder="Membuat...">
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
