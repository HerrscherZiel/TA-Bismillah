@extends('layouts.master')

@section('content')
    <div class="page-error tile">
        <h1><i class="fa fa-exclamation-circle mr-3"></i>403</h1>
        <br>
        <h2><p>Unauthorized Action</p></h2>
        <br>
        <p><a class="btn btn-primary mr-3" href="{{url('/dosen/dashboard')}}">Go to Home</a>
            <a class="btn btn-secondary ml-3" href="javascript:window.history.back();">Go Back</a></p>
    </div>
@endsection
