@extends('layouts.auth',['title' => 'Login'])

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
                        <h6 class="font-weight-light">Masuk untuk lanjut</h6>
                        <form class="pt-3" action="{{ route('login') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Input Username atau Email">
                                @error('email')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    id="exampleInputPassword1" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror

                            </div>
                            <div class="mt-2">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    type="submit">MASUK</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between">
                                <div class="form-group">
                                    <input type="checkbox" name="remember">
                                    <label for="" class="form-check-label">Ingat Saya</label>
                                </div>
                                <a href="{{ route('password.email') }}" class="float-right text-black">Lupa Password?</a>
                            </div>
                            <div class="mb-2">
                                <a href="{{ route('google_socialite') }}" class="btn btn-block btn-google auth-form-btn">
                                    <i class="ti-google mr-2"></i>Masuk dengan google
                                </a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Belum punya Akun? <a href="{{ route('register') }}" class="text-primary">Registrasi</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
@endsection
