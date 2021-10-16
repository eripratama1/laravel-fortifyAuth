@extends('layouts.auth',['title' => 'Lupa Password'])

@section('content')
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{ asset('skydash/images/logo.svg') }}" alt="logo">
                        </div>
                        <h4>Laravel Fortify Authenticated</h4>
                        <h6 class="font-weight-light">Lupa Password ? Lakukan reset password hanya beberapa langkah saja</h6>
                        <form class="pt-3" action="{{ route('password.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="token"
                                value="{{ $request->route('token') }}">
                            @if (session('status'))
                                <div class="alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="email" name="email"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    id="exampleInputEmail1" value="{{$request->email ?? old('email')}}">
                                @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Password Baru">
                                @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="password_confirmation"
                                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Konfirmasi Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    type="submit">ATUR ULANG SANDI</button>
                            </div>

                            <div class="text-right mt-4 font-weight-light">
                                <a href="{{ route('login') }}" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
@endsection
