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
        <h1 class="h3 mb-0 text-gray-800">Detail Proyek</h1>
    </div>

    <div class="col-12">
        <div class="row text-center">
            <div class="col-1">
                <a href="{{Route('proyek.detail.index', ['idkel' => $idkelpro, 'idper' => $idper])}}">
                <i class="fa fa-lg fa-arrow-left" aria-hidden="true" style="transform: scale(2.1,1.5);"></i></a>
                <br>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-10 col-md-12 col-sm-12 mb-4">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8 my-auto primary">
                            @foreach($proyek as $pro)
                                Proyek {{$pro->judul}}
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="color:black">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <div class="row invoice-info mb-2">
                                    <div class="col-md-12">
                                        <div class="row">
                                        @foreach($proyek as $pro)
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-12 text-left">
                                                        <b> Kelas Proyek</b>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        : {{$pro->namaKelasProyek}}
                                                    </div>
                                                    <hr>
                                                    <div class="col-lg-2 col-sm-12 text-left">
                                                        <b> Periode</b>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        : {{$pro->semester}} | {{$pro->tahunAjaran}}
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                            <b> Judul</b>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                : 
                                                {{$pro->judul}}
                                            </div>
                                            <hr>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                                <b> Status Proyek</b>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                : {{$pro->statusProyek}}<br>
                                            </div>
                                            <hr>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                            <b> Deskripsi Proyek</b>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                : 
                                                {{$pro->desProyek}}
                                            </div>


                                            @endforeach    
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="col-md-3 text-left">
                                        <b>Kelompok Pemilih Proyek</b> : 
                                    </div>

                                    <div class="card-body col-12 text-center">

                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center" id="test">
                                                    <thead>
                                                    <tr>
                                                        <th>Project Manager</th>
                                                        <th>Prioritas</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(count($kelompok) >0)
                                                    @foreach($kelompok as $kel)
                                                    <tr>
                                                        <td>{{$kel->pm}}</td>
                                                        <td>{{$kel->prioritas}}</td>
                                                        <td>@if($kel->judulPrioritas === $kel->judul)
                                                            <span class="badge badge-pill badge-primary">Mengambil Proyek ini</span>
                                                            @elseif($kel->judulPrioritas != $kel->judul && $kel->judulPrioritas != "Belum ada judul")
                                                            <span class="badge badge-pill badge-secondary">Sudah ada proyek</span>
                                                            @else
                                                            <span class="badge badge-pill badge-success">{{$kel->judulPrioritas}}</span>
                                                            @endif
                                                       </td>
                                                        <td>
                                                        @if($kel->statusProyek != "Aktif" && $kel->judulPrioritas === "Belum ada judul")
                                                        <button class="btn btn-success"
                                                            data-idkel="{{$kel->id_kelompokProyek}}"
                                                            data-pm="{{$kel->pm}}"
                                                            data-judul="{{$kel->judul}}"
                                                            data-idpro="{{$kel->id_proyek}}"
                                                            data-statuskel="{{$kel->statusKelompok}}"
                                                            data-iddos="{{$kel->idDos}}"
                                                            data-judulprio="{{$kel->judulPrioritas}}"
                                                            data-toggle="modal" data-target="#kelompokPemilih">
                                                        <i class="fa fa-lg fa-check">
                                                        </i>
                                                        </button>
                                                        @endif
                                                        <a type="button" class="btn btn-primary" href="/admin/kelompok/detail/{{$kel->id_kelompokProyek}}">
                                                            <i class="fa fa-lg fa-eye">
                                                            </i>
                                                        </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan=4> Belum ada kelompok yang memilih proyek</td>
                                                    </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal Pilih Judul -->
    <div class="modal fade bd-modal-lg" id="kelompokPemilih" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Pilih Kelompok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('admin.kelompok.proyek.update', 'edit')}}" 
                                            enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                        <div class="mx-auto">
                            Apakah anda yakin memilih kelompok ini ?
                        </div>
                        </div>
                            <input type="hidden" name="id_kelompokProyek" id="idkel">
                            <input type="hidden" name="id_proyek" id="idpro">
                            <input type="hidden" name="judul" id="judul">
                            <input type="hidden" name="judulPrioritas" id="judulprio">
                    </div>
                </div>

                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Pilih</button>
                </div>
                    </form>


            </div>
        </div>
    </div>

    @push('scripts')
        <script>

            $('#kelompokPemilih').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var idkel = button.data('idkel')
                var pm = button.data('pm')
                var idpro = button.data('idpro')
                var judul = button.data('judul')
                var statuskel = button.data('statuskel')
                var iddos = button.data('iddos')
                var judulprio = button.data('judulprio')

                var modal = $(this)
                modal.find('.modal-body #idkel').val(idkel)
                modal.find('.modal-body #pm').val(pm)
                modal.find('.modal-body #judul').val(judul)
                modal.find('.modal-body #idpro').val(idpro)
                modal.find('.modal-body #iddos').val(iddos)
                modal.find('.modal-body #statuskel').val(statuskel)
                modal.find('.modal-body #judulprio').val(judulprio)
            })

        </script>
  
    @endpush

@endsection
