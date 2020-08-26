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
        <h1 class="h3 mb-0 text-gray-800">Detail Laporan</h1>
    </div>

    <div class="col-12">
        <div class="row text-center">
            <div class="col-1">
                <a href="javascript:window.history.back();">
                <i class="fa fa-lg fa-arrow-left" aria-hidden="true" style="transform: scale(2.1,1.5);"></i></a>
                <br>
                <br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-10 offset-1 mb-4">
            <div class="card shadow mb-4">
            
                <div class="card-header py-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="m-0 font-weight-bold text-primary">
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
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <section class="invoice" style="color: black;">

                                    <div class="row invoice-info mb-2">
                                        <div class="col-md-12" >
                                            <div class="row">
                                            @foreach($laporan as $lap)
                                                <div class="col-md-3 text-left">
                                                    <b>Judul</b>
                                                </div>
                                                <div class="col-md-8 ml-3">
                                                    : {{$lap->judulPrioritas}}
                                                </div>
                                                <hr>
                                                <div class="col-md-3 text-left">
                                                    <b>Pembimbing</b>
                                                </div>
                                                <div class="col-md-8 ml-3">
                                            :   @if($lap->dosen_id == null)
                                                        Belum ada pembimbing
                                                @else
                                                    @foreach($dosen as $dos)
                                                        @if($dos->id_dosen == $lap->dosen_id)
                                                            {{$dos->namaDosen}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                                </div>
                                                <hr>
                                                <div class="col-md-3 text-left">
                                                    <b>Project Manager</b>
                                                </div>
                                                <div class="col-md-8 ml-3">
                                                   : {{$lap->pm}}<br>
                                                </div>
                                            @endforeach
                                            <hr>

                                            <div class="col-md-3 text-left">
                                                <b>Laporan :</b>
                                            </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-bordered" id="sampleTable">
                                                <thead>
                                                <tr>
                                                    <th>Tanggal Mulai</th>
                                                    <th>Tanggal Selesai</th>
                                                    <th>Tanggal Kirim</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($laporan as $lap)
                                                        <tr>
                                                        <td>{{ \Carbon\Carbon::parse($lap->tglMulai)->translatedFormat('d F Y')}}</td>
                                                        <td>{{ \Carbon\Carbon::parse($lap->tglSelesai)->translatedFormat('d F Y')}}</td>
                                                        <td>{{ \Carbon\Carbon::parse($lap->tglKirim)->translatedFormat('d F Y')}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <b> Pencapaian : </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body col-12">
                                        <div class="card-header py-3">
                                            <div class="row">
                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Pencapaian</h6>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPencapaian">Tambah</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Pencapaian</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(count($pencapaian) > 0)
                                                    @foreach($pencapaian as $pen)
                                                        <tr>
                                                            <td>{{$pen->pencapaian}}</td>
                                                            <td>
                                                                {{$pen->deskripsi}}
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button class="btn btn-success"
                                                                        data-idpen="{{$pen->id_pencapaian}}"
                                                                        data-pencapaian="{{$pen->pencapaian}}"
                                                                        data-deskripsi="{{$pen->deskripsi}}"
                                                                        data-toggle="modal" data-target="#editPencapaian">
                                                                        <i class="fa fa-lg fa-edit">
                                                                        </i>
                                                                    </button>
                                                                    <form class="delete" action="{{ route('pencapaian.destroy', $pen->id_pencapaian)}}" method="post">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm('Apakah anda yakin ?')" style="margin-left: -2px">
                                                                            <i class="fa fa-lg fa-trash">
                                                                            </i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan=3> Belum ada pencapaian </td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <b> Agenda Selanjutnya : </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body col-12">
                                        <div class="card-header py-3">
                                            <div class="row">
                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Agenda Selanjutnya</h6>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahAgenda">Tambah</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Agenda</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(count($agenda) > 0)
                                                    @foreach($agenda as $agen)
                                                    <tr>
                                                        <td>{{$agen->agendaSelanjutnya}}</td>
                                                        <td>
                                                            {{$agen->deskripsi}}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-success"
                                                                    data-idagen="{{$agen->id_agendaSelanjutnya}}"
                                                                    data-agenda="{{$agen->agendaSelanjutnya}}"
                                                                    data-deskripsi="{{$agen->deskripsi}}"
                                                                    data-toggle="modal" data-target="#editAgenda">
                                                                    <i class="fa fa-lg fa-edit">
                                                                    </i>
                                                                </button>
                                                                <form class="delete" action="{{ route('agendaselanjutnya.destroy', $agen->id_agendaSelanjutnya)}}" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm('Apakah anda yakin ?')" style="margin-left: -2px">
                                                                        <i class="fa fa-lg fa-trash">
                                                                        </i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan=3> Belum ada agenda selanjutnya </td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <b> Milestone : </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body col-12">

                                        <div class="card-header py-3">
                                            <div class="row">
                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Milestone</h6>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMilestone">Tambah</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Milestone</th>
                                                        <th>Status</th>
                                                        <th>Target Selesai</th>
                                                        <th>Perkiraan Selesai</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(count($milestone) > 0)
                                                    @foreach($milestone as $mi)
                                                    <tr>
                                                        <td>{{$mi->milestone}}</td>
                                                        <td>{{$mi->statusMilestone}}</td>
                                                        <td>{{ \Carbon\Carbon::parse($mi->tglTarget)->translatedFormat('d F Y')}}</td>
                                                        <td>{{ \Carbon\Carbon::parse($mi->tglPerkiraan)->translatedFormat('d F Y')}}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-success"
                                                                    data-idmile="{{$mi->id_milestone}}"
                                                                    data-milestone="{{$mi->milestone}}"
                                                                    data-status="{{$mi->statusMilestone}}"
                                                                    data-tgltarget="{{$mi->tglTarget}}"
                                                                    data-perkiraan="{{$mi->tglPerkiraan}}"
                                                                    data-toggle="modal" data-target="#editm">
                                                                    <i class="fa fa-lg fa-edit">
                                                                    </i>
                                                                </button>
                                                                <form class="delete" action="{{ route('milestone.destroy', $mi->id_milestone)}}" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm('Apakah anda yakin ?')" style="margin-left: -2px">
                                                                        <i class="fa fa-lg fa-trash">
                                                                        </i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan=5> Belum ada milestone </td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <b> Lampiran : </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body col-12">

                                        <div class="card-header py-3">
                                            <div class="row">
                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Lampiran</h6>
                                                </div>
                                                <div class="col-md-4 text-right">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahLampiran">Tambah</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row text-center ">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered mx-auto" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Nama Lampiran</th>
                                                        <th>Foto</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(count($lampiran) > 0)
                                                    @foreach($lampiran as $lamp)
                                                    <tr>
                                                        <td>{{$lamp->lampiran}}</td>
                                                        <td>
                                                            <img src="{{asset('data_upload/'.$lamp->fileLampiran)}}" style="width:900px;">
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <form class="delete" action="{{ route('lampiran.destroy', $lamp->id_lampiran)}}" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm('Apakah anda yakin ?')" style="margin-left: -2px">
                                                                        <i class="fa fa-lg fa-trash">
                                                                        </i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan=3> Belum ada lampiran </td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </section>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal Tambah Pencapaian -->
    <div class="modal fade bd-modal-lg insert" id="tambahPencapaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pencapaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('pencapaian.store')}}" enctype="multipart/form-data">
                                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                        @foreach($laporan as $lap)
                            <input type="hidden" name="laporan_id" value="{{$lap->id_laporan}}">
                        @endforeach
                            <div class="row">
                                <div class="col-md-12"><b>Pencapaian :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="pencapaian" placeholder="Membuat...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Deskripsi :</b>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Pencapaian"></textarea>
                                    </div>
                                </div>
                            </div>
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

    <!-- Modal Update Pencapaian-->
    <div class="modal fade bd-modal-lg" id="editPencapaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Pencapaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('pencapaian.update', 'edit')}}" 
                enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <input type="hidden" name="id_pencapaian" id="idpen">
                            <div class="row">
                                <div class="col-md-12"><b>Pencapaian :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="pencapaian" id="pencapaian">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Deskripsi :</b>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" name="deskripsi" id="deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Insert Agenda -->
    <div class="modal fade bd-modal-lg insert" id="tambahAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('agendaselanjutnya.store')}}" enctype="multipart/form-data">
                                    @csrf
                <div class="modal-body">
                    <div class="tile-body">
                        @foreach($laporan as $lap)
                            <input type="hidden" name="laporan_id" value="{{$lap->id_laporan}}">
                        @endforeach
                        <div class="row">
                            <div class="col-md-12"><b>Agenda :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="agendaSelanjutnya" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Deskripsi :</b>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi agenda selanjutnya"></textarea>
                                </div>
                            </div>
                        </div>
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

    <!-- Modal Update Agenda -->
    <div class="modal fade bd-modal-lg" id="editAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Agenda Selanjutnya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('agendaselanjutnya.update', 'edit')}}" 
                enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                <div class="modal-body">
                    <div class="tile-body">
                    <input type="hidden" name="id_agendaSelanjutnya" id="idagen">
                        <div class="row">
                            <div class="col-md-12"><b>Agenda Selanjutnya :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="agendaSelanjutnya" id="agenda">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Deskripsi :</b>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="deskripsi" id="deskripsi"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Insert Milestone -->
    <div class="modal fade bd-modal-lg insert" id="tambahMilestone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Milestone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('milestone.store')}}" enctype="multipart/form-data">
                                    @csrf
                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12"><b>Milestone :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="milestone" placeholder="Wireframe, Desain dll....">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Status Milestone :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="statusMilestone" placeholder="x%">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Target Selesai :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tglTarget" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Tanggal Perkiraan Selesai :</b>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="tglPerkiraan" placeholder="Membuat...">
                                </div>
                            </div>
                        </div>
                        @foreach($laporan as $lap)
                            <input type="hidden" name="laporan_id" value="{{$lap->id_laporan}}">
                        @endforeach

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

    <!-- Modal Update Milestone -->
    <div class="modal fade bd-modal-lg" id="editm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Milestone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('milestone.update', 'edit')}}" 
                enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                        <input type="hidden" name="id_milestone" id="idmile">
                            <div class="row">
                                <div class="col-md-12"><b>Milestone :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="milestone" id="milestone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Status Milestone :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="statusMilestone" id="status">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Target Selesai :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglTarget" id="tgltarget">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Tanggal Perkiraan Selesai :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglPerkiraan" id="perkiraan">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Modal Tambah Lampiran -->
    <div class="modal fade bd-modal-lg insert" id="tambahLampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Lampiran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('lampiran.store')}}" enctype="multipart/form-data">
                                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                        @foreach($laporan as $lap)
                            <input type="hidden" name="laporan_id" value="{{$lap->id_laporan}}">
                        @endforeach
                            <div class="row">
                                <div class="col-md-12"><b>Nama Lampiran :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="lampiran" placeholder="Membuat...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Lampiran :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="file" name="fileLampiran" lang="ina">
                                    </div>
                                </div>
                            </div>
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


    @push('scripts')
         <script>


            $('#editPencapaian').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var idpen = button.data('idpen')
                var pencapaian = button.data('pencapaian')
                var deskripsi = button.data('deskripsi')


                var modal = $(this)
                modal.find('.modal-body #idpen').val(idpen)
                modal.find('.modal-body #pencapaian').val(pencapaian)
                modal.find('.modal-body #deskripsi').val(deskripsi)

            });

            $('#editAgenda').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var idagen = button.data('idagen')
                var agenda = button.data('agenda')
                var deskripsi = button.data('deskripsi')


                var modal = $(this)
                modal.find('.modal-body #idagen').val(idagen)
                modal.find('.modal-body #agenda').val(agenda)
                modal.find('.modal-body #deskripsi').val(deskripsi)

                });

            $('#editm').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var idmile = button.data('idmile')
                var milestone = button.data('milestone')
                var status = button.data('status')
                var tgltarget = button.data('tgltarget')
                var perkiraan = button.data('perkiraan')


                var modal = $(this)
                modal.find('.modal-body #idmile').val(idmile)
                modal.find('.modal-body #milestone').val(milestone)
                modal.find('.modal-body #status').val(status)
                modal.find('.modal-body #tgltarget').val(tgltarget)
                modal.find('.modal-body #perkiraan').val(perkiraan)

                });

        </script>
    @endpush
@endsection
