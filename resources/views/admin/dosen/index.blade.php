@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Dosen</h1>
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
                                <h6 class="font-weight-bold text-primary m-0">Dosen</h6>
                            </div>

                            <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDosen">Tambah</button>

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importDosen">Import</button>
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
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Reset</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($dosen as $dos)
                                <tr>
                                    <td>{{$dos->nip}}</td>
                                    <td>{{$dos->namaDosen}}</td>
                                    <td>{{$dos->email}}</td>
                                    <td>{{$dos->statusUser}}</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-info"
                                                        data-id="{{$dos->id_dosen}}"
                                                        data-nip="{{$dos->nip}}"
                                                        data-email="{{$dos->email}}"
                                                        data-nama="{{$dos->namaDosen}}"
                                                        data-toggle="modal" data-target="#updateDosen">
                                                    <i class="fa fa-lg fa-edit"></i>
                                                </button>
                                                <form class="delete" action="{{ route('dosen.destroy', $dos->id_dosen)}}" method="post">
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
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-info">
                                                    <i class="fa fa-lg fa-key"></i>
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

    <!-- Import Excel -->
    <div class="modal fade" id="importDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="post" action="{{ route('dosen.import')}}" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        @csrf
                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{--Insert Modal--}}
    <div class="modal fade bd-modal-lg insert" id="tambahDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('dosen.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-12"><b>NIP</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nip" placeholder="nip dosen">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Nama</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="namaDosen" placeholder="nama dosen">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Email</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="email" placeholder="email">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="statusUser" value="Dosen">
                            <input type="hidden" name="password" value="{{bcrypt("12345678")}}">
                            <input type="hidden" name="passwordBackup" value="{{bcrypt("12345678")}}">
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
    <div class="modal fade bd-modal-lg" id="updateDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form-horizontal" action="{{ route('dosen.update', 'edit')}}"
                      method="post"
                      enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                            <div class="tile-body">
                                <input type="hidden" name="id_dosen" id="id">
                                <div class="row">
                                    <div class="col-md-12"><b>NIP :</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="nip" placeholder="NIP Dosen" id="nip" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Nama Dosen :</b>
                                        <div class="form-group">
                                            <input class="form-control"  type="text" name="namaDosen" placeholder="Nama Dosen" id="namaDosen">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><b>Email :</b>
                                        <div class="form-group">
                                            <input class="form-control"  type="text" name="email" placeholder="Email Dosen" id="email">
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

    @push('scripts')
        <script>
            $('#updateDosen').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var nip = button.data('nip')
                var email = button.data('email')
                var namaDosen = button.data('nama')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #nip').val(nip)
                modal.find('.modal-body #email').val(email)
                modal.find('.modal-body #namaDosen').val(namaDosen)
            });

        </script>
    @endpush

@endsection
