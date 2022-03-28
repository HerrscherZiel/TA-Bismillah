@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row justify-content-md-center">

        <div class="col-10 mb-4 mx-auto">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="h3 text-center font-weight-bold text-uppercase text-gray-800">Selamat datang, {{Auth::guard('dosen')->user()->namaDosen}} </div>
                            <div class="h6 mb-0 text-center font-weight-bold text-gray-800">Seluruh aktifitas kelas proyek prodi Rekayasa Perangkat Lunak dilakukan pada sistem ini</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-10 col-md-12 col-sm-12">
            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl-left font-weight-bold text-primary text-uppercase mb-1">Proyek</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$proyek}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tasks fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl-left font-weight-bold text-success text-uppercase mb-1">Kelompok Bimbingan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kelompokbim}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xl-left font-weight-bold text-warning text-uppercase mb-1">Laporan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$laporan}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-copy fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-10 col-md-12 col-sm-12 mb-4">

            <div class="col-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Laporan</h6>
                            </div>
                            <div class="col-md-4 text-right">
                                <a type="button" class="btn btn-primary" href="/dosen/laporan/">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Kelas Proyek</th>
                                    <th>Periode</th>
                                    <th>Judul</th>
                                    <th>Tanggal Kirim</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(count($laporanpro) > 0)
                                @foreach($laporanpro as $pro)
                                    <tr>
                                        <td>{{$pro->namaKelasProyek}}</td>
                                        <td>{{$pro->semester}} | {{$pro->tahunAjaran}}</td>
                                        <td>{{$pro->judulPrioritas}}</td>
                                        <td>
                                        {{ \Carbon\Carbon::parse($pro->tglKirim)->translatedFormat('d F Y')}}</td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan=4>Belum ada laporan proyek </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                            
                </div>

            </div>

        </div>
    </div>

@endsection
