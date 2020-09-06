@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Detail Undangan</h1>
    </div>

    <div class="col-12">
        <div class="row text-center">
            <div class="col-1">
                <a href="/mahasiswa/undangan">
                <i class="fa fa-lg fa-arrow-left" aria-hidden="true" style="transform: scale(2.1,1.5);"></i></a>
                <br>
                <br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-10 offset-1 mb-4">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <div class="col-12">
                        <div class="row">

                            <div class="col-md-8">
                                <h6 class="m-0 font-weight-bold text-primary">Undangan Kelompok</h6>
                            </div>

                        </div>
                    </div>
                </div>

                @foreach($undangan as $und)
                <div class="card-body" style="color:black;">
                    <div class="row">
                        <div class="col-6"><b>Kelas Proyek</b>
                            <div class="form-group">
                                <select class="form-control" name="kelasProyek_id" id="kelas" disabled style="border: white">
                                    <option>{{$und -> namaKelasProyek}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6"><b>Periode</b>
                            <div class="form-group">
                                <select class="form-control" name="periode_id" id="periode" disabled>
                                    <option>{{$und -> tahunAjaran}} | {{$und -> semester}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6"><b>Project Manager</b>
                            <div class="form-group">
                                <input class="form-control" type="text" name="pm" value="{{$und->pm}}" disabled>
                            </div>
                        </div>
                        <div class="col-6"><b>Status Kelompok</b>
                            <div class="form-group">
                                <input class="form-control" type="text" name="statusKelompok" value="{{$und->statusKelompok}}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12"><b>Anggota Kelompok</b>
                            <div class="form-group" style="background-color:#EAECF4; border-radius:8px; padding:6px 12px; border:1px solid #d1d3e2; " >
                            @if($angg > 0)
                            @foreach($anggota as $ang)
                                    @foreach($Mpro as $mpr)
                                            @if($ang->mahasiswaProyek_id == $mpr->id_mahasiswaProyek && $und->kelompokProyek_id == $ang->kelompokProyek_id && $ang->statusAnggota == "Aktif")
                                            <div id="id">{{$mpr->namaMahasiswa}} </div>
                                            @endif
                                    @endforeach
                            @endforeach
                            @else
                            <div> <h5>Belum ada anggota  </h5> </div>
                            </div>
                            @endif
                        </div>
                    </div>
                        <div class="col-12">
                            <div class="row">
                                @if($pro > 0) 
                                <div class="col-9"><b>Judul Pilihan</b>
                                    <div class="form-group" style="background-color:#EAECF4; border-radius:8px; padding:6px 12px; border:1px solid #d1d3e2; " >
                                        @foreach($propil as $props)
                                                @if($props->kelompokProyek_id == $und->kelompokProyek_id)
                                                    @foreach($proyek as $pros)
                                                        @if($pros->id_proyek == $props->proyek_id)
                                                        <div>{{$pros->judul}}</div>                                      
                                                        @endif
                                                    @endforeach
                                                @endif
                                        @endforeach
                                        @if($usul != NULL)
                                            @foreach($usul as $us)
                                                    @if($us->kelompokProyek_id == $und->kelompokProyek_id)
                                                        {{$us->judulUsul}} (Usul)
                                                    @else
                                                    Belum memilih judul
                                                    @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="col-3"><b>Prioritas</b>
                                    <div class="form-group" style="background-color:#EAECF4; border-radius:8px; padding:6px 12px; border:1px solid #d1d3e2; ">                          
                                    @foreach($propil as $props)
                                        @foreach($undangan as $und)
                                            @if($props->kelompokProyek_id == $und->kelompokProyek_id)                                                    
                                                <div>{{$props->prioritas}}</div>                                       
                                            @endif
                                        @endforeach
                                    @endforeach
                                    @if(count($usul) > 0)
                                            1
                                    @endif
                                    </div>
                                </div>
                                @else
                                <div class="col-12"><b>Judul Pilihan</b>
                                    <div class="form-group" style="background-color:#EAECF4; border-radius:8px; padding:6px 12px; border:1px solid #d1d3e2; " >
                                    Belum memilih judul proyek  
                                    </div>
                                </div>
                                @endif 
                            </div>  
                            
                        </div>

                    <div class="col-12"><hr></div>

                    <div class="col-12">
                    <br>
                        <div class="row">
                            <div class="col-6 text-center">
                            <form class="accept" method="post" action="{{ route('anggota.kelompok.update', $und->id_anggotaKelompok)}}" 
                                enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                <input type="hidden" name="id_anggotaKelompok" id="idang">
                                <button type="submit" class="btn btn-primary delete-btn accept-confirm">
                                Terima
                                    <i class="fa fa-fw fa-lg fa-check">
                                    </i>
                                </button>
                            </form>    
                            </div>
                            <div class="col-6 text-center">
                        
                            <form class="delete" action="{{ route('undangan.tolak', $und->id_anggotaKelompok)}}" method="post">
                                <input type="hidden" name="_method" value="delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn delete-confirm">
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
                @endforeach

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
                    title: 'Anda yakin menolak undangan?',
                    icon: 'warning',
                    buttons: ["Batal", "Ya!"],
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        self.parents(".delete").submit();
                    } 
                });
            });

            $('.accept-confirm').on('click', function (event) {
                event.preventDefault();
                const self = $(this);
                swal({
                    title: 'Anda yakin menerima undangan?',
                    icon: 'warning',
                    buttons: ["Batal", "Ya!"],
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        self.parents(".accept").submit();
                    } 
                });
            });
    </script>

    @endpush


@endsection
