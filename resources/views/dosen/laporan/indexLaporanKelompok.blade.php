@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">List Laporan Kelompok</h1>
    </div>

    <div class="col-12">
        <div class="row text-center">
            <div class="col-1">
                <a href="{{ url()->previous() }}">
                <i class="fa fa-lg fa-arrow-left" aria-hidden="true" style="transform: scale(2.1,1.5);"></i></a>
                <br>
                <br>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-md-center">
        <div class="col-lg-10 col-sm-12 mb-4">
            <div class="col-md-12">
                <div class="card shadow mb-4">


                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">
                                    @php $i=1; @endphp
                                        @foreach($laporan as $lap)
                                        @if($i==1)
                                            {{$lap->judulPrioritas}}
                                            @php $i++; @endphp
                                        @endif
                                        @endforeach
                                </h6>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="table-test" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($laporan as $lap)
                                    <tr>
                                    <td>{{ \Carbon\Carbon::parse($lap->tglMulai)->translatedFormat('d F Y')}}</td>
                                    <td>{{ \Carbon\Carbon::parse($lap->tglSelesai)->translatedFormat('d F Y')}}</td>
                                    <td>{{ \Carbon\Carbon::parse($lap->tglKirim)->translatedFormat('d F Y')}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary" title="Detail" href="/dosen/laporan/kelompok/detail-laporan/{{$lap->id_laporan}}">
                                                    <i class="fa fa-lg fa-eye">
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
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

    <!-- Modal Tambah Laporan -->
    <div class="modal fade bd-modal-lg" id="tambahLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Laporan Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form method="post" action="{{ route('laporan.store')}}" enctype="multipart/form-data">
                            @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            

                            <div class="row">
                                <div class="col-md-12"><b>Tanggal Mulai :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglMulai" placeholder="Tanggal Mulai Laporan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Tanggal Selesai :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglSelesai" placeholder="Tanggal Selesai Laporan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Tanggal Kirim :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglKirim" placeholder="Tanggal Kirim Laporan">
                                    </div>
                                </div>
                            </div>
                            @foreach($laporan as $lap)
                                <input type="hidden"  type="text" name="kelompokProyek_id" value="{{$lap->id_kelompokProyek}}">
                            @endforeach
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary">Tambah</button>
                    </div>
                
                </form>

            </div>
        </div>
    </div>

@endsection
