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
                        <form class="pt-3" action="{{ route('password.email') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @if (session('status'))
                                <div class="alert-success" role="alert">
                                    {{session('status')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="email" name="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    id="exampleInputEmail1" placeholder="Input Email">
                                @error('email')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            
                            <div class="mt-2">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                    type="submit">RESET PASSWORD</button>
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
