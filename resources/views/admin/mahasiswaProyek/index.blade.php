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
        <h1 class="h3 mb-0 text-gray-800">Mahasiswa Proyek</h1>
    </div>

    <div class="row">
        <div class="col-10 offset-1 mb-4">
            <div class="col-md-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Mahasiswa Proyek</h6>
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Tambah</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importMahasiswaProyek">Impor</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="table-test" width="100%" cellspacing="0">
                                <thead>
                                <tr><th>No</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Kelas Proyek</th>
                                    <th>Periode</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php $i=1; @endphp
                                @foreach($mhsProyek as $mPro)
                                    <tr>
                                        <td>{{$i++}} </td>
                                        <td>{{$mPro->nim}}</td>
                                        <td>{{$mPro->namaMahasiswa}}</td>
                                        <td>{{$mPro->namaKelasProyek}}</td>
                                        <td>{{$mPro->tahunAjaran}} | {{$mPro->semester}}</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-success" title="Reset"
                                                            data-id="{{$mPro->id_mahasiswaProyek}}"
                                                            data-nama="{{ $mPro->namaMahasiswa}}"
                                                            data-idmas="{{$mPro->mahasiswa_id}}"
                                                            data-kelasproyek="{{$mPro->id_kelasProyek}}"
                                                            data-periode="{{$mPro->id_periode}}"
                                                            data-toggle="modal" data-target="#updateMahasiswaProyek">
                                                        <i class="fa fa-lg fa-edit">
                                                        </i>
                                                    </button>
                                                    <form class="delete" action="{{ route('mahasiswaproyek.destroy', $mPro->id_mahasiswaProyek)}}" method="post">
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
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Mahasiswa Proyek</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('mahasiswaproyek.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-12"><b>Pilih Mahasiswa</b>
                                    <div class="form-group">
                                            <select class="form-control selectbox" name="mahasiswa_id" required="" style="width: 100%">
                                                @foreach($mahasiswa as $mhs)
                                                    {{preg_match('~/(.*?)/SV~', $mhs->nim, $output),
                                                        $a = strval($output[1])}}
                                                <option value="{{$mhs->id_mahasiswa}}">{{$mhs->namaMahasiswa}} ({{$a}})</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Pilih Kelas Proyek</b>
                                    <div class="form-group">
                                        <select class="form-control selectbox" name="kelasProyek_id" required="" style="width: 100%">
                                            @foreach($kelasProyek as $kelPro)
                                                <option value="{{$kelPro->id_kelasProyek}}">{{$kelPro->namaKelasProyek}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Pilih Periode</b>
                                    <div class="form-group">
                                        <select class="form-control selectbox" name="periode_id" required="" style="width: 100%">
                                            @foreach($periode as $per)
                                                <option value="{{$per->id_periode}}">{{$per->tahunAjaran}} | {{$per->semester}}</option>
                                            @endforeach
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
    <div class="modal fade bd-modal-lg" id="updateMahasiswaProyek" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Mahasiswa Proyek</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="post" action="{{ route('mahasiswaproyek.update', 'edit')}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="modal-body">
                            <div class="tile-body">
                                <input type="hidden" name="id_mahasiswaProyek" id="id">
                                <div class="row">
                                    <div class="col-md-12"><b>Nama Mahasiswa</b>
                                        <div class="form-group">
                                            <select class="form-control selectmhs" name="mahasiswa_id" id="idmas" style="width: 100%" required>
                                                @foreach($mahasiswa as $mhs)
                                                    <option value="{{$mhs->id_mahasiswa}}" {{preg_match('~/(.*?)/SV~', $mhs->nim, $output),
                                                        $a = strval($output[1])}}>

                                                        {{$mhs->namaMahasiswa}} ({{$a}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12"><b>Kelas Proyek</b>
                                        <div class="form-group">
                                            <select class="form-control" name="kelasProyek_id" id="kelasproyek" required>
                                                @foreach($kelasProyek as $kel)
                                                <option value="{{$kel->id_kelasProyek}}">{{$kel->namaKelasProyek}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12"><b>Tahun Ajaran</b>
                                        <div class="form-group">
                                            <select class="form-control" name="periode_id" id="periode" required>
                                                @foreach($periode as $per)
                                                    <option value="{{$per->id_periode}}">{{$per->tahunAjaran}} | {{$per->semester}}</option>
                                                @endforeach
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
    
    <!-- Import Excel -->
    <div class="modal fade" id="importMahasiswaProyek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="post" action="{{ route('mahasiswa.proyek.import')}}" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5>Impor Mahasiswa Proyek</h5>
                    </div>
                    <div class="modal-body">
                    <h4> Perlu diperhatikan! </h4>
                    <figure class="figure">
                    <img class="img-fluid rounded" src="{{url('/')}}/import_mahasiswaProyek/ContohImporMahasiswaProyek.PNG">
                    <figcaption class="figure-caption">Gambar contoh format file impor</figcaption>
                    </figure>

                    <p><i style="color:red">Baris 1</i> Header harus sesuai seperti gambar contoh di atas <br>
                    <i style="color:blue">Baris 2</i> Kolom tidak perlu diberi format khusus <br>
                    <i style="color:green">Baris 3</i> Data kolom <b> Kelas Proyek </b>, <b> Semester </b>, dan 
                                            <b> Tahun Ajaran </b>harus sudah ada pada sistem
                    </p>
                    <hr>
                        @csrf
                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Impor</button>
                    </div>
                </div>
            </form>
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

        $('#updateMahasiswaProyek').on('show.bs.modal', function (event) {

            // console.log('modal opened');
            var button = $(event.relatedTarget)

            var id = button.data('id')
            var idmas = button.data('idmas')
            var nama = button.data('nama')
            var kelasproyek = button.data('kelasproyek')
            var periode = button.data('periode')

            var modal = $(this)
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #idmas').val(idmas)
            modal.find('.modal-body #nama').val(nama)
            modal.find('.modal-body #kelasproyek').val(kelasproyek)
            modal.find('.modal-body #periode').val(periode)
        })

        $('#table-test').DataTable({
            "aaSorting": []
        });
})
    </script>
    @endpush

@endsection


