@extends('base.base')

@section('title', 'Sign Up - Synapoint')

@section('content')
<section style="min-height: 100vh; background-color: #F2F0DE; display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-7 col-lg-6">
                <div style="background-color: #ffffff; border-radius: 20px; padding: 40px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">

                    <div class="text-center mb-4">
                        <img src="{{ asset('images/synapse.png') }}" alt="Logo" style="width: 60px;">
                        <h4 class="mt-3 fw-bold" style="color: #2E3192;">Sign Up</h4>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label" style="color: #081F5C;">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror px-3 py-2"
                                   value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label" style="color: #081F5C;">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror px-3 py-2"
                                   value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label" style="color: #081F5C;">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror px-3 py-2" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label" style="color: #081F5C;">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control px-3 py-2" required autocomplete="new-password">
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn py-2 fw-semibold"
                                    style="background-color: #081F5C; color: #F2F0DE;">
                                Daftar
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p style="color: #3a3a3a;">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" style="color: #2E3192; font-weight: 600;">Login di sini</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
