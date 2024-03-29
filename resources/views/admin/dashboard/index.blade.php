@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row justify-content-md-center">

        <div class="col-lg-10 col-md-12 col-sm-12">
            <div class="row justify-content-md-center">
                                
                <div class="col-12">
                    <h3 class="text-left" style="color:black">Users</h3>
                    <hr style="weight:2px; color:black;">
                    <div class="row">

                                <div class="col-xl-4 col-md-4 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                    <a href="/admin/admin/" style="text-decoration: none">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center" >
                                                <div class="col mr-2">
                                                    <div class="text-xl-left font-weight-bold text-primary text-uppercase mb-1">Admin</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$admin}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-user fa-2x" style="color:#4e73df;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-4 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                    <a href="/admin/dosen/" style="text-decoration: none">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xl-left font-weight-bold text-success text-uppercase mb-1">Dosen</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dosen}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-user fa-2x" style="color:#1cc88a;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-4 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                    <a href="/admin/mahasiswa/" style="text-decoration: none">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xl-left font-weight-bold text-warning text-uppercase mb-1">Mahasiswa</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mahasiswa}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-user fa-2x" style="color:#f6c23e;"> </i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div style="margin-bottom:10px">

        <div class="col-lg-10 col-md-12 col-sm-12">
            <div class="row justify-content-md-center">
                                
                <div class="col-12">
                    <h3 class="text-left" style="color:black">Proyek</h3>
                    <hr style="weight:2px; color:black;">
                    <div class="row">

                                <div class="col-xl-4 col-md-4 mb-4">
                                    <div class="card border-left-danger shadow h-100 py-2" style="color:#FF8A71">
                                    <a href="/admin/proyek/" style="text-decoration: none">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xl-left font-weight-bold text-danger text-uppercase mb-1">Proyek</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$proyek}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-tasks fa-2x" style="#e74a3b"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-4 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                    <a href="/admin/mahasiswaproyek/" style="text-decoration: none">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xl-left font-weight-bold text-info text-uppercase mb-1">Mahasiswa Proyek</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$mpro}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-users fa-2x" style="color:#36b9cc"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-4 mb-4">
                                    <div class="card border-left-secondary shadow h-100 py-2">
                                    <a href="/admin/kelompokproyek/" style="text-decoration: none">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xl-left font-weight-bold text-secondary text-uppercase mb-1">Kelompok Proyek</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kelompok}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-copy fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="col-lg-10 col-md-12 col-sm-12 mb-4 mt-5">

            <div class="col-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Usul Proyek</h6>
                            </div>
                            <div class="col-md-4 text-right">
                                <a type="button" class="btn btn-primary" href="/admin/usulmahasiswa">
                                    Lebih Lengkap
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Kelas Proyek</th>
                                    <th>Periode</th>
                                    <th>Judul</th>
                                    <th>Pengusul</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(count($usul) > 0)
                                    @foreach($usul as $usl)
                                        <tr>
                                            <td>{{$usl->namaKelasProyek}}</td>
                                            <td>{{$usl->semester}} | {{$usl->tahunAjaran}}</td>
                                            <td>{{$usl->judulUsul}}</td>
                                            <td>{{$usl->namaMahasiswa}}</td>
                                            <td>{{$usl->statusUsul}}</td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="btn-group">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#showUsul" 
                                                                                data-id="{{$usl->id_usulMahasiswa}}"
                                                                                data-kelas="{{$usl->namaKelasProyek}}"
                                                                                data-periode="{{$usl->semester}} | {{$usl->tahunAjaran}}"
                                                                                data-kelasid="{{$usl->kelasProyek_id}}"
                                                                                data-kelompokid="{{$usl->id_kelompokProyek}}"
                                                                                data-periodeid="{{$usl->periode_id}}"
                                                                                data-judul="{{$usl->judulUsul}}"
                                                                                data-judulprio="{{$usl->judulPrioritas}}"
                                                                                data-deskripsi="{{$usl->deskripsi}}"
                                                                                data-penambah="{{$usl->pm}}"
                                                                                data-status="{{$usl->statusUsul}}"class="btn btn-primary">
                                                            <i class="fa fa-lg fa-eye">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan=6>Belum ada usul proyek </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-lg-10 col-md-12 col-sm-12 mb-4 mt-2">

            <div class="col-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Kelompok Proyek</h6>
                            </div>
                            <div class="col-md-4 text-right">
                                <a type="button" class="btn btn-primary" href="/admin/kelompokproyek/">
                                    Lebih Lengkap
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Kelas Proyek</th>
                                    <th>Periode</th>
                                    <th>Project Manager</th>
                                    <th>Judul Proyek</th>
                                    <th>Dosen pembimbing</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(count($kelompokpro) > 0)
                                    @foreach($kelompokpro as $kel)
                                        <tr>
                                        <td>{{$kel->namaKelasProyek}}</td>
                                            <td>{{$kel->semester}} | {{$kel->tahunAjaran}}</td>
                                            <td>{{$kel->pm}}</td>
                                            <td>{{$kel->judulPrioritas}}</td>
                                            <td>
                                            @if($kel->dosen_id == null)
                                                Belum ada dosen pembimbing
                                            @else
                                                @foreach($namaDosen as $dos)
                                                    @if($dos->id_dosen == $kel->dosen_id)
                                                    {{$dos->namaDosen}}
                                                    @endif
                                                @endforeach
                                            @endif

                                            </td>
                                            <td>{{$kel->statusKelompok}}</td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-info" href="/admin/kelompok/detail/{{$kel->id_kelompokProyek}}">
                                                            <i class="fa fa-lg fa-eye">
                                                            </i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan=7> Belum ada ajuan kelompok </td>
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

    <!-- Modal Show -->
        <div class="modal fade bd-modal-lg" id="showUsul" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Detail Usul</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <div class="modal-body">
                            <div class="tile-body">
                                <input type="hidden" name="id_usulMahasiswa" id="id">
                                <div class="row">
                                    <div class="col-6"><b>Kelas Proyek</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text"  id="kelas" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6"><b>Periode</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text"  id="periode" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Judul Usul Proyek</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="judul" id="judul" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Deskripsi Usul Proyek</b>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" name="deskripsi" id="deskripsi" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Penambah Proyek</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="penambah" id="penambah" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Status</b>
                                        <div class="form-group">
                                            <input class="form-control" id="status" name="statusUsul" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12"><hr></div>

                                <div class="col-12">
                                    <br>
                                    <div class="row">

                                        <div class="col-6 text-center">
                                            <form class="delete" action="{{ route('usul.mahasiswa.update', 'edit')}}" method="post">
                                                @method('PATCH')
                                                @csrf
                                                <input type="hidden" name="status" value="tolak">
                                                <input type="hidden" name="id_usulMahasiswa" id="id">
                                                <button class="btn btn-danger">
                                                Tolak
                                                    <i class="fa fa-fw fa-lg fa-times">
                                                    </i>
                                                </button>
                                            </form>    
                                        </div>

                                        <div class="col-6 text-center">
                                        <form method="post" action="{{ route('usul.mahasiswa.update', 'edit')}}" 
                                            enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                                            <input type="hidden" name="id_usulMahasiswa" id="id">
                                            <input type="hidden" name="status" value="terima">
                                            <input type="hidden" name="judulUsul" id="judul">
                                            <input type="hidden" name="id_kelompokProyek" id="kelompokid">
                                            <input type="hidden" name="deskripsi" id="deskripsi">
                                            <input type="hidden" name="kelasProyek_id" id="kelasid">
                                            <input type="hidden" name="judulPrioritas" id="judulprio">
                                            <input type="hidden" name="periode_id" id="periodeid">
                                            <button type="submit" class="btn btn-primary">
                                            Terima
                                                <i class="fa fa-fw fa-lg fa-check">
                                                </i>
                                            </button>
                                        </form>    
                                        </div>
                                        

                                    </div>
                                    <br>
                                </div>

                            </div>
                        </div>

                </div>
            </div>
        </div>


    @push('scripts')
        <script>

            $('#showUsul').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var kelas = button.data('kelas')
                var kelasid = button.data('kelasid')
                var kelompokid = button.data('kelompokid')
                var periodeid = button.data('periodeid')
                var periode = button.data('periode')
                var judul = button.data('judul')
                var judulprio = button.data('judulprio')
                var penambah    = button.data('penambah')
                var deskripsi = button.data('deskripsi')
                var status = button.data('status')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #kelas').val(kelas)
                modal.find('.modal-body #kelompokid').val(kelompokid)
                modal.find('.modal-body #kelasid').val(kelasid)
                modal.find('.modal-body #periodeid').val(periodeid)
                modal.find('.modal-body #periode').val(periode)
                modal.find('.modal-body #judul').val(judul)
                modal.find('.modal-body #judulprio').val(judulprio)
                modal.find('.modal-body #deskripsi').val(deskripsi)
                modal.find('.modal-body #penambah').val(penambah)
                modal.find('.modal-body #status').val(status)
            })
        </script>
    @endpush

@endsection
