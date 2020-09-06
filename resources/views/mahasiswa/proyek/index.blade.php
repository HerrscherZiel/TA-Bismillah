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

    <div class="row justify-content-md-center">
        <div class="col-lg-10 col-sm-12 mb-4">
            <div class="col-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Kelompok Proyek</h6>
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
                                    <th>Project Manager</th>
                                    <th>Proyek</th>
                                    <th>Pembimbing</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kelompok as $kel)
                                    <tr>
                                        <td>
                                            @foreach($kelasproyek as $kelPro)
                                                @if($kelPro->id_kelasProyek == $kel->kelasProyek_id)
                                                    {{$kelPro->namaKelasProyek}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($periode as $per)
                                                @if($per->id_periode == $kel->periode_id)
                                                    {{$per->tahunAjaran}} | {{$per->semester}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{$kel->pm}}
                                        </td>
                                        <td>
                                            @if($kel->judulPrioritas == null)
                                                Belum ada judul
                                            @else
                                                {{$kel->judulPrioritas}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($kel->dosen_id == null)
                                                Belum ada pembimbing
                                            @else
                                                @foreach($dosen as $dos)
                                                    @if($dos->id_dosen == $kel->dosen_id)
                                                        {{$dos->namaDosen}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>                                            
                                            @if ($kel -> statusKelompok === "Menunggu Persetujuan" )
                                                <span class="badge badge-pill badge-primary">{{$kel -> statusKelompok}}</span>
                                            @elseif($kel -> statusKelompok === "Selesai" )
                                                <span class="badge badge-pill badge-secondary">{{$kel -> statusKelompok}}</span>
                                            @elseif($kel -> statusKelompok === "Aktif" )
                                                <span class="badge badge-pill badge-success">{{$kel -> statusKelompok}}</span>
                                            @endif</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="/mahasiswa/proyek/kelompok/show/{{$kel->id_kelompokProyek}}" class="btn btn-primary">
                                                        <i class="fa fa-lg fa-eye">
                                                        </i>
                                                    </a>
                                                    <form class="delete" action="{{ route('mahasiswa.kelompok.proyek.destroy', $kel->id_kelompokProyek)}}" method="post">
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Buat Kelompok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('kelompokproyek.store')}}" enctype="multipart/form-data">
                    @csrf

                <div class="modal-body">
                    <div class="tile-body">
                        <p><b>*Dengan membentuk kelompok anda akan otomatis terdaftar sebagai Project Manager dalam kelompok*</b><br>
                        <br>
                        <br>
                        </p>
                        <div class="row">
                            <div class="col-md-12"><b>Pilih Kelas Proyek</b>
                                <div class="form-group">
                                    <select class="form-control selectbox" name="mahasiswaProyek_id" style="width: 100%" required>
                                        @if($kelpro != null)
                                        @foreach($kelpro as $kelpros)
                                            <option value="{{$kelpros -> id_mahasiswaProyek}}">
                                                {{$kelpros -> namaKelasProyek}} | ({{$kelpros -> semester}} {{$kelpros -> tahunAjaran}} )
                                            </option>
                                        @endforeach
                                        @else
                                            <option disabled>
                                                Belum terdaftar dalam kelas proyek
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Project Manager</b>
                                <div class="form-group">
                                    <input class="form-control" type="text"
                                            value="{{Auth::guard('mahasiswa')->user()->namaMahasiswa}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Status :</b>
                                <div class="form-group">
                                    <input class="form-control"  type="text" value="Menunggu Persetujuan" disabled>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" type="text" name="pm"
                                            value="{{Auth::guard('mahasiswa')->user()->namaMahasiswa}}">
                        <input type="hidden"  type="text" name="statusKelompok" value="Menunggu Persetujuan">
                        <input type="hidden" name="judulPrioritas" value="Belum ada judul">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Buat Kelompok</button>
                </div>

                </form>

            </div>
        </div>
    </div>


    @push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
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
                } 
            });
        });
    </script>
    @endpush


@endsection
