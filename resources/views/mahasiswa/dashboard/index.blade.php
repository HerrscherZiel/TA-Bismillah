@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    @if(count($kelompok) == 1 & $kelompok[0] == NULL)

    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4 mx-auto">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h3 text-center font-weight-bold text-uppercase text-gray-800">Selamat datang, {{Auth::guard('mahasiswa')->user()->namaMahasiswa}} </div>
                            <div class="h6 mb-0 text-center font-weight-bold text-gray-800">Seluruh aktifitas kelas proyek prodi Rekayasa Perangkat Lunak dilakukan pada sistem ini</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
        <div class="row list">

        @foreach($kelompok as $kel)
            <div class="col-md-6">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">
                                @if($kel->judulPrioritas == 'Belum ada judul')
                                    Kelompok Proyek
                                @else
                                    {{$kel->judulPrioritas}}
                                @endif
                                </h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <a href="/mahasiswa/proyek/kelompok/show/{{$kel->id_kelompokProyek}}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" style="color:black;">
                        <div class="row">
                            <div class="col-4 text-left">
                                <b>Kelas Proyek</b> 
                            </div>
                            <div class="col-8 text-left">
                                : {{$kel->namaKelasProyek}}
                            </div>
                            <div class="col-4 text-left">
                                <b>Periode </b>  
                            </div>
                            <div class="col-8 text-left">
                                : {{$kel->semester}} | {{$kel->tahunAjaran}}
                            </div>
                            <div class="col-4 text-left">
                                <b>Judul </b>
                            </div>
                            <div class="col-8 text-left">
                                : {{$kel->judulPrioritas}}
                            </div>
                            <div class="col-4 text-left">
                                <b>Pembimbing </b>
                            </div>
                            <div class="col-8">
                               : 
                                @if($kel->dosen_id != NULL)
                                    @foreach($dosen as $dos)
                                        @if($dos->id_dosen == $kel->dosen_id)
                                            {{$dos->namaDosen}}
                                        @endif
                                    @endforeach
                                @else
                                    Belum ada pembimbing
                                @endif
                            </div>
                            <div class="col-4 text-left">
                                <b>Project Manager </b>
                            </div>
                            <div class="col-8">
                                : {{$kel->pm}}
                            </div>
                            <div class="col-4 text-left">
                                <b>Status Kelompok </b>
                            </div>
                            <div class="col-8">
                                : {{$kel->statusKelompok}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

        </div>

    @endif


@endsection
