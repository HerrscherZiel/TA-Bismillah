@extends('layouts.welcome')

@section('content')


    <div class="row" style="margin:0;">
            <!-- Approach -->

            <div class="col-md-12">
                    <!-- <div class="card-header py-3">

                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Login</h6>
                            </div>
                        </div>
                    </div> -->


                    <div class="text-center">
                        <div style="color:black;"> 
                            <br>
                            <h2><b>Selamat datang di</h2>
                            <h2>Sistem Informasi Kelas Proyek</b></h2>
                            <p>Seluruh aktivitas kelas proyek Program Studi Komputer dan Sistem Informasi Sekolah Vokasi Universitas Gadjah Mada</p>
                            <br>
                            <p>Masuk sebagai :</p>
                            <br>
                        </div>
                        <div class="row" style="color:black;margin:0;">
                            <div class="col-4">
                            <a href="/admin/login" style="color:black;">
                            <img class="img-fluid float-center" src="{{url('/')}}/asset/img/mahasiswa.svg" style="width: 80px;padding-bottom:5px;" alt="Icon admin">
                            <h4>Admin</a></h4>
                            </div>
                            <div class="col-4">
                            <a href="/dosen/login" style="color:black;">
                            <img class="img-fluid float-center" src="{{url('/')}}/asset/img/teacher.svg" style="width: 80px;padding-bottom:5px;" alt="Icon dosen">
                            <h4>Dosen</a></h4>
                            </div>
                            <div class="col-4">
                            <a href="/mahasiswa/login" style="color:black;">
                            <img class="img-fluid float-center" src="{{url('/')}}/asset/img/student.svg" style="width: 80px;padding-bottom:5px;" alt="Icon mahasiswa">
                            <h4>Mahasiswa</a></h4>
                            </div>
                        </div>
                    </div>
            </div>
    </div>


@endsection
