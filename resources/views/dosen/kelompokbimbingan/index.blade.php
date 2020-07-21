@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Kelompok Bimbingan</h1>
    </div>

    <div>
        <div class="row list">

            <div class="col-10 offset-1">
                <div class="row">

                @php $i=1;  @endphp
                @if(count($kelasperiode) > 0)
                @foreach($kelasperiode as $kelper)
                    <div class="col-md-6">
                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-md-8 my-auto">
                                        <h6 class="font-weight-bold text-primary m-0">{{$kelper->namaKelasProyek}}</h6>
                                    </div>
                                    <div class="col-md-4 text-primary text-right">
                                        <a type="button" class="btn btn-primary" href="/dosen/kelompok-bimbingan/{{$kelper->id_kelasProyek}}/{{$kelper->id_periode}}">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-4 text-left">
                                        Semester
                                    </div>

                                    <div class="col-8 text-left">
                                        : {{$kelper->semester}}
                                    </div>

                                    <div class="col-4 text-left">
                                        Tahun Ajaran
                                    </div>

                                    <div class="col-8 text-left">
                                        : {{$kelper->tahunAjaran}}
                                    </div>
                                  
                                </div>
                            </div>

                        </div>
                    </div>

                @php $i++; @endphp
                
                @endforeach
                @else
                <div class="card-body">
                    <div class="col-12 text-center">
                        <div class="card-body" style="background-color:#EAECF4; border-radius:6px;">
                            <h5>Belum ada kelompok bimbingan</h5>
                        </div>
                    </div>
                </div>
                @endif

                </div>
            </div>
        </div>
    </div>

@endsection
