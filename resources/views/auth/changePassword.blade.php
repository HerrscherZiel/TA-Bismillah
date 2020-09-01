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
        <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-10">
                        <h6 class="m-0 font-weight-bold text-primary">Atur Password Baru</h6>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal" id="changePass" action="{{ route('save.new.password')}}"
                                    method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                <div class="tile-body">

                                        <div class="row">
                                            <div class="col-md-12"><b>Password Lama</b>
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="passwordLama" required placeholder="password lama">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"><b>Password Baru</b>
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="passwordBaru" required placeholder="password baru">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"><b>Konfirmasi Password Baru</b>
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="konfirmasiPassword" required placeholder="password baru">
                                                </div>
                                            </div>
                                        </div>

                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-warning" onclick="resetForm(this)" >Reset</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')

    <script>

        function resetForm($form) {
            $form.find('input:password').val('');
            resetForm($('#changePass'));
        }


    </script>
    @endpush

@endsection
