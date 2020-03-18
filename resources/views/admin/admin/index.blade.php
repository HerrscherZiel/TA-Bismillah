@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Dashboard | Admin</h1>
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
                                <h6 class="font-weight-bold text-primary m-0">Admin</h6>
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
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admin as $ads)
                                <tr>
                                    <td>{{$ads->nip}}</td>
                                    <td>{{$ads->namaAdmin}}</td>
                                    <td>{{$ads->email}}</td>
                                    <td>{{$ads->statusUser}}</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-info"
                                                        data-id="{{$ads->id_admin}}"
                                                        data-nip="{{$ads->nip}}"
                                                        data-nama="{{$ads->namaAdmin}}"
                                                        data-email="{{$ads->email}}"
                                                        data-toggle="modal" data-target="#updateAdmin">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                                <form class="delete" action="{{ route('admin.destroy', $ads->id_admin)}}" method="post">
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('admin.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-12"><b>NIP</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nip" placeholder="NIP administrator">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Nama</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="namaAdmin" placeholder="Nama">
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
                            <input type="hidden" name="statusUser" value="Admin">
                            <input type="hidden" name="password" value="{{bcrypt("admin123")}}">
                            <input type="hidden" name="passwordBackup" value="{{bcrypt("admin123")}}">
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
    <div class="modal fade bd-modal-lg" id="updateAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('admin.update', 'edit')}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <input type="hidden" name="id_admin" id="id">
                            <div class="row">
                                <div class="col-md-12"><b>NIP</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="nip" id="nip">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Nama</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="namaAdmin" id="nama">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Email</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="email" id="email">
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
            $('#updateAdmin').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var nip = button.data('nip')
                var nama = button.data('nama')
                var email = button.data('email')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #nip').val(nip)
                modal.find('.modal-body #nama').val(nama)
                modal.find('.modal-body #email').val(email)
            })

        </script>
    @endpush
@endsection
