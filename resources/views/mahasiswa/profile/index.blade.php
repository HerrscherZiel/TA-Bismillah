@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Profile | Mahasiswa</h1>
        <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->

    <div class="row">

        <div class="col-lg-4 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-10">

                        <div class="col-7">
                            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                        </div>
                        <!--                      <div class="col-2">-->
{{--                    <!--                      <a href="/jobs/creates/{{$mod->id_module}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Add Job</a>-->--}}
                        <!--                      </div>-->
                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">


                                <section class="invoice">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <div class="card-body">
                                                    <img class="img-fluid rounded-circle float-center" src="img/undraw_posting_photo.svg" style="width: 300px; height: auto" alt="Responsive image">
                                                    <br><span class="mr-2 d-none d-lg-inline text-gray-600 small">Ukuran foto maks AxA</span>
                                                </div>


                                                <form class="align-items-center mx-auto col-md-12 row">
                                                    <div class="col-md-1">
                                                    </div>
                                                    <div class="col-md-6" style="padding-top: 10px">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" name="nama_project" placeholder="Pilih Gambar">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="btn btn-primary mx-auto">Simpan</div>
                                                    </div>

                                                </form>

                                            </div>


                                            <div class="card-body" style="color: black;">
                                                <div class="row">

                                                    <div class="col-md-12 text-center">
                                                        <h3> Elang Bayu Aji Hartanto </h3>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <h5> 17/416344/SV/14082 </h5>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <!--                                      <div class="col-auto">-->
                                                        <i class="fas fa-calendar fa-1x text-gray-300"></i>
                                                        <!--                                      </div>-->
                                                        <a> Mahasiswa
                                                        </a><br>
                                                    </div>
                                                </div>
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

        <div class="col-lg-8 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-10">

                        <div class="col-7">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Profile</h6>
                        </div>

                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">


                                <section class="invoice">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="card-body" style="color: black;">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <h5> <b>Informasi Mahasiswa</b> </h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p><b>IPK</b></p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p><b>SKS</b></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p><b>Email</b></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p><b>HP</b></p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>3.56</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p>109</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>Elangbayu98@mail.ugm.ac.id </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>082227635174</p>
                                                        <br>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h5><b>Keahlian</b> </h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p>Backend (Laravel), MySQL, Premiere, Paint Tool Sai </p>
                                                        <br>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-12">
                                                        <h5><b>Pengalaman </b></h5>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p>Menjadi backend ketika proyek aplikasi 3, menjadi database designer pada tugas akhir web 2, menjadi project manager dan backend ketika magang </p>
                                                    </div>
                                                </div>
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


    <!-- Content Row -->

@endsection
