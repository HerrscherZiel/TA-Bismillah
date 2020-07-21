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
        <h1 class="h3 mb-0 text-gray-800">Detail Kelompok Proyek</h1>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-10 col-md-12 col-sm-12 mb-4">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                            @foreach($kelompok as $kel)
                                @if($kel->judulPrioritas == "Belum ada judul")
                                Kelompok Proyek
                                @else
                                Kelompok {{$kel->judulPrioritas}}
                                @endif
                            @endforeach
                            </div>

                            <div class="col-md-4 text-right">
                                <div class="btn-group">
                                    @foreach($kelompok as $kel)                                                           
                                        <button class="btn btn-success"
                                                data-idkel="{{$kel->id_kelompokProyek}}"
                                                data-stat="{{$kel->statusKelompok}}"
                                                data-idos="{{$kel->dosen_id}}"
                                                data-toggle="modal" data-target="#updateKelompok">
                                                Ubah Kelompok
                                        </button>
                                    @endforeach
                                </div>
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
                                        @foreach($kelompok as $kel)
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-12 text-left">
                                                        <b> Kelas Proyek</b>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        : {{$kel->namaKelasProyek}}
                                                    </div>
                                                    <hr>
                                                    <div class="col-lg-2 col-sm-12 text-left">
                                                        <b> Periode</b>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12">
                                                        : {{$kel->semester}} | {{$kel->tahunAjaran}}
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                            <b> Judul</b>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                : 
                                                @if($kel->judulPrioritas == null)
                                                    Belum ada judul
                                                @else
                                                    {{$kel->judulPrioritas}}
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                            <b> Pembimbing</b>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                : 
                                                @if($kel->dosen_id == null)
                                                    Belum ada Pembimbing
                                                @else
                                                    @foreach($dosen as $dos)
                                                        @if($kel->dosen_id == $dos->id_dosen)
                                                            {{$dos->namaDosen}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                            <hr>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                                <b> Project Manager</b>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                : {{$kel->pm}}<br>
                                            </div>
                                            <hr>
                                            <div class="col-lg-2 col-sm-12 text-left">
                                                <b>Status</b>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                : {{$kel->statusKelompok}}
                                            </div>

                                            @endforeach    
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="col-md-3 text-left">
                                        <b>Anggota Kelompok</b> : 
                                    </div>

                                    <div class="card-body col-12 text-center">

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Nama Anggota</th>
                                                        <th>NIM</th>
                                                        <th>Status Anggota</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($anggota as $ang)
                                                    <tr>
                                                        <td>{{$ang->namaMahasiswa}}</td>
                                                        <td>{{$ang->nim}}</td>
                                                        <td>
                                                            {{$ang->statusAnggota}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <b>Judul Pilihan :</b>
                                            </div>
                                            <div class="col-9 text-right">
                                            @foreach($kelompok as $kel)
                                                <button class="btn btn-primary"
                                                        data-idkls="{{$kel->id_kelasProyek}}"
                                                        data-idper="{{$kel->id_periode}}"
                                                        data-idkel="{{$kel->id_kelompokProyek}}"
                                                        data-toggle="modal" data-target="#pilihJudulLain">
                                                    Pilih Judul Lain
                                                </button>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body col-12">

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered text-center" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Judul</th>
                                                        <th>Keterangan</th>
                                                        <th>Prioritas</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                @foreach($judulPilihan as $jud)
                                                    <tr>
                                                        <td>{{$jud->judul}}</td>
                                                        <td>
                                                            <p>{{$jud->deskripsi}}</p>
                                                        </td>
                                                        <td>{{$jud->prioritas}}</td>
                                                        <td>
                                                        @foreach($ambiljudul as $amb)
                                                            @if($amb->judulPrioritas != $jud->judul && $jud->statusProyek != "Aktif")
                                                                <button class="btn btn-success"
                                                                        data-judul="{{$jud->judul}}"
                                                                        data-idkel="{{$jud->id_kelompokProyek}}"
                                                                        data-idpro="{{$jud->id_proyek}}"
                                                                        data-judulprio="{{$jud->judulPrioritas}}"
                                                                        data-toggle="modal" data-target="#pilihJudul">
                                                                    Pilih
                                                                </button>
                                                            @elseif($amb->judulPrioritas != $jud->judul && $jud->statusProyek == "Aktif" )
                                                                <button class="btn btn-secondary" disabled>
                                                                    Terpilih
                                                                </button>
                                                            @else
                                                                <button class="btn btn-secondary" disabled>
                                                                    Dipilih
                                                                </button>
                                                            @endif
                                                        @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                    <tr>
                                                @if(count($usul) > 0)
                                                    @foreach($usul as $us)
                                                        <td>{{$us->judulUsul}} <br>
                                                            ({{$us->statusUsul}})</td>
                                                        <td>{{$us->usDesk}}</td>
                                                        <td>Usul</td>
                                                        <td>
                                                        @if($us->statusUsul == "Diterima")
                                                            @foreach($ambiljudul as $amb)
                                                                @if($amb->judulPrioritas != $us->judulUsul)
                                                                    <button class="btn btn-success"
                                                                            data-judulusul="{{$us->judulUsul}}"
                                                                            data-idkel="{{$us->id_kelompokProyek}}"
                                                                            data-idus="{{$us->id_usulMahasiswa}}"
                                                                            data-judulprio="{{$us->judulPrioritas}}"
                                                                            data-toggle="modal" data-target="#pilihUsul">
                                                                        Pilih
                                                                    </button>
                                                                    @elseif($amb->judulPrioritas != $jud->judul && $jud->statusProyek == "Aktif" )
                                                                        <button class="btn btn-secondary" disabled>
                                                                            Terpilih
                                                                        </button>
                                                                    @else
                                                                        <button class="btn btn-secondary" disabled>
                                                                            Dipilih
                                                                        </button>
                                                                    @endif
                                                            @endforeach
                                                        @else
                                                            @foreach($ambiljudul as $amb)
                                                                @php $setujuiusul = "ya"; @endphp
                                                                <button class="btn btn-success"
                                                                        data-judulusul="{{$us->judulUsul}}"
                                                                        data-deskripsi="{{$us->usDesk}}"
                                                                        data-idkel="{{$us->id_kelompokProyek}}"
                                                                        data-idus="{{$us->id_usulMahasiswa}}"
                                                                        data-idkls="{{$us->id_kelasProyek}}"
                                                                        data-judulprio="{{$us->judulPrioritas}}"
                                                                        data-idper="{{$us->id_periode}}"
                                                                        data-deskripsi="{{$us->usDesk}}"
                                                                        data-toggle="modal" data-target="#setujuiPilihUsul">
                                                                    Pilih
                                                                </button>
                                                            @endforeach
                                                        @endif
                                                        </td>
                                                    @endforeach
                                                @endif
                                                    </tr>

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


    <!-- Modal Update -->
    <div class="modal fade bd-modal-lg" id="updateKelompok" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kelompok</h5>
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
                                <div class="col-md-12"><b>Dosen Pembimbing :</b>
                                    <div class="form-group">
                                        <select class="form-control selectbox" name="dosen_id" id="idos" required="" style="width: 100%">
                                            @foreach($dosen as $dos)
                                                <option value="{{$dos->id_dosen}}">{{$dos->namaDosen}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Status Kelompok:</b>
                                    <div class="form-group">
                                        <select class="form-control selectbox" name="statusKelompok" id="stat" required="" style="width: 100%">
                                                @php $i = 1; @endphp
                                                @foreach($kelompok as $kel)
                                                    @if($i == 1)
                                                    <option value="{{$kel->statusKelompok}}">{{$kel->statusKelompok}}</option>
                                                    @endif
                                                    @php $i++ @endphp
                                                @endforeach
                                                <option value="Menunggu Persetujuan">Menunggu Persetujuan</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Non Aktif">Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_kelompokProyek" id="idkel">
                            <input type="hidden" name="dosen" value="ya">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary">Simpan</button>
                    </div>
                
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Pilih Judul -->
    <div class="modal fade bd-modal-lg" id="pilihJudul" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Pilih Judul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="mx-auto">
                            Apakah anda yakin memilih judul ini ?
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 offset-3">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                            <div class="col-3">
                                <form method="post" action="{{ route('admin.kelompok.proyek.update', 'edit')}}" 
                                            enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                                    <input type="hidden" name="id_kelompokProyek" id="idkel">
                                    <input type="hidden" name="id_proyek" id="idpro">
                                    <input type="hidden" name="judul" id="judul">
                                    <input type="hidden" name="judulPrioritas" id="judulprio">
                                <button type="sumbit" class="btn btn-primary">Pilih</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Pilih Usul -->
    <div class="modal fade bd-modal-lg" id="pilihUsul" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Pilih Usul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="mx-auto">
                            Apakah anda yakin memilih judul ini ?
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 offset-3">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                            <div class="col-3">
                                <form method="post" action="{{ route('admin.kelompok.proyek.update', 'edit')}}" 
                                            enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                                    <input type="hidden" name="id_kelompokProyek" id="idkel">
                                    <input type="hidden" name="id_usulMahasiswa" id="idus">
                                    <input type="hidden" name="judulUsul" id="judulusul">
                                    <input type="hidden" name="judulPrioritas" id="judulprio">
                                <button type="sumbit" class="btn btn-primary">Pilih</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Setujui Usul -->
    <div class="modal fade bd-modal-lg" id="setujuiPilihUsul" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Pilih Usul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="mx-auto">
                            Apakah anda yakin setujui dan pilih judul ini ?
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 offset-3">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                            <div class="col-3">
                                <form method="post" action="{{ route('admin.kelompok.proyek.update', 'edit')}}" 
                                            enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                                    <input type="hidden" name="id_kelompokProyek" id="idkel">
                                    <input type="hidden" name="id_usulMahasiswa" id="idus">
                                    <input type="hidden" name="id_kelasProyek" id="idkls">
                                    <input type="hidden" name="setujuiUsul" value="ya">
                                    <input type="hidden" name="deskripsi" id="deskripsi">
                                    <input type="hidden" name="id_periode" id="idper">
                                    <input type="hidden" name="judulUsul" id="judulusul">
                                    <input type="hidden" name="judulPrioritas" id="judulprio">
                                <button type="sumbit" class="btn btn-primary">Pilih</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   <!-- Modal Plih Judul Lain -->
   <div class="modal fade bd-modal-lg insert" id="pilihJudulLain" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Pilih Judul Proyek</h5>
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
                                <div class="col-md-12"><b>Judul Proyek</b>
                                    <div class="form-group">
                                        <select class="form-control selectbox" name="id_proyek" required="" style="width: 100%">
                                            @foreach($judulProyek as $jupro)
                                                <option value="{{$jupro->id_proyek}}">{{$jupro->judul}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_kelompokProyek" id="idkel">
                            <input type="hidden" name="id_kelasProyek" id="idkls">
                            <input type="hidden" name="pilihlain" value="ya">
                            <input type="hidden" name="id_periode" id="idper">
                            @foreach($kelompok as $kel)
                            <input type="hidden" name="judulPrioritas" value="{{$kel->judulPrioritas}}">
                            @endforeach

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

            $('#updateKelompok').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var idkel = button.data('idkel')
                var idos = button.data('idos')
                var stat = button.data('stat')

                var modal = $(this)
                modal.find('.modal-body #idkel').val(idkel)
                modal.find('.modal-body #idos').val(idos)
                modal.find('.modal-body #stat').val(stat)
                })

            $('#pilihJudul').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var idkel = button.data('idkel')
                var idpro = button.data('idpro')
                var judul = button.data('judul')
                var judulprio = button.data('judulprio')

                var modal = $(this)
                modal.find('.modal-body #idkel').val(idkel)
                modal.find('.modal-body #idpro').val(idpro)
                modal.find('.modal-body #judul').val(judul)
                modal.find('.modal-body #judulprio').val(judulprio)
            })

            $('#pilihUsul').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var idkel = button.data('idkel')
                var idus = button.data('idus')
                var judulusul = button.data('judulusul')
                var judulprio = button.data('judulprio')

                var modal = $(this)
                modal.find('.modal-body #idkel').val(idkel)
                modal.find('.modal-body #idus').val(idus)
                modal.find('.modal-body #judulusul').val(judulusul)
                modal.find('.modal-body #judulprio').val(judulprio)
                })
            
            $('#setujuiPilihUsul').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var idkel = button.data('idkel')
                var idkls = button.data('idkls')
                var idper = button.data('idper')
                var idus = button.data('idus')
                var deskripsi = button.data('deskripsi')
                var judulusul = button.data('judulusul')
                var judulprio = button.data('judulprio')

                var modal = $(this)
                modal.find('.modal-body #idkel').val(idkel)
                modal.find('.modal-body #idkls').val(idkls)
                modal.find('.modal-body #idper').val(idper)
                modal.find('.modal-body #deskripsi').val(deskripsi)
                modal.find('.modal-body #idus').val(idus)
                modal.find('.modal-body #judulusul').val(judulusul)
                modal.find('.modal-body #judulprio').val(judulprio)
                })

            $('#pilihJudulLain').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var idkel = button.data('idkel')
                var idkls = button.data('idkls')
                var idper = button.data('idper')

                var modal = $(this)
                modal.find('.modal-body #idkel').val(idkel)
                modal.find('.modal-body #idkls').val(idkls)
                modal.find('.modal-body #idper').val(idper)
                })

        </script>

        
        
    @endpush

@endsection
