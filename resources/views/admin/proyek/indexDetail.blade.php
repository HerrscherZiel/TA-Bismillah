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
                <a href="/admin/proyek">
                <i class="fa fa-lg fa-arrow-left" aria-hidden="true" style="transform: scale(2.1,1.5);"></i></a>
                <br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-10 offset-1 mb-4">
            <div class="col-md-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Proyek</h6>
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Tambah</button>
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
                                        <th>Judul</th>
                                        <th>Penambah</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proyek as $pro)
                                    <tr>
                                        <td>{{$pro -> namaKelasProyek}}</td>
                                        <td>{{$pro -> tahunAjaran}} | {{$pro -> semester}}</td>
                                        <td>{{$pro -> judul}}</td>
                                        <td>@if($pro -> dosen_id == null && $pro -> usulMahasiswa_id == null)
                                                Admin
                                            @elseif($pro -> dosen_id == null)
                                                @foreach($penambah as $pnm)
                                                    @if($pnm->id_usulMahasiswa == $pro->usulMahasiswa_id)
                                                        {{$pnm->namaMahasiswa}} @php $mh=$pnm->namaMahasiswa; @endphp
                                                    @endif
                                                @endforeach
                                            @elseif($pro -> usulMahasiswa_id == null)
                                                @foreach($dosen as $dos)
                                                    @if($dos->id_dosen == $pro->dosen_id)
                                                        {{$dos->namaDosen}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pro -> statusProyek === "Belum Diambil" )
                                                <span class="badge badge-pill badge-primary">{{$pro -> statusProyek}}</span>
                                            @elseif($pro -> statusProyek === "Selesai" )
                                                <span class="badge badge-pill badge-secondary">{{$pro -> statusProyek}}</span>
                                            @elseif($pro -> statusProyek === "Aktif" )
                                                <span class="badge badge-pill badge-success">{{$pro -> statusProyek}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                <a type="button" class="btn btn-primary" href="/admin/proyek/detail/{{$pro->id_proyek}}">
                                                        <i class="fa fa-lg fa-eye">
                                                        </i>
                                                </a>

                                                    <button class="btn btn-success"
                                                            data-id="{{$pro->id_proyek}}"
                                                            data-kelas="{{$pro->id_kelasProyek}}"
                                                            data-periode="{{$pro->id_periode}}"
                                                            data-desproyek="{{$pro->desProyek}}"
                                                            data-judul="{{$pro->judul}}"
                                                            data-status="{{$pro->statusProyek}}"
                                                            data-toggle="modal" data-target="#updateProyekAdmin">
                                                        <i class="fa fa-lg fa-edit">
                                                        </i>
                                                    </button>
                                                    <form class="delete" action="{{ route('proyek.destroy', $pro->id_proyek)}}" method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger delete-btn delete-confirm" style="margin-left: -2px">
                                                            <i class="fa fa-lg fa-trash">
                                                            </i>
                                                        </button>
                                                    </form>
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
                                                    @if($kelPro->id_kelasProyek == $id_kls)
                                                        <option value="{{$id_kls}}">{{$kelPro -> namaKelasProyek}}</option>
                                                    @endif
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
                                                    @if($per->id_periode == $id_per)
                                                        <option value="{{$id_per}}">{{$per -> tahunAjaran}} | {{$per -> semester}}</option>
                                                    @endif
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

            <!-- Modal Update -->
            <div class="modal fade bd-modal-lg" id="updateProyekAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="post" action="{{ route('proyek.update', 'edit')}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                        <div class="modal-body">
                            <div class="tile-body">
                                <input type="hidden" name="id_proyek" id="id">
                                <div class="row">
                                    <div class="col-md-12"><b>Kelas Proyek</b>
                                        <div class="form-group">
                                            <select class="form-control" name="kelasProyek_id" id="kelas" required>
                                                @foreach($kelasproyek as $kel)
                                                <option value="{{$kel -> id_kelasProyek}}">{{$kel -> namaKelasProyek}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Pilih Periode</b>
                                        <div class="form-group">
                                            <select class="form-control" name="periode_id" id="periode" required>
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
                                            <input class="form-control" type="text" name="judul" id="judul" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Deskripsi Proyek</b>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" name="deskripsi" id="desproyek"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Status</b>
                                        <div class="form-group">
                                            <select class="form-control" name="statusProyek" id="status" required>
                                                @php $i = 1; @endphp
                                                @foreach($proyek as $pro)
                                                    @if($i == 1)
                                                    <option value="{{$pro->statusProyek}}">{{$pro->statusProyek}}</option>
                                                    @endif
                                                    @php $i++ @endphp
                                                @endforeach
                                                <option value="Belum Diambil">Belum Diambil</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Selesai">Selesai</option>
                                            </select>
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

            <!-- Modal Show -->
            <div class="modal fade bd-modal-lg" id="showProyekAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Detail Proyek</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            <div class="modal-body">
                                <div class="tile-body">
                                    <input type="hidden" name="id_proyek" id="id">
                                    <div class="row">
                                        <div class="col-6"><b>Kelas Proyek</b>
                                            <div class="form-group">
                                                <select class="form-control" name="kelasProyek_id" id="kelas" disabled>
                                                    @foreach($kelasproyek as $kel)
                                                        <option value="{{$kel -> id_kelasProyek}}">{{$kel -> namaKelasProyek}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6"><b>Periode</b>
                                            <div class="form-group">
                                                <select class="form-control" name="periode_id" id="periode" disabled>
                                                    @foreach($periode as $per)
                                                        <option value="{{$per -> id_periode}}">{{$per -> tahunAjaran}} | {{$per -> semester}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><b>Judul Proyek</b>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="judul" id="judul" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><b>Deskripsi Proyek</b>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="4" name="deskripsi" id="desproyek" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><b>Status</b>
                                            <div class="form-group">
                                                <input class="form-control" id="status" name="statusProyek" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

    @push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            $('#updateProyekAdmin').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var kelas = button.data('kelas')
                var periode = button.data('periode')
                var judul = button.data('judul')
                var penambah = button.data('penambah')
                var desproyek = button.data('desproyek')
                var status = button.data('status')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #kelas').val(kelas)
                modal.find('.modal-body #periode').val(periode)
                modal.find('.modal-body #judul').val(judul)
                modal.find('.modal-body #penambah').val(penambah)
                modal.find('.modal-body #desproyek').val(desproyek)
                modal.find('.modal-body #status').val(status)
            })

            $('#showProyekAdmin').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var kelas = button.data('kelas')
                var periode = button.data('periode')
                var judul = button.data('judul')
                var desproyek = button.data('desproyek')
                var status = button.data('status')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #kelas').val(kelas)
                modal.find('.modal-body #periode').val(periode)
                modal.find('.modal-body #judul').val(judul)
                modal.find('.modal-body #desproyek').val(desproyek)
                modal.find('.modal-body #status').val(status)
            })

            $('.delete-confirm').on('click', function (event) {
                event.preventDefault();
                const self = $(this);
                swal({
                    title: 'Anda yakin?',
                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    buttons: ["Batal", "Ya!"],
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        self.parents(".delete").submit();
                    } else {
                    swal("Batal dihapus!", "Data aman di database.", "error");
                    }
                });
            });
        </script>
    @endpush

@endsection
