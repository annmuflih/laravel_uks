@extends('layouts.app')

@section('content')
<div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow p-3 mb-5 bg-white rounded my-5">
          <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-form">
                    <div class="text-center">
                        <h1 class="mb-4 text-gray-900">Welcome To <span style="color: #4c60da" class="font-weight-bold">UKS</span> Website</h1>
                        <h4 class="text-gray-900 mb-4">{{ __('Login') }}</h4>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="user">
                        @csrf

                        {{-- Login dengan Email --}}
                        {{-- <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div> --}}

                        {{-- Login dengan Username --}}
                        <div class="form-group">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Enter Username">

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                        </div>

                        <hr>
                    </form>
                    <div class="text-center">
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
