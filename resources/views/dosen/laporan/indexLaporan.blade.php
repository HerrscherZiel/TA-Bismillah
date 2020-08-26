@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Laporan Kelompok</h1>
    </div>

    <div class="col-12">
        <div class="row text-center">
            <div class="col-1">
                <a href="/dosen/laporan">
                <i class="fa fa-lg fa-arrow-left" aria-hidden="true" style="transform: scale(2.1,1.5);"></i></a>
                <br>
                <br>
            </div>
        </div>
    </div>

    <div>
        <div class="row list">
            <div class="col-md-6">
                <div class="card shadow mb-4">

                @foreach($kelompok as $kel)
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">
                                    {{$kel->judulPrioritas}}
                                </h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <a href="/dosen/laporan/kelompok/index-laporan/{{$kel->id_kelompokProyek}}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row" style="color:black;">
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
                                @foreach($dosen as $dos)
                                    @if($dos->id_dosen == $kel->dosen_id)
                                        {{$dos->namaDosen}}
                                    @endif
                                @endforeach
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
                @endforeach


                </div>
            </div>
        </div>
    </div>


@endsection
