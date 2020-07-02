@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Usul Proyek</h1>
    </div>

    <div>
        <div class="row list">
            <div class="col-10 offset-1 text-right">
            Search
            </div>
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
                                        <a type="button" class="btn btn-primary" href="/usul/detail/{{$kelper->id_kelasProyek}}/{{$kelper->id_periode}}">
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
                            <h5>Belum ada undangan kelompok proyek</h5>
                        </div>
                    </div>
                </div>
                @endif

                </div>
            </div>
        </div>
    </div>

            <!-- Modal Update -->
            <div class="modal fade bd-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Usul Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="tile-body">
                                <div class="row">
                                    <div class="col-md-12"><b>Pilih Kelas Proyek</b>
                                        <div class="form-group">
                                            <select class="form-control" readonly>
                                                <option>SIM</option>
                                                <option>Proyek Aplikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Pilih Periode</b>
                                        <div class="form-group">
                                            <select class="form-control" readonly>
                                                <option>2019</option>
                                                <option>2018</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Judul Proyek :</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="judulProyek" placeholder="Nama Kelas Proyek" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Deskripsi Proyek :</b>
                                        <div class="form-group">
                                            <textarea readonly="readonly" class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Kelas Proyek"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Status :</b>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Diterima</option>
                                                <option>Ditolak</option>
                                                <option>Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

@endsection
