@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-lg-5 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Undangan</h1>
    </div>

    <div>
        <div class="row list">
            <div class="col-10 offset-1">
                <div class="row">

                @php $i=1;  @endphp
                @if(count($undangan) > 0)
                @foreach($undangan as $und)
                    <div class="col-md-6">
                        <div class="card shadow mb-4">

                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-md-8 my-auto">
                                        <h6 class="font-weight-bold text-primary m-0">Undangan Kelompok {{$i}}</h6>
                                    </div>
                                    <div class="col-md-4 text-primary text-right">
                                        <a type="button" class="btn btn-primary" href="/mahasiswa/undangan/detail/{{$und->id_kelompokProyek}}">
                                                                                Detail
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-4 text-left">
                                        Kelas Proyek
                                    </div>

                                    <div class="col-8 text-left">
                                        : {{$und->namaKelasProyek}}
                                    </div>

                                    <div class="col-4 text-left">
                                        Periode
                                    </div>

                                    <div class="col-8 text-left">
                                        : {{$und->tahunAjaran}} | {{$und->semester}}
                                    </div>

                                    <div class="col-4 text-left">
                                        Judul Prioritas
                                    </div>
                                    <div class="col-8 text-left">
                                        : 
                                        @php $a =0;  @endphp
                                        
                                        @foreach($propil as $props)
                                            @if($props->kelompokProyek_id == $und->kelompokProyek_id && $props->prioritas == "1")
                                                @foreach($proyek as $pros)
                                                    @if($pros->id_proyek == $props->proyek_id)
                                                        {{$pros->judul}}
                                                    @endif
                                                @php $a++ @endphp
                                                @endforeach
                                            @endif
                                        @endforeach
                                        @php $b =0;  @endphp
                                        @if($a == 0 && count($usul) > 0)
                                            @foreach($usul as $us)
                                                    @if($us->kelompokProyek_id == $und->kelompokProyek_id)
                                                        {{$us->judulUsul}}
                                                    @php $b++;  @endphp
                                                    @endif
                                            @endforeach
                                        @elseif($b == 0 && $a ==0)
                                        Belum memilih judul    
                                        @endif

                                    </div>
                                    <div class="col-4 text-left">
                                        Pengundang
                                    </div>
                                    <div class="col-8 text-left">
                                        : {{$und->pm}}
                                    </div>
                                  
                                    <div class="col-md-12"><hr></div>
                                    <div class="col-6 text-center">
                                            <form method="post" action="{{ route('anggota.kelompok.update', $und->id_anggotaKelompok)}}" 
                                                enctype="multipart/form-data">
                                                    @method('PATCH')
                                                    @csrf
                                                <input type="hidden" name="id_anggotaKelompok" id="idang">
                                                <button type="submit" class="btn btn-primary">
                                                Terima
                                                    <i class="fa fa-fw fa-lg fa-check">
                                                    </i>
                                                </button>
                                            </form> 
                                    </div>
                                    <div class="col-6 text-center">
                                        <form class="delete" action="{{ route('anggota.kelompok.destroy', $und->id_anggotaKelompok)}}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                            Tolak
                                                <i class="fa fa-fw fa-lg fa-times">
                                                </i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                @php $i++; @endphp
                
                @endforeach
                @else
                <div class="card-body">
                    <div class="col-12 text-center">
                        <div class="card-body" style="background-color:#EAECF4; border-radius:6px;">
                            <h5>Belum ada undangan kelompok proyek</h5>
                        </div>
                    </div>
                </div>
                @endif

                </div>
            </div>
        </div>
    </div>

    <!-- Modal detail undangan -->
    <div class="modal fade bd-modal-lg" id="detailUndangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Detail Undangan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                            <div class="modal-body">
                                <div class="tile-body">
                                    
                                </div>
                            </div>

                    </div>
                </div>
    </div>

        @push('scripts')
        <script>

            $('#detailUndangan').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var idang = button.data('idang')
                var kelas = button.data('kelas')
                var periode = button.data('periode')
                var pm = button.data('pm')
                var statuskel = button.data('statuskel')

                var modal = $(this)
                modal.find('.modal-body #id').val(id)
                modal.find('.modal-body #idang').val(idang)
                modal.find('.modal-body #kelas').val(kelas)
                modal.find('.modal-body #periode').val(periode)
                modal.find('.modal-body #pm').val(pm)
                modal.find('.modal-body #statuskel').val(statuskel)

            })
        </script>
    @endpush


@endsection
