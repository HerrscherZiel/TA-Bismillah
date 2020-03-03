@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Mahasiswa Proyek</h1>
        <!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->

    <!-- Content Row -->
    <div class="row">

        <div class="col-2"></div>

        <div class="col-lg-8 mb-4">

            <!-- Approach -->

            <div class="col-md-12">

                <div class="card shadow mb-4">


                    <div class="card-header py-3">

                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Mahasiswa Proyek</h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Tambah</button>
                                {{--                                <a href="/detailProject" class="btn btn-primary">Detail</a>--}}
                            </div>
                            <!--                      </div>-->

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="table-test" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Kelas Proyek</th>
                                    <th>Periode</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($mhsProyek as $mPro)
                                    <tr>
                                        <td>{{$mPro->nim}}</td>
                                        <td>{{$mPro->namaMahasiswa}}</td>
                                        <td>{{$mPro->namaKelasProyek}}</td>
                                        <td>{{$mPro->tahunAjaran}} | {{$mPro->semester}}</td>
                                        <td>
                                            <div class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-info"
                                                            data-id="{{$mPro->id_mahasiswaProyek}}"
                                                            data-nama="{{ $mPro->namaMahasiswa}}"
                                                            data-idmas="{{$mPro->mahasiswa_id}}"
                                                            data-kelasproyek="{{$mPro->id_kelasProyek}}"
                                                            data-periode="{{$mPro->id_periode}}"
                                                            data-toggle="modal" data-target="#updateMahasiswaProyek">
                                                        <i class="fa fa-lg fa-edit">
                                                        </i>
                                                    </button>
                                                </div>
                                                <div class="btn-group">
                                                    <form class="delete" action="{{ route('mahasiswaproyek.destroy', $mPro->id_mahasiswaProyek)}}" method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger delete-btn" style="margin-left: -2px">
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
                                            <select class="form-control" name="mahasiswa_id" required="">
                                                @foreach($mahasiswa as $mhs)
                                                <option value="{{$mhs->id_mahasiswa}}">{{$mhs->namaMahasiswa}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Pilih Kelas Proyek</b>
                                    <div class="form-group">
                                        <select class="form-control" name="kelasProyek_id" required="">
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
                                        <select class="form-control" name="periode_id" required="">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                                <input type="hidden" name="mahasiswa_id" id="idmas">
                                <div class="row">
                                    <div class="col-md-12"><b>Nama Mahasiswa</b>
                                        <div class="form-group">
                                            <input class="form-control namas" id="nama" disabled>
{{--                                                @foreach($mahasiswa as $mhs)--}}
{{--                                                <option >{{$nam}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </input>--}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12"><b>Kelas Proyek</b>
                                        <div class="form-group">
                                            <select class="form-control" name="kelasProyek_id" id="kelasproyek">
                                                @foreach($kelasProyek as $kel)
                                                <option value="{{$kel->id_kelasProyek}}">{{$kel->namaKelasProyek}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12"><b>Username :</b>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input class="form-control"  type="text" name="username" placeholder="Nama Mahasiswa" id="nama">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12"><b>Username :</b>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <select class="form-control" type="text" name="kelasproyek_id" id="nama">--}}
{{--                                                <option class="form-control"  type="text" name="username"  id="nama">--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="row">
                                    <div class="col-md-12"><b>Tahun Ajaran</b>
                                        <div class="form-group">
                                            <select class="form-control" name="periode_id" id="periode">
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>




@endsection
@push('script')
    test
@endpush
