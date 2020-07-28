@extends('layouts.welcome')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 black">
                    <div class="mt-5 mb-2"><h2>{{ __('Admin Login') }}</h2></div>
                    <div><h2>Sistem Informasi Kelas Proyek</h2></div>
                    <hr>
                    <div class="card-body mt-5">
                        <form method="POST" action="{{ route('admin.login.post') }}">
                            @csrf
                            <div class="form-group row text-left">
                                <div class="offset-1 col-10">
                                <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email@ugm.ac.id">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row text-left">
                                <div class="offset-1 col-10">
                                <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
