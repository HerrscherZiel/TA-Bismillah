@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Kelompok Proyek</h1>
    </div>

    <div>
        <div class="row justify-content-md-center">
            <div class="col-lg-10 col-md-12 col-sm-12">
                <div class="row">

                @php $i=1;  @endphp
                @if(count($kelasperiode) > 0)
                @foreach($kelasperiode as $kelper)
                    <div class="col-md-6">
                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-lg-8 col-sm-4 my-auto">
                                        <h6 class="font-weight-bold text-primary m-0">{{$kelper->namaKelasProyek}}</h6>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 my-auto text-right">
                                            <button type="button" class="btn btn-primary text-center" ><a href="/admin/kelompok/index/{{$kelper->id_kelasProyek}}/{{$kelper->id_periode}}" style="color: white;">
                                                Detail
                                            </a></button>
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
                            <h5>Belum ada ajuan kelompok proyek</h5>
                        </div>
                    </div>
                </div>
                @endif

                </div>
            </div>
        </div>
    </div>

@endsection
