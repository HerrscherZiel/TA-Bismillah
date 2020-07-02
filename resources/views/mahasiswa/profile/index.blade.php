@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Profile Mahasiswa</h1>
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-4 text-center">
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <div class="col-10">
                            <div class="col-7">
                                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tile">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="text-center">
                                                    <div class="card-body">
                                                    @foreach($profil as $prof)
                                                        <img class="img-fluid" src="{{asset('data_profilmhs/'.$prof->fileFoto)}}" style="height: auto; height: 200px" alt="Responsive image">
                                                    @endforeach
                                                        <br><span class="mr-2 d-none d-lg-inline text-gray-600 small">Ukuran foto maks AxA</span>
                                                    </div>
                                                    <form class="form-horizontal" action="{{ route('profile.update', 'edit')}}"
                                                            method="post"
                                                            enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf

                                                        @foreach($profil as $prof)
                                                            <input type="hidden" name="id_profilMahasiswa" value="{{$prof->id_profilMahasiswa}}">
                                                        @endforeach

                                                        <div class="col-12 ">
                                                            <div class="row">
                                                                <div class="col-12 my-auto">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="file" name="fileFoto" placeholder="Pilih Gambar">
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
                                                        <div class="col-12 text-center">
                                                            <h5><b>{{Auth::guard('mahasiswa')->user()->namaMahasiswa}}</b></h5>
                                                        </div>
                                                        <div class="col-12 text-center">
                                                            <h6> {{Auth::guard('mahasiswa')->user()->nim}} </h6>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <i class="fas fa-calendar fa-1x text-gray-300"></i>
                                                            <a>{{Auth::guard('mahasiswa')->user()->statusUser}}</a>
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

            <div class="col-lg-8 col-sm-12 mb-4">
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
                                                            <div class="row my-auto">
                                                                <div class="col-md-8">
                                                                    <h5> <b>Informasi Mahasiswa</b> </h5>
                                                                </div>
                                                                <div class="col-md-4 text-right ">
                                                                    @foreach($profil as $prof)
                                                                        <button class="btn btn-primary"
                                                                                data-id="{{$prof->id_profilMahasiswa}}"
                                                                                data-ipk="{{$prof->ipk}}"
                                                                                data-sks="{{$prof->sks}}"
                                                                                data-email="{{$prof->email}}"
                                                                                data-hp="{{$prof->hpMahasiswa}}"
                                                                                data-keahlian="{{$prof->keahlian}}"
                                                                                data-pengalaman="{{$prof->pengalaman}}"
                                                                                data-toggle="modal" data-target="#updateProfilMahasiswa">
                                                                            Ubah Profil
                                                                        </button>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>

                                                        @foreach($profil as $prof)
                                                        <table>
                                                        <div class="col-md-4">
                                                            <p><b>IPK</b> : {{$prof->ipk}}</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p><b>SKS</b> : {{$prof->sks}}</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p><b>HP</b> : {{$prof->hpMahasiswa}}</p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <br>
                                                            <h5><b>Email</b> </h5>
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p>{{$prof->email}} </p>
                                                            <br>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <h5><b>Keahlian</b> </h5>
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p>{{$prof->keahlian}} </p>
                                                            <br>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <h5><b>Pengalaman </b></h5>
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p>{{$prof->pengalaman}}</p>
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
    </div>


    <!-- Content Row -->

    <!-- Modal Update -->
    <div class="modal fade bd-modal-lg" id="updateProfilMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Profil Mahasiswa</h5>
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
                            <input type="hidden" name="id_profilMahasiswa" id="id">
                            <div class="row">
                                <div class="col-md-6"><b>IPK :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="ipk" id="ipk">
                                    </div>
                                </div>
                                <div class="col-md-6"><b>SKS :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="sks" id="sks">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"><b>Email :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" id="email">
                                    </div>
                                </div>
                                <div class="col-md-6"><b>Nomor HP :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="hpMahasiswa" id="hp">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Keahlian :</b>
                                    <div class="form-group">
                                        <textarea class="form-control" type="text" rows="4" name="keahlian" id="keahlian"> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Pengalaman :</b>
                                    <div class="form-group">
                                        <textarea class="form-control" type="text" rows="4" name="pengalaman" id="pengalaman"> </textarea>
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
         <script>
            $('#updateProfilMahasiswa').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var ipk = button.data('ipk')
                var sks = button.data('sks')
                var email = button.data('email')
                var hp = button.data('hp')
                var keahlian = button.data('keahlian')
                var pengalaman = button.data('pengalaman')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #ipk').val(ipk)
                modal.find('.modal-body #sks').val(sks)
                modal.find('.modal-body #email').val(email)
                modal.find('.modal-body #hp').val(hp)
                modal.find('.modal-body #keahlian').val(keahlian)
                modal.find('.modal-body #pengalaman').val(pengalaman)
            });
        </script>

    @endpush

@endsection
