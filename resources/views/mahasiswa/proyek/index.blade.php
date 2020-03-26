@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Kelompok Proyek</h1>
        <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->

    <!-- Content Row -->
    <div class="row">

        <div class="col-1"></div>

        <div class="col-lg-10 mb-4">

            <!-- Approach -->

            <div class="col-md-12">

                <div class="card shadow mb-4">


                    <div class="card-header py-3">

                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Kelompok Proyek</h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Tambah</button>
                            </div>
                            <!--                      </div>-->

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="table-test" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Kelas Proyek</th>
                                    <th>Periode</th>
                                    <th>Project Manager</th>
                                    <th>Proyek</th>
                                    <th>Dosen Pembimbing</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kelompok as $kel)
                                    <tr>
                                        <td>
                                            @foreach($kelasproyek as $kelPro)
                                                @if($kelPro->id_kelasProyek == $kel->kelasProyek_id)
                                                    {{$kelPro->namaKelasProyek}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($periode as $per)
                                                @if($per->id_periode == $kel->periode_id)
                                                    {{$per->tahunAjaran}} | {{$per->semester}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{$kel->pm}}
                                        </td>
                                        <td>
                                            @if($kel->judulPrioritas == null)
                                                Belum ada judul
                                            @else
                                                {{$kel->judulPrioritas}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($kel->dosen_id == null)
                                                Belum ada pembimbing
                                            @else
                                                @foreach($dosen as $dos)
                                                    @if($dos->id_dosen == $kel->dosen_id)
                                                        {{$dos->namaDosen}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{$kel->statusKelompok}}</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="/kelompok/show/{{$kel->id_kelompokProyek}}" class="btn btn-primary">
                                                        <i class="fa fa-lg fa-eye">
                                                        </i>
                                                    </a>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-lg fa-trash">
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

            <!-- Modal Insert -->
            <div class="modal fade bd-modal-lg insert" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Buat Kelompok</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="post" action="{{ route('kelompokproyek.store')}}" enctype="multipart/form-data">
                            @csrf

                        <div class="modal-body">
                            <div class="tile-body">
                                <p><b>*Dengan membentuk kelompok anda akan otomatis terdaftar sebagai Project Manager dalam kelompok<br>
                                        *Project Manager dapat diganti dilain waktu</b>
                                <br>
                                <br>
                                </p>
                                <div class="row">
                                    <div class="col-md-12"><b>Pilih Kelas Proyek</b>
                                        <div class="form-group">
                                            <select class="form-control selectbox" name="mahasiswaProyek_id" style="width: 100%" required>
                                                @if($excs != null)
                                                @foreach($excs as $exc)
                                                    <option value="{{$exc -> id_mahasiswaProyek}}">
                                                        {{$exc -> namaKelasProyek}}
                                                    </option>
                                                @endforeach
                                                @else
                                                    <option disabled>
                                                        Belum terdaftar dalam kelas proyek
                                                    </option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Project Manager</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="pm"
                                                   value="{{Auth::guard('mahasiswa')->user()->namaMahasiswa}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Status :</b>
                                        <div class="form-group">
                                            <input class="form-control"  type="text" name="statusKelompok" value="Menunggu Persetujuan" required>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="judulPrioritas" value="Belum ada judul">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Buat Kelompok</button>
                        </div>

                        </form>

                    </div>
                </div>
            </div>


@endsection
