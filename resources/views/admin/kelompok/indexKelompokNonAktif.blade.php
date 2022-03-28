@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">List Kelompok Proyek Selesai</h1>
    </div>

    <div class="col-12">
        <div class="row text-center">
            <div class="col-1">
                <a href="/admin/kelompokproyek">
                <i class="fa fa-lg fa-arrow-left" aria-hidden="true" style="transform: scale(2.1,1.5);"></i></a>
                <br>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-10 col-md-12 col-sm-12 mb-4">
            <div class="col-md-12">
                <div class="card shadow mb-4">


                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-lg-4 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Kelompok</h6>
                            </div>
                            <div class="col-lg-8 my-auto text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary text-center" ><a href="/admin/kelompok/index/{{$id_kls}}/{{$id_per}}" style="color: white;">Menunggu Persetujuan</a></button>
                                    <button type="button" class="btn btn-success text-center" ><a href="/admin/kelompok/index-aktif/{{$id_kls}}/{{$id_per}}" style="color: white;">Aktif</a></button>
                                    <button type="button" class="btn btn-secondary text-center" ><a href="/admin/kelompok/index-nonaktif/{{$id_kls}}/{{$id_per}}" style="color: white;">Selesai</a></button>
                                </div>                            
                            </div>
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
                                    <th>Pembimbing</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kelompok as $kel)
                                    <tr>
                                        <td>{{$kel->namaKelasProyek}}</td>
                                        <td>{{$kel->semester}} | {{$kel->tahunAjaran}}</td>
                                        <td>{{$kel->pm}}</td>
                                        <td>{{$kel->judulPrioritas}}</td>
                                        <td>
                                        @if($kel->dosen_id == null)
                                            Belum ada dosen pembimbing
                                        @else
                                            @foreach($dosen as $dos)
                                                @if($dos->id_dosen == $kel->dosen_id)
                                                {{$dos->namaDosen}}
                                                @endif
                                            @endforeach
                                        @endif

                                        </td>
                                        <td><span class="badge badge-pill badge-secondary">@if($kel->statusKelompok == "Non Aktif")
                                                                                                Selesai
                                                                                                @endif</span></td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-primary" title="Detail" href="/admin/kelompok/detail/{{$kel->id_kelompokProyek}}">
                                                        <i class="fa fa-lg fa-eye">
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

@endsection
