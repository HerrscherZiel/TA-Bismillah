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
        <h1 class="h3 mb-0 text-gray-800">Informasi Kelompok</h1>
    </div>

    <div class="col-12">
        <div class="row text-center">
            <div class="col-1">
                <a href="/mahasiswa/proyek/kelompok">
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
                                <h6 class="m-0 font-weight-bold text-primary">Kelompok
                                @foreach($kelompok as $kel)
                                    @if($kel->judulPrioritas == "Belum ada judul")
                                        Proyek {{$kel->namaKelasProyek}}
                                    @else
                                        {{$kel->judulPrioritas}}
                                    @endif
                                @endforeach
                                </h6>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card-body" style="color:black;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <div class="row invoice-info mb-2">

                                    <div class="col-md-12">
                                        <div class="row">

                                        @foreach($kelompok as $kel)
                                        
                                            <div class="col-md-2 text-left">
                                                <b>Kelas Proyek</b>
                                            </div>
                                            <div class="col-md-4">
                                            : {{$kel->namaKelasProyek}}                                            
                                            </div>
                                            <hr>
                                            <div class="col-md-2 text-left">
                                                <b>Periode</b>
                                            </div>
                                            <div class="col-md-4">
                                            : @foreach($periode as $per)
                                                @if($per->id_periode == $kel->periode_id)
                                                    {{$per->tahunAjaran}} | {{$per->semester}}
                                                @endif
                                            @endforeach
                                            </div>
                                            <hr>
                                            <div class="col-md-2 text-left">
                                               <b> Judul</b>
                                            </div>
                                            <div class="col-md-4">
                                                : @if($kel->judulPrioritas == null)
                                                Belum ada judul
                                            @else
                                                {{$kel->judulPrioritas}}
                                            @endif
                                            </div>
                                            <hr>
                                            <div class="col-md-2 text-left">
                                                <b>Pembimbing</b>
                                            </div>
                                            <div class="col-md-4">
                                            : @if($kel->dosen_id == null)
                                                Belum ada pembimbing
                                            @else
                                                @foreach($dosen as $dos)
                                                    @if($dos->id_dosen == $kel->dosen_id)
                                                        {{$dos->namaDosen}}
                                                    @endif
                                                @endforeach
                                            @endif
                                            </div>
                                            <hr>
                                            
                                                <div class="col-md-2 text-left">
                                                    <b>Project Manager</b>
                                                </div>
                                                <div class="col-md-4">
                                                    : {{$kel->pm}}<br>
                                                </div>
                                                <!-- <div class="col-md-1 text-left">
                                                    <div class="btn-group">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#updateModal">
                                                            <i class="fa fa-lg fa-edit">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div> -->

                                            <hr>
                                            <div class="col-md-2 text-left">
                                                <b>Status</b>
                                            </div>
                                            <div class="col-md-4">
                                                : {{$kel->statusKelompok}}
                                            </div>

                                        @endforeach    
                                            <hr>
                                        </div>
                                    </div>

                                    @foreach($kelompok as $kel)
                                        @if($kel->statusKelompok != "Menunggu Persetujuan")
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3 text-left">
                                                        <b> Laporan : </b>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body col-12">
                                                <div class="card-header py-3">
                                                    <div class="row">
                                                        <div class="col-md-8 my-auto">
                                                            <h6 class="font-weight-bold text-primary m-0">Laporan</h6>
                                                        </div>

                                                        <div class="col-md-4 text-right">
                                                            @foreach($kelompok as $kel)
                                                            <a type="button" class="btn btn-primary" href="/mahasiswa/laporan/index/{{$kel->id_kelompokProyek}}">
                                                                Lebih Lengkap
                                                            </a>
                                                            @endforeach
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahLaporan">Tambah</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                <div class="col-12 table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Tanggal Mulai</th>
                                                            <th>Tanggal Selesai</th>
                                                            <th>Tanggal Kirim</th>
                                                            <th>Action</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @if(count($laporan) > 0)
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
                                                                        <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm('Apakah anda yakin ?')" style="margin-left: -2px">
                                                                            <i class="fa fa-lg fa-trash">
                                                                            </i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="4">Belum ada laporan</td>                                                       
                                                        </tr>
                                                        @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <b>Anggota Kelompok</b> :
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body col-12">
                                        <div class="card-header py-3">
                                            <div class="row">
                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Anggota
                                                    ( {{$jumAnggota}} 
                                                    / 
                                                    @foreach($maksAnggota as $maks) 
                                                        {{$maks->maksAnggota}} )
                                                    @endforeach
                                                    </h6>
                                                </div>
                                               
                                                <div class="col-md-4 text-right">
                                                @if($kel->statusKelasProyek == "Pendaftaran")
                                                    @foreach($kelompok as $idPm)
                                                        @if($idPm->mProKelompok == $idPm->id_mahasiswaProyek)
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahAnggota">
                                                            Tambah</button>
                                                        @endif
                                                    @endforeach   
                                                @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 table-responsive text-center">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr style="color:black;">
                                                        <th>Nama Anggota</th>
                                                        <th>NIM</th>
                                                        <th>Status Anggota</th>
                                                        @if($kel->statusKelasProyek == "Pendaftaran")
                                                            @foreach($kelompok as $idPm)
                                                                @if($idPm->mProKelompok == $idPm->id_mahasiswaProyek)
                                                                    <th>Action</th>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                @foreach($anggotaKelompok as $angkel)
                                                    <tr>
                                                        <td>
                                                        {{$angkel->namaMahasiswa}}
                                                        </td>
                                                        <td>
                                                        {{$angkel->nim}}    
                                                        </td>
                                                        <td>
                                                        {{$angkel->statusAnggota}}    
                                                        </td>
                                                        @if($kel->statusKelasProyek == "Pendaftaran")
                                                            @foreach($kelompok as $idPm)
                                                                @if($idPm->mProKelompok == $idPm->id_mahasiswaProyek)
                                                                    @if($idPm->pm != $angkel->namaMahasiswa)
                                                                    <td>
                                                                        <div class="text-center">
                                                                            <div class="btn-group">
                                                                                <form class="delete" action="{{ route('anggota.kelompok.destroy', $angkel->id_anggotaKelompok)}}" method="post">
                                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <button type="submit" class="btn btn-danger delete-btn" onclick="return confirm('Apakah anda yakin ?')" style="margin-left: -2px">
                                                                                        <i class="fa fa-lg fa-trash">
                                                                                        </i>
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    @else
                                                                    <td> - </td>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </tr>                                          
                                                @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <b> Judul Pilihan : </b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body col-12">
                                        <div class="card-header py-3">
                                            <div class="row">
                                                <div class="col-md-8 my-auto">
                                                    <h6 class="font-weight-bold text-primary m-0">Judul Pilihan</h6>
                                                </div>

                                                <div class="col-md-4 text-right">
                                                @if($kel->statusKelasProyek == "Pendaftaran")
                                                    @foreach($kelompok as $idPm)
                                                        @if($idPm->mProKelompok == $idPm->id_mahasiswaProyek)
                                                            @if($jumlahPilihan < 2)
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahJudul">Tambah</button>
                                                            @else
                                                                @if($jumUsul == 0)
                                                                    <button class="btn btn-success"
                                                                        data-toggle="modal" data-target="#updateJudulPilihan">
                                                                    Ubah
                                                                    </button>
                                                                @endif
                                                                @foreach($usul as $usl)                                                           
                                                                <button class="btn btn-success"
                                                                        data-id="{{$usl->id_usulMahasiswa}}"
                                                                        data-judulusul="{{$usl->judulUsul}}"
                                                                        data-deskripsi="{{$usl->deskripsi}}"
                                                                        data-toggle="modal" data-target="#updateJudulPilihan">
                                                                    Ubah
                                                                </button>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 table-responsive text-center">
                                                <table class="table table-bordered" id="sampleTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Judul</th>
                                                        <th>Deskripsi</th>
                                                        <th>Prioritas</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>                                                
                                                        @if($jumlahPilihan == 3)
                                                            @foreach($judulPilihan as $pilihan)
                                                            <tr>
                                                                <td>{{$pilihan->judul}}</td>
                                                                <td>
                                                                    <p>{{$pilihan->deskripsi}}</p>
                                                                </td>
                                                                <td>{{$pilihan->prioritas}}</td>
                                                            </tr>
                                                            @endforeach
                                                        @elseif($jumlahPilihan == 2)
                                                            @foreach($judulPilihan as $pilihan)
                                                                <tr>
                                                                    <td>{{$pilihan->judul}}</td>
                                                                    <td>
                                                                        <p>{{$pilihan->deskripsi}}</p>
                                                                    </td>
                                                                    <td>{{$pilihan->prioritas}}</td>
                                                                </tr>
                                                            @endforeach
                                                                <tr>@foreach($usul as $usl)
                                                                    <td>{{$usl->judulUsul}}</td>
                                                                    <td>{{$usl->deskripsi}}</td>
                                                                    <td>Usul</td>
                                                                    @endforeach
                                                                </tr>
                                                        @else
                                                            <tr>
                                                                <td colspan="3">Belum ada judul pilihan</td>                                                       
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
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
    </div>


    <!-- Modal Create Anggota -->
    <div class="modal fade bd-modal-lg" id="tambahAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        
        @foreach($maksAnggota as $maks) 
          @php $max = $maks->maksAnggota @endphp;
        @endforeach

        @if($jumAnggota == $max)
            <div class="modal-content">

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row text-center">
                            <div class="col-12">
                                <br>
                                <div class="col-4 offset-4">
                                    <i class="fa fa-lg fa-exclamation-circle fa-6x"> </i>
                                </div>
                                </button>
                                <br>
                                <hr>
                            </div>
                            <div class="col-12">
                                <h5 class="modal-title text-center" id="exampleModalCenterTitle">Sudah Mencapai Jumlah Maksimal Anggota!</h5>
                            <hr>
                            </div>

                            <div class="col-12">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                 </div>

            </div>
         
        @else

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Undang Anggota Kelompok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('anggota.kelompok.store')}}" enctype="multipart/form-data">
                    @csrf

                <div class="modal-body">
                    <div class="tile-body">
                    @foreach($kelompok as $idkel)
                        <input type="hidden"  type="text" name="kelompokProyek_id" value="{{$idkel->id_kelompokProyek}}">
                    @endforeach    
                        <div class="row">
                            <div class="col-md-12"><b>Pilih Mahasiswa</b>
                                <div class="form-group">
                                    <select class="form-control selectbox" name="mahasiswaProyek_id" required="" style="width: 100%">
                                        @foreach($anggota as $mhsPro)
                                            {{preg_match('~/(.*?)/SV~', $mhsPro->nim, $output),
                                                $a = strval($output[1])}}
                                        <option value="{{$mhsPro->id_mahasiswaProyek}}">{{$mhsPro->namaMahasiswa}} ({{$a}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="statusAnggota" value="Menunggu Konfirmasi">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Undang</button>
                </div>

                </form>

            </div>
        @endif    
        </div>
    </div>

    <!-- Modal Tambah Judul -->
    <div class="modal fade bd-modal-lg" id="tambahJudul" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Pilih Judul Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
            <form method="post" action="{{ route('proyek.pilihan.store')}}" enctype="multipart/form-data">
                    @csrf

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                        @foreach($kelompok as $idkel)
                        <input type="hidden"  type="text" name="kelompokProyek_id" value="{{$idkel->id_kelompokProyek}}">
                        @endforeach
                            <div class="col-8"><b>Judul 1 :</b>
                                <div class="form-group">
                                    <select class="form-control" name="proyek_id[]" required="" style="width: 100%">
                                        @foreach($judul as $jud)
                                        <option value="{{$jud->id_proyek}}">{{$jud->judul}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4"><b>Prioritas :</b>
                                <div class="form-group">
                                    <select class="form-control" name="prioritas[]" required="" style="width: 100%">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-8"><b>Judul 2 :</b>
                                <div class="form-group">
                                    <select class="form-control" name="proyek_id[]" required="" style="width: 100%">
                                        @foreach($judul as $jud)
                                        <option value="{{$jud->id_proyek}}">{{$jud->judul}}</option>
                                        @endforeach
                                    </select>                                        
                                </div>
                            </div>
                            <div class="col-4"><b>Prioritas :</b>
                                <div class="form-group">
                                <select class="form-control" name="prioritas[]" required="" style="width: 100%">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                </select>
                                </div>
                            </div>

                            <div class="col-8"><b>Judul 3 :</b>
                                <div class="form-group">
                                <select class="form-control" name="proyek_id[]" required="" id="judul3" style="width: 100%">
                                        @foreach($judul as $jud)
                                        <option value="{{$jud->id_proyek}}">{{$jud->judul}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2"><b>Prioritas :</b>
                                <div class="form-group">
                                <select class="form-control" name="prioritas[]" required="" style="width: 100%">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-2"><b>Usul :</b>
                                <div class="form-group">
                                <select class="form-control" onchange="showDiv(this)" style="width: 100%">
                                    <option value="2">Pilih</option>
                                    <option value="1">Usul</option>
                                </select>
                                </div>
                            </div>

                            <div class="col-12" id="hidden_div" style="display: none;">
                                <hr>
                                <b>Judul Usul :</b>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="judulUsul" placeholder="Judul Proyek">
                                </div>
                                <b>Deskripsi Singkat :</b>
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" name="deskripsi" placeholder="Deskripsi Proyek"></textarea>
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

    <!-- Modal Update Judul -->
    <div class="modal fade bd-modal-lg" id="updateJudulPilihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Judul Pilihan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{ route('proyek.pilihan.update', 'edit')}}" 
                enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                <div class="modal-body">
                    <div class="tile-body">
                        <div class="row">
                        
                        @php $i=1; @endphp
                        
                        @if($jumlahPilihan == 3)            

                            @foreach($judulPilihan as $pil)

                            <input type="hidden"  type="text" name="kelompokProyek_id[]" value="{{$pil->kelompokProyek_id}}">
                            <input type="hidden"  type="text" name="id_proyekPilihan[]" value="{{$pil->id_proyekPilihan}}">
                                @foreach($usul as $us)
                                <input type="hidden"  type="text" name="id_usulMahasiswa" value="{{$us->id_usulMahasiswa}}">
                                @endforeach
                                
                                @if($i == 3)
                                    <div class="col-7"><b>Judul {{$i}} :</b>
                                        <div class="form-group">
                                            <select class="form-control" id="judulke3" name="proyek_id[]" required="" style="width: 100%">
                                                <option value="{{$pil->proyek_id}}">{{$pil->judul}}</option>
                                                @foreach($judul as $jud)
                                                <option value="{{$jud->id_proyek}}">{{$jud->judul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3"><b>Prioritas :</b>
                                        <div class="form-group">
                                            <select class="form-control" name="prioritas[]" required="" style="width: 100%">
                                                <option>{{$pil->prioritas}}</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-2"><b>Usul :</b>
                                        <div class="form-group">
                                        <select class="form-control" onchange="showDivs2(this)" style="width: 100%">
                                            <option value="2">Pilih</option>
                                            <option value="1">Usul</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-12" id="hidden_divs2" style="display: none;">
                                        <hr>
                                        <input type="hidden" name="id_usulMahasiswa" id="idusul">
                                        <b>Judul Usul :</b>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="judulUsul" id="judulusul2" placeholder="Judul Proyek">
                                        </div>
                                        <b>Deskripsi Singkat :</b>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="6" name="deskripsi" id="deskripsi2" placeholder="Deskripsi Proyek"></textarea>
                                        </div>
                                    </div>
                            
                                @else

                                    <div class="col-8"><b>Judul {{$i}} :</b>
                                        <div class="form-group">
                                            <select class="form-control" name="proyek_id[]" required="" style="width: 100%">
                                                <option value="{{$pil->proyek_id}}">{{$pil->judul}}</option>
                                                @foreach($judul as $jud)
                                                <option value="{{$jud->id_proyek}}">{{$jud->judul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4"><b>Prioritas :</b>
                                        <div class="form-group">
                                            <select class="form-control" name="prioritas[]" required="" style="width: 100%">
                                                <option>{{$pil->prioritas}}</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                    </div>
                                    @php $i++ @endphp

                                @endif

                            @endforeach
                          
                        @elseif($jumlahPilihan == 2)

                            @foreach($judulPilihan as $pil)
                                <input type="hidden"  type="text" name="kelompokProyek_id[]" value="{{$pil->kelompokProyek_id}}">
                                <input type="hidden"  type="text" name="id_proyekPilihan[]" value="{{$pil->id_proyekPilihan}}">
                                @foreach($usul as $us)
                                <input type="hidden"  type="text" name="id_usulMahasiswa" value="{{$us->id_usulMahasiswa}}">
                                @endforeach        

                                    <div class="col-8"><b>Judul {{$i}} :</b>
                                        <div class="form-group">
                                            <select class="form-control" name="proyek_id[]" required="" style="width: 100%">
                                                <option value="{{$pil->proyek_id}}">{{$pil->judul}}</option>
                                                @foreach($judul as $jud)
                                                <option value="{{$jud->id_proyek}}">{{$jud->judul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4"><b>Prioritas :</b>
                                        <div class="form-group">
                                            <select class="form-control" name="prioritas[]" required="" style="width: 100%">
                                                <option>{{$pil->prioritas}}</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                    </div>
                                @php $i++ @endphp
                            @endforeach

                                    <div class="col-8"><b>Judul 3 :</b>
                                        <div class="form-group">
                                            <select class="form-control" id="judulbaru" name="proyek_id[]" disabled="" required="" style="width: 100%">
                                                @foreach($judul as $jud)
                                                <option value="{{$jud->id_proyek}}">{{$jud->judul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                <div class="col-2"><b>Prioritas :</b>
                                    <div class="form-group">
                                        <select class="form-control" name="prioritas[]" required="" style="width: 100%">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                
                                <div class="col-2"><b>Usul :</b>
                                    <div class="form-group">
                                    <select class="form-control" onchange="showDivs(this)" style="width: 100%">
                                        <option value="2">Usul</option>
                                        <option value="1">Pilih</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-12" id="hidden_divs" style="display: block;">
                                    <hr>
                                    <input type="hidden" name="id_usulMahasiswa" id="idusul">
                                    <b>Judul Usul :</b>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="judulUsul" id="judulusul2" placeholder="Judul Proyek">
                                    </div>
                                    <b>Deskripsi Singkat :</b>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="6" name="deskripsi" id="deskripsi2" placeholder="Deskripsi Proyek"></textarea>
                                    </div>
                                </div>

                        @endif

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
                            @foreach($kelompok as $kel)
                                <input type="hidden"  type="text" name="kelompokProyek_id" value="{{$kel->id_kelompokProyek}}">
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

            $('#updateJudulPilihan').on('show.bs.modal', function (event) {

                // console.log('modal opened');
                var button = $(event.relatedTarget)

                var id = button.data('id')
                var judulusul = button.data('judulusul')
                var deskripsi = button.data('deskripsi')

                var modal = $(this)
                modal.find('.modal-body #idusul').val(id)
                modal.find('.modal-body #judulusul2').val(judulusul)
                modal.find('.modal-body #deskripsi2').val(deskripsi)
            
            });

            $(document).ready(function(){
            $('select').on('change', function(event ) {
                var prevValue = $(this).data('previous');
            $('select').not(this).find('option[value="'+prevValue+'"]').show();    
                var value = $(this).val();
            $(this).data('previous',value); $('select').not(this).find('option[value="'+value+'"]').hide();
                });
            });

            function showDiv(select){
                if(select.value==1){
                    document.getElementById('hidden_div').style.display = "block";
                    document.getElementById("judul3").disabled = true;
                } else{
                    document.getElementById('hidden_div').style.display = "none";
                    document.getElementById("judul3").disabled = false;
                }
            } 

            function showDivs(select){
                if(select.value==2){
                    document.getElementById('hidden_divs').style.display = "block";
                    document.getElementById("judulbaru").disabled = true;
                } else{
                    document.getElementById('hidden_divs').style.display = "none";
                    document.getElementById("judulbaru").disabled = false;
                }
            } 

            function showDivs2(select){
                if(select.value==2){
                    document.getElementById('hidden_divs2').style.display = "none";
                    document.getElementById("judulke3").disabled = false;
                } else{
                    document.getElementById('hidden_divs2').style.display = "block";
                    document.getElementById("judulke3").disabled = true;
                }
            } 

        </script>
    
    @endpush



@endsection
