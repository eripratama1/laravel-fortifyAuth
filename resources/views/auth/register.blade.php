@extends('layouts.auth',['title'=>'Register'])

@section('content')
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{ asset('skydash/images/logo.svg') }}" alt="logo">
                        </div>
                        <h4>Pengguna Baru?</h4>
                        <h6 class="font-weight-light">Registrasi sangat mudah. Hanya perlu beberapa langkah </h6>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Nama Lengkap">
                                @error('name')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <input type="email" name="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" name="username"
                                    class="form-control form-control-lg @error('username') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Username">
                                @error('username')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Kata Sandi">
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
                            <div class="mb-4">
                                <div class="form-group ml-4">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Saya setuju dengan semua persyaratan dan semua kondisi.
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Registrasi</button>
                            </div>
                            <div class="mb-2 mt-2">
                                <a href="{{ route('google_socialite') }}" class="btn btn-block btn-google auth-form-btn">
                                    <i class="ti-google mr-2"></i>Masuk dengan google
                                </a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
@endsection
