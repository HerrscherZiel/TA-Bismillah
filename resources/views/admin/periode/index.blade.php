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
        <h1 class="h3 mb-0 text-gray-800">Periode</h1>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-lg-10 col-md-12 col-sm-12 mb-4">
            <div class="col-md-12">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">Periode</h6>
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
                                    <th>Tahun Ajaran</th>
                                    <th>Semester</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($periode as $period)
                                    <tr>
                                    <td>{{$period -> tahunAjaran}}</td>
                                    <td>{{$period -> semester}}</td>
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-success" title="Edit"
                                                        data-id="{{$period->id_periode}}"
                                                        data-tahun="{{$period->tahunAjaran}}"
                                                        data-sem="{{$period->semester}}"
                                                        data-toggle="modal" data-target="#updatePeriode">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                                <form class="delete" action="{{ route('periode.destroy', $period->id_periode)}}" method="post">
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Periode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('periode.store')}}" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12"><b>Tahun Ajaran :</b>
                                <div class="form-group">
                                    <input class="form-control" type="number" name="tahunAjaran" placeholder="2019, 2020, ....." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Semester :</b>
                                <div class="form-group">
                                    <select class="form-control" type="text" name="semester" required>
                                        <option>Genap</option>
                                        <option>Ganjil</option>
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
    <div class="modal fade bd-modal-lg" id="updatePeriode" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Periode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('periode.update', 'edit')}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <input type="hidden" name="id_periode" id="id">
                            <div class="row">
                                <div class="col-md-12"><b>Tahun Ajaran :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="tahunAjaran" id="tahun" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Semester :</b>
                                    <div class="form-group">
                                        <select class="form-control" type="text" name="semester" id="sem" required>
                                            <option>Genap</option>
                                            <option>Ganjil</option>
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

        </script>
        @endpush

@endsection
