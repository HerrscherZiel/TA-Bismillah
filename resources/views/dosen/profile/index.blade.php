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
        <h1 class="h3 mb-0 text-gray-800">Profil Dosen</h1>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-10">
                        <div class="col-7">
                            <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="tile">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <div class="card-body">
                                                @foreach($profil as $prof)
                                                    @if($prof->fileFoto != NULL)
                                                        <img class="img-fluid" src="{{asset('data_profildos/'.$prof->fileFoto)}}" style="width: auto; height: 200px" alt="Responsive image">
                                                    @else
                                                        <img class="img-fluid" src="{{url('/')}}/asset/img/user.svg" style="width: auto; height: 200px" alt="Responsive image">
                                                    @endif
                                                @endforeach
                                                    <br><span class="mr-2 d-none d-lg-inline text-gray-600 small">Ukuran foto maks 2000 Kb</span>
                                                </div>
                                                <form class="form-horizontal" action="{{ route('profile.update', 'edit')}}"
                                                            method="post"
                                                            enctype="multipart/form-data">
                                                    @method('PATCH')
                                                    @csrf

                                                    @foreach($profil as $prof)
                                                        <input type="hidden" name="id_dosen" value="{{$prof->id_dosen}}">
                                                    @endforeach

                                                    <div class="col-12 ">
                                                        <div class="row">
                                                            <div class="col-12 my-auto">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="file" name="fileFoto" placeholder="Pilih Gambar" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 text center">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="card-body" style="color: black;">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <h5><b>{{Auth::guard('dosen')->user()->namaDosen}}</b></h5>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <h6> {{Auth::guard('dosen')->user()->nip}} </h6>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <i class="fas fa-calendar fa-1x text-gray-300"></i>
                                                        <a>{{Auth::guard('dosen')->user()->statusUser}}</a>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-8 col-md-6 col-sm-12 mb-4">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="tile">
                                <section class="invoice">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="card-body" style="color: black;">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h5> <b>Informasi Dosen</b> </h5>
                                                            </div>
                                                            <div class="col-md-4 text-right">
                                                                @foreach($profil as $prof)
                                                                <button class="btn btn-primary"
                                                                        data-id="{{$prof->id_dosen}}"
                                                                        data-email="{{$prof->email}}"
                                                                        data-hp="{{$prof->hpDosen}}"
                                                                        data-toggle="modal" data-target="#updateProfilDosen">
                                                                        Ubah
                                                                </button>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    @foreach($profil as $prof)

                                                    <div class="col-md-12">
                                                        <p><b>Nama</b></p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p>{{$prof->namaDosen}}</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p><b>NIP</b></p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p>{{$prof->nip}}</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p><b>Email</b></p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p>{{$prof->email}}</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p><b>No HP</b></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>{{$prof->hpDosen}}</p>
                                                    </div>

                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade bd-modal-lg" id="updateProfilDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Profil Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <form class="form-horizontal" action="{{ route('profile.update', 'edit')}}"
                      method="post"
                      enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                <div class="modal-body">
                    <div class="tile-body">
                        <input type="hidden" name="id_dosen" id="id">
                        <div class="row">
                            <div class="col-md-12"><b>Email</b>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><b>Nomor HP</b>
                                <div class="form-group">
                                    <input class="form-control" type="number" name="hpDosen" id="hp">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('#updateProfilDosen').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var email = button.data('email')
                var hp = button.data('hp')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #email').val(email)
                modal.find('.modal-body #hp').val(hp)
            });

        </script>
    @endpush

@endsection
