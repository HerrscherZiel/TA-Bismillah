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
        <h1 class="h3 mb-0 text-gray-800">Mahasiswa</h1>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-10 col-md-12 col-sm-12 mb-4">
            <div class="col-md-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Mahasiswa</h6>
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMahasiswa">Tambah</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importMahasiswa">Impor</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="table-test" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Reset</th>
                                </tr>
                                </thead>

                                @php $i = 1; @endphp
                                <tbody>
                                @foreach($mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$mhs->nim}}</td>
                                    <td>{{$mhs->username}}</td>
                                    <td>{{$mhs->namaMahasiswa}}</td>
                                    <td>{{$mhs->statusUser}}</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-success"
                                                        data-id="{{$mhs->id_mahasiswa}}"
                                                        data-nim="{{$mhs->nim}}"
                                                        data-username="{{$mhs->username}}"
                                                        data-nama="{{$mhs->namaMahasiswa}}"
                                                        data-toggle="modal" data-target="#updateMahasiswa">
                                                    <i class="fa fa-lg fa-edit"></i>
                                                </button>
                                                <form class="delete" action="{{ route('mahasiswa.destroy', $mhs->id_mahasiswa)}}" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-btn delete-confirm" id="delete" style="margin-left: -2px">
                                                        <i class="fa fa-lg fa-trash">
                                                        </i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                <form class="reset" action="{{ route('mahasiswa.reset', 'edit')}}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="id_mahasiswa" value="{{$mhs->id_mahasiswa}}">
                                                <button class="btn btn-warning reset-confirm">
                                                    <i class="fa fa-lg fa-key"></i>
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

    <!-- Import Excel -->
    <div class="modal fade" id="importMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="post" action="{{ route('mahasiswa.import')}}" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5>Impor Mahasiswa</h5>
                    </div>
                    <div class="modal-body">
                    <h4> Perlu diperhatikan! </h4>
                    <figure class="figure">
                    <img class="img-fluid rounded" src="{{url('/')}}/import_mahasiswa/ContohImporMahasiswa.PNG">
                    <figcaption class="figure-caption">Gambar contoh format file impor</figcaption>
                    </figure>

                    <p><i style="color:red">Baris 1</i> Header harus sesuai seperti gambar contoh di atas <br>
                    <i style="color:blue">Baris 2</i> Kolom tidak perlu diberi format khusus</p>
                    <hr>
                        @csrf
                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade bd-modal-lg" id="tambahMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form-horizontal" action="{{ route('mahasiswa.store')}}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <input type="hidden" name="id_mahasiswa" id="id">
                            <div class="row">
                                <div class="col-md-12"><b>NIM :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nim" placeholder="NIM Mahasiswa" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Nama Mahasiswa :</b>
                                    <div class="form-group">
                                        <input class="form-control"  type="text" name="namaMahasiswa" placeholder="Nama Mahasiswa" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Email Mahasiswa :</b>
                                    <div class="form-group">
                                        <input class="form-control"  type="email" name="email" placeholder="Email Mahasiswa" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="statusUser" value="Mahasiswa">
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
    <div class="modal fade bd-modal-lg" id="updateMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form-horizontal" action="{{ route('mahasiswa.update', 'edit')}}"
                      method="post"
                      enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <input type="hidden" name="id_mahasiswa" id="id">
                            <div class="row">
                                <div class="col-md-12"><b>NIM :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nim" placeholder="NIM Mahasiswa" id="nim" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Nama Mahasiswa :</b>
                                    <div class="form-group">
                                        <input class="form-control"  type="text" name="namaMahasiswa" placeholder="Nama Mahasiswa" id="namaMahasiswa">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Username :</b>
                                    <div class="form-group">
                                        <input class="form-control"  type="text" name="username" placeholder="Username Mahasiswa" id="username">
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

            $('.reset-confirm').on('click', function (event) {
                event.preventDefault();
                const self = $(this);
                swal({
                    title: 'Anda yakin?',
                    text: 'Password mahasiswa akan direset!',
                    icon: 'warning',
                    buttons: ["Batal", "Ya!"],
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        self.parents(".reset").submit();
                    } 
                });
            });

            $('#updateMahasiswa').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var nim = button.data('nim')
                var username = button.data('username')
                var namaMahasiswa = button.data('nama')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #nim').val(nim)
                modal.find('.modal-body #username').val(username)
                modal.find('.modal-body #namaMahasiswa').val(namaMahasiswa)
            });

        </script>
    @endpush

@endsection
