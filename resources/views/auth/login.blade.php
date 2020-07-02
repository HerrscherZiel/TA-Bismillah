@extends('layouts.welcome')

@section('content')

    <!-- Page Heading
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto text-center">
        <h1 class="h3 mb-0 text-gray-800">Login</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->
    <!-- Content Row -->
    <div class="row">
            <!-- Approach -->

            <div class="col-md-12" style="padding:0px;">
                    <!-- <div class="card-header py-3">

                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Login</h6>
                            </div>
                        </div>
                    </div> -->


                    <div class="text-center">
                        <div style="margin-top: 25px;color:black;"> 
                            <br>
                            <h2><b>Selamat datang di</h2>
                            <h2>Sistem Informasi Kelas Proyek</b></h2>
                            <p>Seluruh aktivitas kelas proyek Program Studi Komputer dan Sistem Informasi Sekolah Vokasi Universitas Gadjah Mada</p>
                            <br>
                            <p>Masuk sebagai :</p>
                            <br>
                        </div>
                        <div class="row" style="padding: 0px; color:black;">
                            <div class="col-4" style="padding: 0px;">
                            <a href="/admin/login" style="color:black;">
                            <img class="img-fluid float-center" src="{{url('/')}}/asset/img/mahasiswa.svg" style="width: 100px; height: auto; padding-bottom:5px;" alt="Icon admin">
                            <h4>Admin</a></h4>
                            </div>
                            <div class="col-4" style="padding: 0px;">
                            <a href="/dosen/login" style="color:black;">
                            <img class="img-fluid float-center" src="{{url('/')}}/asset/img/teacher.svg" style="width: 100px; height: auto; padding-bottom:5px;" alt="Icon dosen">
                            <h4>Dosen</a></h4>
                            </div>
                            <div class="col-4" style="padding: 0px;">
                            <a href="/mahasiswa/login" style="color:black;">
                            <img class="img-fluid float-center" src="{{url('/')}}/asset/img/student.svg" style="width: 100px; height: auto; padding-bottom:5px;" alt="Icon mahasiswa">
                            <h4>Mahasiswa</a></h4>
                            </div>
                        </div>
                    </div>
            </div>
    </div>


    <!-- Modal Insert -->
{{--    <div class="modal fade bd-modal-lg insert" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">--}}

{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Periode</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <form method="post" action="{{ route('periode.store')}}" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="tile-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12"><b>Tahun Ajaran :</b>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control" type="text" name="tahunAjaran" placeholder="2019, 2020, .....">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12"><b>Semester :</b>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <select class="form-control" type="text" name="semester" >--}}
{{--                                            <option>Genap</option>--}}
{{--                                            <option>Ganjil</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                        <button type="submit" class="btn btn-primary">Save changes</button>--}}
{{--                    </div>--}}
{{--                </form>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Modal Update -->
{{--    <div class="modal fade bd-modal-lg" id="updatePeriode" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">--}}

{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Periode</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <form method="post" action="{{ route('periode.update', 'edit')}}" enctype="multipart/form-data">--}}
{{--                    @method('PATCH')--}}
{{--                    @csrf--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="tile-body">--}}
{{--                            <input type="hidden" name="id_periode" id="id">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12"><b>Tahun Ajaran :</b>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <input class="form-control" type="text" name="tahunAjaran" id="tahun">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12"><b>Semester :</b>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <select class="form-control" type="text" name="semester" id="sem">--}}
{{--                                            <option>Genap</option>--}}
{{--                                            <option>Ganjil</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                        <button type="submit" class="btn btn-primary">Save changes</button>--}}
{{--                    </div>--}}
{{--                </form>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
