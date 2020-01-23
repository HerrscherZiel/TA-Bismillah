@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Proyek | Judul Proyek</h1>
        <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-1"></div>

        <div class="col-lg-10 mb-4">

            <!-- Approach -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-10">

                        <div class="col-7">
                            <h6 class="m-0 font-weight-bold text-primary">Pilih Judul Proyek</h6>
                        </div>
                        <!--                      <div class="col-2">-->
                        <!--                      </div>-->
                    </div>
                </div>


                <div class="row">


                    <!-- Pending Requests Card Example -->
                    <div class="col-md-8 my-2">
                        <div class="card-body">
                            <div class="row no-gutters text-left">
                                <div class="col mr-2">
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">*Pilih kelas proyek terlebih dahulu sebelum memilih judul</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">*Pilih judul yang diinginkan dan tentukan prioritas pemilihan</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">*Untuk usul judul, ganti opsi pilihan pada pilihan judul ketiga menjadi usul-judul</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form>
                    <div class="col-md-5 ml-2">
                        <div class="form-group" style="color: black">
                            <h5> <b>Pilih Kelas Proyek</b> </h5>
                            <select class="form-control">
                                <option>SIM | 2019</option>
                                <option>Proyek Aplikasi | 2017</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-body" style="color: black;">
                        <div class="row">

                            <div class="col-md-12">
                                <h5> <b>Pilihan Satu</b> </h5>
                                <hr>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Pilih Judul:</label>
                                    <select class="form-control">
                                        <option>Sistem Informasi InSIDE</option>
                                        <option>Sistem Informasi Pendaftaran UKM</option>
                                        <option>Sistem Informasi Perpustakaan</option>
                                        <option>Sistem Informasi Distribusi Barang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Pilih Prioritas:</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <h5> <b>Pilihan Dua</b> </h5>
                                <hr>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Pilih Judul:</label>
                                    <select class="form-control">
                                        <option>Sistem Informasi InSIDE</option>
                                        <option>Sistem Informasi Pendaftaran UKM</option>
                                        <option>Sistem Informasi Perpustakaan</option>
                                        <option>Sistem Informasi Distribusi Barang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Pilih Prioritas:</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <h5> <b>Pilihan Tiga</b> </h5>
                                <hr>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Pilih Judul:</label>
                                    <select class="form-control" >
                                        <option>Sistem Informasi InSIDE</option>
                                        <option>Sistem Informasi Pendaftaran UKM</option>
                                        <option>Sistem Informasi Perpustakaan</option>
                                        <option>Sistem Informasi Distribusi Barang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Pilih Prioritas:</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Pilih/Usul Judul</label>
                                    <select class="form-control">
                                        <option>Pilih Judul</option>
                                        <option>Usul Judul</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <h5> <b>Usul Judul</b> </h5>
                                <hr>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Masukan Usul Judul Proyek</label>
                                        <input type="text" name="Judul" placeholder="Masukan Judul" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Pilih Prioritas:</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-10 mt-2">
                                        <label>Masukan Keterangan Proyek</label>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="7" name="keterangan" placeholder="Keterangan"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-2 text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-save"></i>Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>



                </form>

                <!-- /.container-fluid -->

            </div>

@endsection
