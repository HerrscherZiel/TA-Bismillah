@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Proyek | Anggota Kelompok Proyek</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">Pilih Anggota Kelompok</h6>
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
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">*Pilih kelas proyek terlebih dahulu sebelum memilih anggota</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">*Pilihan anggota kelompok yang sudah disubmit akan menunggu persetujuan anggota</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">*Pilihan anggota kelompok yang sudah disubmit dalam masa pendaftaran masih bisa diganti</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">*Jika ingin bergabung dengan kelompok dengan invitasi, kosongkan halaman ini</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 ml-2">
                    <form>
                        <div class="form-group" style="color: black">
                            <h5> <b>Pilih Kelas Proyek</b> </h5>
                            <select class="form-control">
                                <option>SIM | 2019</option>
                                <option>Proyek Aplikasi | 2017</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="card-body" style="color: black;">
                    <form>
                        <div class="row">

                            <div class="col-md-12">
                                <h5> <b>Anggota Satu</b> </h5>
                                <hr>
                            </div>

                            <form>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <select class="form-control" name="user_id" required="" value="">
                                            <option>Elang Bayu Aji Hartanto</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Invite</button>
                                </div>
                            </form>


                            <div class="col-md-12">
                                <h5> <b>Anggota Dua</b> </h5>
                                <hr>
                            </div>

                            <div class="col-md-12">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select class="form-control" name="user_id" id="" required="">
                                                    <optgroup label="Pilih User">
                                                        <option>Elang Bayu Aji Hartanto</option>
                                                        <option> Adi Priyono</option>
                                                        <option>Jaffar Jatmiko Jati</option>
                                                        <option>Rosyidin Adinegara</option>
                                                        <option>Alfath Ressy Ajiaurum</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Invite</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-12">
                                <h5> <b>Anggota Tiga</b> </h5>
                                <hr>
                            </div>

                            <div class="col-md-12">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select class="form-control" name="user_id" id="" required="">
                                                    <optgroup label="Pilih User">
                                                        <option>Elang Bayu Aji Hartanto</option>
                                                        <option>Adi Priyono</option>
                                                        <option>Jaffar Jatmiko Jati</option>
                                                        <option>Rosyidin Adinegara</option>
                                                        <option>Alfath Ressy Ajiaurum</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Invite</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-12">
                                <h5> <b>Anggota Empat</b> </h5>
                                <hr>
                            </div>

                            <div class="col-md-12">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select class="form-control" name="user_id" id="" required="">
                                                    <optgroup label="Pilih User">
                                                        <option>Elang Bayu Aji Hartanto</option>
                                                        <option>Adi Priyono</option>
                                                        <option>Jaffar Jatmiko Jati</option>
                                                        <option>Rosyidin Adinegara</option>
                                                        <option>Alfath Ressy Ajiaurum</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Invite</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-12">
                                <h5> <b>Anggota Lima</b> </h5>
                                <hr>
                            </div>

                            <div class="col-md-12">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select class="form-control" name="user_id" id="" required="">
                                                    <optgroup label="Pilih User">
                                                        <option>Elang Bayu Aji Hartanto</option>
                                                        <option>Adi Priyono</option>
                                                        <option>Jaffar Jatmiko Jati</option>
                                                        <option>Rosyidin Adinegara</option>
                                                        <option>Alfath Ressy Ajiaurum</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Invite</button>
                                        </div>
                                    </div>
                                </form>
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
                </div>
                <!-- /.container-fluid -->

@endsection
