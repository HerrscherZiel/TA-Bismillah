@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Kelas Proyek</h1>
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
{{--                                    <th>No</th>--}}
                                    <th>Kelas Proyek</th>
                                    <th>Deskripsi</th>
                                    <th>Maksimal Anggota</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($kelasproyek as $kls)
                                    <tr>
{{--                                    <td>1</td>--}}
                                    <td>{{$kls -> namaKelasProyek}}</td>
                                    <td>{{$kls -> deskripsi}}</td>
                                    <td>{{$kls -> maksAnggota}}</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-info"
                                                        data-id="{{$kls->id_kelasProyek}}"
                                                        data-nama="{{$kls->namaKelasProyek}}"
                                                        data-deskripsi="{{$kls->deskripsi}}"
                                                        data-anggota="{{$kls->maksAnggota}}"
                                                        data-toggle="modal" data-target="#updateKelasProyek">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                            </div>
                                            <div class="btn-group">
                                                <form class="delete" action="{{ route('kelasproyek.destroy', $kls->id_kelasProyek)}}" method="post">
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
                                                <input class="form-control" type="text" name="namaKelasProyek" placeholder="Nama Kelas Proyek">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><b>Deskripsi Kelas Proyek:</b>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="4" name="deskripsi" placeholder="Deskripsi Kelas Proyek"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><b>Maksimal Anggota Proyek :</b>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="maksAnggota" placeholder="1, 2, 3 dsb...">
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
                                                <input class="form-control" type="text" name="namaKelasProyek" id="nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><b>Deskripsi Kelas :</b>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="4" name="deskripsi" id="deskripsi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><b>Nama Kelas Proyek :</b>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="maksAnggota" id="maksAnggota">
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
