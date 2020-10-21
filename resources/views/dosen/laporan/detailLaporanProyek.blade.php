@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Laporan</h1>
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

                                    <div class="row text-center">
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
                                            </div>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Pencapaian</th>
                                                        <th>Keterangan</th>
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
                                                        </tr>
                                                    @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan=2>Tidak ada pencapaian </td>
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
                                            </div>
                                        </div>

                                        <div class="row text-center">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Agenda</th>
                                                        <th>Keterangan</th>
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
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan=2> Tidak ada agenda selanjutnya </td>
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
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan=4> Tidak ada milestone </td>
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
                                            </div>
                                        </div>

                                        <div class="row text-center ">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered mx-auto" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Nama Lampiran</th>
                                                        <th>Foto</th>
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
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan=2> Tidak ada lampiran </td>
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

            <div class="modal fade bd-modal-lg" id="showLampiran" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            <div class="modal-body">
                                <div class="tile-body">
                                    <div class="row">
                                        <div class="col-md-12"><b></b>
                                                    @foreach($lampiran as $lamp)
                                                        <img src="{{asset('data_upload/'.$lamp->fileLampiran)}}" id="id" style="width:500px;">
                                                    @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>

                    </div>
                </div>
            </div>

            @push('scripts')
            <script>
            $('#showLampiran').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
            })
            </script>
            @endpush

@endsection
