@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Kelompok Proyek</h1>
    </div>

    <div class="row">
        <div class="col-10 offset-1 mb-4">
            <div class="col-md-12">
                <div class="card shadow mb-4">


                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Kelompok</h6>
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
                                    <th>Judul Proyek</th>
                                    <th>Dosen pembimbing</th>
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
                                            {{$kel->dosen_id}}
                                        @endif

                                        </td>
                                        <td>{{$kel->statusKelompok}}</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="/kelompok/detail/{{$kel->id_kelompokProyek}}">
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
