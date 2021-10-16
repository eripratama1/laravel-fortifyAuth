@extends('layouts.auth',['title' => 'Confirm Password'])

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
                    
                    @if (session('status'))
                        <div class="alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                    
                    <div class="text-center">
                        <h1">CONFIRM PASSWORD</h1>
                    </div>

                    <form class="pt-3" action="{{ route('password.confirm') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                id="exampleInputEmail1" placeholder="Input Password">
                            @error('email')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        
                        <div class="mt-2">
                            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                type="submit">CONFIRM PASSWORD</button>
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