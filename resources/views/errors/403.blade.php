@extends('layouts.master')

@section('content')
    <div class="card-body">
        <div class="col-12 text-center">
            <div class="card-body" style="background-color:#EAECF4; border-radius:6px; color:black">
                <div class="page-error tile">
                    <h1><i class="fa fa-exclamation-circle mr-3"></i>403</h1>
                    <br>
                    <h2><p>Unauthorized Action</p></h2>
                    <br>
                    <p>
                    @if(Auth::guard('mahasiswa')->check())
                    <a class="btn btn-secondary ml-3" href="javascript:window.history.back();">Kembali</a>
                    @elseif(Auth::guard('dosen')->check())
                    <a class="btn btn-secondary ml-3" href="javascript:window.history.back();">Kembali</a>
                    @elseif(Auth::guard('admin')->check())
                    <a class="btn btn-secondary ml-3" href="javascript:window.history.back();">Kembali</a>
                    @else
                        <a class="btn btn-primary mr-3" href="/login">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
@endsection
