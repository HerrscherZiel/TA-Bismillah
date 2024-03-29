@extends('layouts.welcome')

@section('content')
    @php
    //dd(Session::all());

    //dd(Auth::guard('mahasiswa')->user());
    @endphp

    
    <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="my-0">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
    @endif
        <div class="row justify-content-center">
            <div class="col-10 black">
                <div class="mt-5 mb-2">        
                    <h2>{{ __('Login Mahasiswa') }}</h2>
                </div>
                <div><h2>Sistem Informasi Kelas Proyek</h2></div>
                <hr>
                <div class="card-body mt-5">
                    <form method="POST" action="{{ route('mahasiswa.login.post') }}">
                        @csrf
                        <div class="form-group row text-left">
                            <div class="offset-1 col-10">
                            <label for="username">{{ __('Username') }}</label>
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="NIU">
                                <!-- @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row text-left">
                            <div class="offset-1 col-10">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">
                                <!-- @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> -->
                                <!-- @endif -->
                                <p class="mt-2"> Lupa password ? Hubungi akademik </p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
