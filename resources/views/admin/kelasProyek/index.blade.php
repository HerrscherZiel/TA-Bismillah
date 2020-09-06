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
        <h1 class="h3 mb-0 text-gray-800">Kelas Proyek</h1>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-10 col-md-12 col-sm-12 mb-4">
            <div class="col-md-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Kelas Proyek</h6>
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
                                    <th>Deskripsi</th>
                                    <th>Maksimal Anggota</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($kelasproyek as $kls)
                                    <tr>
                                    <td>{{$kls -> namaKelasProyek}}</td>
                                    <td>{{$kls -> deskripsi}}</td>
                                    <td>{{$kls -> maksAnggota}}</td>
                                    <td>
                                        @if ($kls->status === "Pendaftaran" )
                                            <span class="badge badge-pill badge-primary">{{$kls -> status}}</span>
                                        @elseif($kls->status === "Non Aktif" )
                                            <span class="badge badge-pill badge-secondary">{{$kls -> status}}</span>
                                        @elseif($kls->status === "Aktif" )
                                            <span class="badge badge-pill badge-success">{{$kls -> status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-success"
                                                        data-id="{{$kls->id_kelasProyek}}"
                                                        data-nama="{{$kls->namaKelasProyek}}"
                                                        data-deskripsi="{{$kls->deskripsi}}"
                                                        data-anggota="{{$kls->maksAnggota}}"
                                                        data-status="{{$kls->status}}"
                                                        data-toggle="modal" data-target="#updateKelasProyek">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                                <form class="delete" action="{{ route('kelasproyek.destroy', $kls->id_kelasProyek)}}" method="post">
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
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kelas Proyek</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('kelasproyek.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-12"><b>Nama Kelas Proyek :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="namaKelasProyek" placeholder="Nama Kelas Proyek" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Deskripsi Kelas Proyek:</b>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Kelas Proyek" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Maksimal Anggota Proyek :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="maksAnggota" placeholder="1, 2, 3 dst..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Status</b>
                                    <div class="form-group">
                                        <select class="form-control" name="status" required="">
                                                <option selected>Pendaftaran</option>
                                                <option>Aktif</option>
                                                <option>Non Aktif</option>
                                        </select>
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

    <!-- Modal Update -->
    <div class="modal fade bd-modal-lg" id="updateKelasProyek" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kelas Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('kelasproyek.update', 'edit')}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <input type="hidden" name="id_kelasProyek" id="id">
                            <div class="row">
                                <div class="col-md-12"><b>Nama Kelas Proyek :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="namaKelasProyek" id="nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Deskripsi Kelas :</b>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" name="deskripsi" id="deskripsi" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Maksimal Anggota:</b>
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="maksAnggota" id="maksAnggota" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Status</b>
                                    <div class="form-group">
                                        <select class="form-control" name="status" id="status" required>
                                        @php $i = 1; @endphp
                                        @foreach($kelasproyek as $kls)
                                            @if($i == 1)
                                            <option value="{{$kls->status}}">{{$kls->status}}</option>
                                            @endif
                                            @php $i++ @endphp
                                        @endforeach
                                            <option value="Pendaftaran">Pendaftaran</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Non Aktif">Non Aktif</option>
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
                    } else {
                    swal("Batal dihapus!", "Data aman di database.", "error");
                    }
                });
            });

            $('#updateKelasProyek').on('show.bs.modal', function (event) {
                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var nama = button.data('nama')
                var deskripsi = button.data('deskripsi')
                var anggota = button.data('anggota')
                var status = button.data('status')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #nama').val(nama)
                modal.find('.modal-body #deskripsi').val(deskripsi)
                modal.find('.modal-body #maksAnggota').val(anggota)
                modal.find('.modal-body #status').val(status)
            })
        </script>
        @endpush
@endsection
