@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Proyek</h1>
        <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <div class="row">

        <div class="col-2"></div>

        <div class="col-lg-8 mb-4">

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
{{--                                        <th>Deskripsi</th>--}}
                                        <th>Kelas Proyek</th>
                                        <th>Periode</th>
                                        <th>Judul Proyek</th>
                                        <th>Status Proyek</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proyekDosen as $pro)
                                        <tr>
                                        <td>{{$pro -> namaKelasProyek}}</td>
                                        <td>{{$pro -> tahunAjaran}} | {{$pro -> semester}} </td>
                                        <td>{{$pro -> judul}}</td>
                                        <td>{{$pro -> statusProyek}}</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-info"
                                                            data-id="{{$pro->id_proyek}}"
                                                            data-kelas="{{$pro->id_kelasProyek}}"
                                                            data-periode="{{$pro->id_periode}}"
                                                            data-deskripsi="{{$pro->deskripsi}}"
                                                            data-judul="{{$pro->judul}}"
                                                            data-status="{{$pro->statusProyek}}"
                                                            data-toggle="modal" data-target="#showProyekDosen">
                                                        <i class="fa fa-lg fa-eye">
                                                        </i>
                                                    </button>
                                                    <button class="btn btn-info"
                                                            data-id="{{$pro->id_proyek}}"
                                                            data-kelas="{{$pro->id_kelasProyek}}"
                                                            data-periode="{{$pro->id_periode}}"
                                                            data-deskripsi="{{$pro->deskripsi}}"
                                                            data-judul="{{$pro->judul}}"
                                                            data-toggle="modal" data-target="#updateProyekDosen">
                                                        <i class="fa fa-lg fa-edit">
                                                        </i>
                                                    </button>
                                                    <a class="btn btn-info" href="#">
                                                        <i class="fa fa-lg fa-trash">
                                                        </i>
                                                    </a>
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
                                                    <option disabled="" selected="">Pilih Kelas Proyek</option>
                                                    @foreach($kelasproyek as $kelPro)
                                                    <option value="{{$kelPro -> id_kelasProyek}}">{{$kelPro -> namaKelasProyek}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><b>Pilih Periode</b>
                                            <div class="form-group">
                                                <select class="form-control selectbox"  name="periode_id" style="width: 100%">
                                                    <option disabled="" selected="">Pilih Periode</option>
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
                                                <input class="form-control" type="text" name="judul" placeholder="Judul Proyek">
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
                                    <input type="hidden" name="dosen_id" value="{{Auth::guard('dosen')->user()->id_dosen}}">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Update -->
            <div class="modal fade bd-modal-lg" id="updateProyekDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <select class="form-control" name="kelasProyek_id" id="kelas">
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
                                                <select class="form-control" name="periode_id" id="periode">
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
                                                <input class="form-control" type="text" name="judul" id="judul">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><b>Deskripsi Proyek</b>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="4" name="deskripsi" id="deskripsi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

    <div class="modal fade bd-modal-lg" id="showProyekDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{--                        <form method="post" action="{{ route('proyek.update', 'edit')}}" enctype="multipart/form-data">--}}
                {{--                            @method('PATCH')--}}
                {{--                            @csrf--}}
                <div class="modal-body">
                    <div class="tile-body">
                        <input type="hidden" name="id_proyek" id="id">
                        <div class="row">
                            <div class="col-md-12"><b>Kelas Proyek</b>
                                <div class="form-group">
                                    <select class="form-control" name="kelasProyek_id" id="kelas" disabled>
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
                                    <select class="form-control" name="periode_id" id="periode" disabled>
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
                                    <input class="form-control" type="text" name="judul" id="judul" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Deskripsi Proyek</b>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="deskripsi" id="deskripsi" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Status</b>
                                <div class="form-group">
                                    <input class="form-control" id="status" name="statusProyek" disabled>
                                    {{--                                            <input class="form-control" type="text" name="statusProyek" id="status">--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--                            <div class="modal-footer">--}}
                {{--                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--                                <button type="submit" class="btn btn-primary">Save changes</button>--}}
                {{--                            </div>--}}
                {{--                        </form>--}}

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('#updateProyekDosen').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var kelas = button.data('kelas')
                var periode = button.data('periode')
                var judul = button.data('judul')
                var deskripsi = button.data('deskripsi')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #kelas').val(kelas)
                modal.find('.modal-body #periode').val(periode)
                modal.find('.modal-body #judul').val(judul)
                modal.find('.modal-body #deskripsi').val(deskripsi)
            })

            $('#showProyekDosen').on('show.bs.modal', function (event) {
                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var kelas = button.data('kelas')
                var periode = button.data('periode')
                var judul = button.data('judul')
                var deskripsi = button.data('deskripsi')
                var status = button.data('status')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #kelas').val(kelas)
                modal.find('.modal-body #periode').val(periode)
                modal.find('.modal-body #judul').val(judul)
                modal.find('.modal-body #deskripsi').val(deskripsi)
                modal.find('.modal-body #status').val(status)
            })
        </script>
    @endpush
@endsection
