@extends('layouts.master')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Proyek</h1>
    </div>

    <div>
        <div class="row justify-content-md-center">
            <div class="col-lg-10 col-md-12 col-sm-12 text-right" style="margin-bottom:10px">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Tambah</button>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12">
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
                                        <a type="button" class="btn btn-primary" href="/admin/proyek/belum-diambil/{{$kelper->id_kelasProyek}}/{{$kelper->id_periode}}">
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
                            <h5>Belum ada proyek</h5>
                        </div>
                    </div>
                </div>
                @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Insert -->
    <div class="modal fade bd-modal-lg insert" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="post" action="{{ route('proyek.store')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-body">
                            <div class="tile-body">
                                <div class="row">
                                    <div class="col-md-12"><b>Pilih Kelas Proyek</b>
                                        <div class="form-group">
                                            <select class="form-control selectbox" name="kelasProyek_id" style="width: 100%" required>
                                                @foreach($kelasproyek as $kelPro)
                                                <option value="{{$kelPro -> id_kelasProyek}}">{{$kelPro -> namaKelasProyek}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Pilih Periode</b>
                                        <div class="form-group">
                                            <select class="form-control selectbox"  name="periode_id" style="width: 100%" required>
                                                @foreach($periode as $per)
                                                <option value="{{$per -> id_periode}}">{{$per -> tahunAjaran}} | {{$per -> semester}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Judul</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="judul" placeholder="Judul Proyek" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Deskripsi Proyek :</b>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Proyek"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="statusProyek" value="Belum Diambil">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>

@endsection
