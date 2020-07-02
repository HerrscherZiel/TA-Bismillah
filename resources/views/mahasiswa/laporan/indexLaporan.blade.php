@extends('layouts.master')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mx-auto">
        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
    </div>

    <div class="row justify-content-md-center">

        <div class="col-lg-10 col-sm-12 mb-4">
            <div class="col-md-12">
                <div class="card shadow mb-4">


                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-8 my-auto">
                                <h6 class="font-weight-bold text-primary m-0">
                                    @php $i=1; @endphp
                                        @foreach($laporan as $lap)
                                        @if($i==1)
                                            {{$lap->judulPrioritas}}
                                            @php $i++; @endphp
                                        @endif
                                        @endforeach
                                </h6>
                            </div>
                             <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahLaporan">Tambah</button>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="table-test" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($laporan as $lap)
                                    <tr>
                                        <td>{{date('d-m-Y', strtotime($lap->tglMulai))}}</td>
                                        <td>{{date('d-m-Y', strtotime($lap->tglSelesai))}}</td>
                                        <td>{{date('d-m-Y', strtotime($lap->tglKirim))}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="/mahasiswa/laporan/detail/{{$lap->id_laporan}}">
                                                    <i class="fa fa-lg fa-eye">
                                                    </i>
                                                </a>
                                                <button class="btn btn-success"
                                                    data-idlap="{{$lap->id_laporan}}"
                                                    data-mulai="{{$lap->tglMulai}}"
                                                    data-selesai="{{$lap->tglSelesai}}"
                                                    data-kirim="{{$lap->tglKirim}}"
                                                    data-toggle="modal" data-target="#editLaporan">
                                                    <i class="fa fa-lg fa-edit">
                                                    </i>
                                                </button>
                                                <form class="delete" action="{{ route('laporan.destroy', $lap->id_laporan)}}" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger delete-btn" style="margin-left: -2px">
                                                        <i class="fa fa-lg fa-trash">
                                                        </i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
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

    <!-- Modal Tambah Laporan -->
    <div class="modal fade bd-modal-lg" id="tambahLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Laporan Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form method="post" action="{{ route('laporan.store')}}" enctype="multipart/form-data">
                            @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            

                            <div class="row">
                                <div class="col-md-12"><b>Tanggal Mulai :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglMulai" placeholder="Tanggal Mulai Laporan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Tanggal Selesai :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglSelesai" placeholder="Tanggal Selesai Laporan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Tanggal Kirim :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglKirim" placeholder="Tanggal Kirim Laporan">
                                    </div>
                                </div>
                            </div>
                            @foreach($laporan as $lap)
                                <input type="hidden"  type="text" name="kelompokProyek_id" value="{{$lap->id_kelompokProyek}}">
                            @endforeach
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="sumbit" class="btn btn-primary">Tambah</button>
                    </div>
                
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Update Laporan -->
    <div class="modal fade bd-modal-lg" id="editLaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form method="post" action="{{ route('laporan.proyek.update', 'edit')}}" 
                enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="tile-body">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Tanggal Mulai :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglMulai" id="mulai">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Tanggal Selesai :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglSelesai" id="selesai">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><b>Tanggal Kirim :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="tglKirim" id="kirim">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_laporan" id="idlap">
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

            $('#editLaporan').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var idlap = button.data('idlap')
                var mulai = button.data('mulai')
                var selesai = button.data('selesai')
                var kirim = button.data('kirim')


                var modal = $(this)
                modal.find('.modal-body #idlap').val(idlap)
                modal.find('.modal-body #mulai').val(mulai)
                modal.find('.modal-body #selesai').val(selesai)
                modal.find('.modal-body #kirim').val(kirim)

            });
        </script>
    
    @endpush
@endsection
