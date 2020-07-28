@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Detail Kelompok Bimbingan</h1>
    </div>

    <div class="col-12">
        <div class="row text-center">
            <div class="col-1">
                <a href="javascript:window.history.back();">
                <i class="fa fa-lg fa-arrow-left" aria-hidden="true" style="transform: scale(2.1,1.5);"></i></a>
                <br>
                <br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-10 offset-1 mb-4">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                            Kelompok
                            @foreach($kelompok as $kel)
                                    {{$kel->judulPrioritas}}
                            @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-body" style="color:black">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <div class="row invoice-info mb-2">
                                    <div class="col-md-12">
                                        <div class="row">
                                        @foreach($kelompok as $kel)
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-12 text-left">
                                                        <b> Kelas Proyek</b>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        : {{$kel->namaKelasProyek}}
                                                    </div>
                                                    <hr>
                                                    <div class="col-lg-2 col-sm-12 text-left">
                                                        <b> Periode</b>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        : {{$kel->semester}} | {{$kel->tahunAjaran}}
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                            <b> Judul</b>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                : 
                                                @if($kel->judulPrioritas == null)
                                                    Belum ada judul
                                                @else
                                                    {{$kel->judulPrioritas}}
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                            <b> Pembimbing</b>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                : 
                                                @if($kel->dosen_id == null)
                                                    Belum ada Pembimbing
                                                @else
                                                    @foreach($dosen as $dos)
                                                        @if($kel->dosen_id == $dos->id_dosen)
                                                            {{$dos->namaDosen}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                                <b> Project Manager</b>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                : {{$kel->pm}}<br>
                                            </div>
                                            <hr>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                                <b>Status</b>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                : {{$kel->statusKelompok}}
                                            </div>

                                            @endforeach    
                                            <hr>
                                        </div>
                                    </div>

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3 text-left">
                                                        <b> Laporan : </b>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body col-12">
                                                <div class="card-header py-3">
                                                    <div class="row">
                                                        <div class="col-md-8 my-auto">
                                                            <h6 class="font-weight-bold text-primary m-0">Laporan</h6>
                                                        </div>

                                                        <div class="col-md-4 text-right">
                                                            @foreach($kelompok as $kel)
                                                            <a type="button" class="btn btn-primary" href="/dosen/laporan/kelompok/index-laporan/{{$kel->id_kelompokProyek}}">
                                                                Lebih Lengkap
                                                            </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                <div class="col-12 table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Tanggal Mulai</th>
                                                            <th>Tanggal Selesai</th>
                                                            <th>Tanggal Kirim</th>
                                                            <th>Action</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(count($laporan) > 0)
                                                        @foreach($laporan as $lap)
                                                        <tr>
                                                            <td>{{date('d-m-Y', strtotime($lap->tglMulai))}}</td>
                                                            <td>{{date('d-m-Y', strtotime($lap->tglSelesai))}}</td>
                                                            <td>{{date('d-m-Y', strtotime($lap->tglKirim))}}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="btn btn-info" href="/dosen/laporan/kelompok/detail-laporan/{{$lap->id_laporan}}">
                                                                        <i class="fa fa-lg fa-eye">
                                                                        </i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="5">Belum ada laporan</td>                                                       
                                                        </tr>
                                                        @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                    <div class="col-md-3 text-left">
                                    <b>Anggota Kelompok</b> : 
                                    </div>
                                    <div class="card-body col-12">

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Nama Anggota</th>
                                                        <th>NIM</th>
                                                        <th>Status Anggota</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($anggota as $ang)
                                                    <tr>
                                                        <td>{{$ang->namaMahasiswa}}</td>
                                                        <td>{{$ang->nim}}</td>
                                                        <td>
                                                            {{$ang->statusAnggota}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <b>Judul Pilihan :</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body col-12">

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered text-center" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Judul</th>
                                                        <th>Keterangan</th>
                                                        <th>Prioritas</th>                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                @foreach($judulPilihan as $jud)
                                                    <tr>
                                                        <td>{{$jud->judul}}</td>
                                                        <td>
                                                            <p>{{$jud->deskripsi}}</p>
                                                        </td>
                                                        <td>{{$jud->prioritas}}</td>
                                                    </tr>
                                                @endforeach
                                                    <tr>
                                                @if(count($usul) > 0)
                                                    @foreach($usul as $us)
                                                        <td>{{$us->judulUsul}} <br>
                                                            ({{$us->statusUsul}})</td>
                                                        <td>{{$us->usDesk}}</td>
                                                        <td>Usul</td>
                                                    @endforeach
                                                @endif
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

            </div>
        </div>
    </div>


@endsection
