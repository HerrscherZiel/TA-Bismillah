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
        <h1 class="h3 mb-0 text-gray-800">Detail Usul Proyek Diterima</h1>
    </div>

    <div class="col-12">
        <div class="row text-center">
            <div class="col-1">
                <a href="/admin/usulmahasiswa">
                <i class="fa fa-lg fa-arrow-left" aria-hidden="true" style="transform: scale(2.1,1.5);"></i></a>
                <br>
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-10 col-md-12 col-sm-12 mb-4">
            <div class="col-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Usul Proyek Mahasiswa</h6>
                            </div>
                            <div class="col-8 text-right" style="margin-bottom:10px">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary text-center" ><a href="/admin/usul/detail/{{$id_kls}}/{{$id_per}}" style="color: white;">Menunggu Persetujuan</a></button>
                                    <button type="button" class="btn btn-success text-center" ><a href="/admin/usul/detail-diterima/{{$id_kls}}/{{$id_per}}" style="color: white;">Diterima</a></button>
                                    <button type="button" class="btn btn-secondary text-center" ><a href="/admin/usul/detail-ditolak/{{$id_kls}}/{{$id_per}}" style="color: white;">Ditolak</a></button>
                                </div>    
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
                                    <th>Pengusul</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usul as $us)
                                    <tr>
                                        <td>{{$us->namaKelasProyek}}</td>
                                        <td>{{$us->semester}} | {{$us->tahunAjaran}}</td>
                                        <td>{{$us->judulUsul}}</td>
                                        <td>{{$us->pm}}</td>
                                        <td>                                            
                                            @if ($us -> statusUsul === "Menunggu Persetujuan" )
                                                <span class="badge badge-pill badge-primary">{{$us -> statusUsul}}</span>
                                            @elseif($us -> statusUsul === "Diterima" )
                                                <span class="badge badge-pill badge-success">{{$us -> statusUsul}}</span>
                                            @elseif($us -> statusUsul === "Ditolak" )
                                                <span class="badge badge-pill badge-secondary">{{$us -> statusUsul}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary" title="Detail" data-toggle="modal" data-target="#showUsul" 
                                                                            data-id="{{$us->id_usulMahasiswa}}"
                                                                            data-kelas="{{$us->namaKelasProyek}}"
                                                                            data-periode="{{$us->semester}} | {{$us->tahunAjaran}}"
                                                                            data-kelasid="{{$us->kelasProyek_id}}"
                                                                            data-kelompokid="{{$us->id_kelompokProyek}}"
                                                                            data-periodeid="{{$us->periode_id}}"
                                                                            data-judul="{{$us->judulUsul}}"
                                                                            data-judulprio="{{$us->judulPrioritas}}"
                                                                            data-deskripsi="{{$us->deskripsi}}"
                                                                            data-penambah="{{$us->pm}}"
                                                                            data-status="{{$us->statusUsul}}"class="btn btn-primary">
                                                        <i class="fa fa-lg fa-eye">
                                                        </i>
                                                    </button>
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
                                        <div class="row justify-content-md-center">

                                            <div class="col-12 text-center">
                                                <form class="delete" action="{{ route('usul.mahasiswa.update', 'edit')}}" method="post">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" name="status" value="tolak">
                                                    <input type="hidden" name="id_usulMahasiswa" id="id">
                                                    <input type="hidden" name="id_kelompokProyek" id="kelompokid">
                                                    <input type="hidden" name="judulPrioritas" id="judulprio">

                                                    <button class="btn btn-danger">
                                                    Tolak
                                                        <i class="fa fa-fw fa-lg fa-times">
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
