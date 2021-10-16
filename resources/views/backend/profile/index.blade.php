@extends('layouts.backend',['title' => 'Profile'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        @if (session('status') == 'profile-information-updated')
                            Profile has been updated
                        @endif

                        @if (session('status') == 'password-updated')
                            Password has been updated
                        @endif

                        @if (session('status') == 'two-factor-authentication-disabled')
                            Two factor authentication enabled.
                        @endif

                        @if (session('status') == 'Recovery-codes-generated')
                            Recovery codes generated
                        @endif

                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))
            <div class="col-md-5 mb-5">
                <div class="card shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold">
                            <i class="fas fa-keys"></i> TWO-FACTOR AUTHENTICATION
                        </h6>
                    </div>
                    <div class="card-body">
                        @if (!auth()->user()->two_factor_secret)

                            <form action="{{ url('user/two-factor-authentication') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary text-uppecase">Enable two factor</button>
                            </form>

                        @else
                            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mb-3 text-uppercase">
                                    Disable Two Factor
                                </button>
                            </form>
                            @if (session('status') == 'two-factor-authentication-enabled')
                                <p>Autentikasi dua faktor diaktifkan.Pindai kode QR berikut menngunakan aplikasi autentikasi
                                    ponsel anda</p>
                                <div class="mb-3">
                                    {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                </div>
                            @endif
                            <p>Simpan recovery code ini dengan aman.Ini dapat digunakan untuk memulihkan
                                akses ke akun anda jika perangkat autentikasi dua faktor anda hilang.
                            </p>
                            <blockquote>
                                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes),true) as $code)
                                {{ $code }}
                        @endforeach
                        </blockquote>

                        <form action="{{ url('user/two-factor-recovery-codes') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-dark text-uppercase">Regenerate recovery codes</button>
                        </form>
        @endif
    </div>
    </div>
    </div>
    @endif

    <div class="col-md-7">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-user-circle"></i> Edit Profile</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('user-profile-information.update') }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') ?? auth()->user()->name }}">
                        @error('name')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            value="{{ old('username') ?? auth()->user()->username }}">
                        @error('username')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') ?? auth()->user()->email }}">
                        @error('email')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary text-uppercase">Update profile</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow mt-3 mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-unlock"></i> UPDATE PASSWORD</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('user-password.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Current Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                            name="current_password">
                        @error('current_password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary text-uppercase">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
