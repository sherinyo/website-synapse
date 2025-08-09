@extends('base.base')

@section('title', 'Login - Synapoint')

@section('content')
<section style="min-height: 100vh; background-color: #F2F0DE; display: flex; align-items: center;">
  <div class="container">
    <div class="row justify-content-center">

      <!-- Card Login -->
      <div class="col-md-6 col-lg-5">
        <div style="background-color: #ffffff; border-radius: 20px; padding: 40px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">

          <!-- Logo -->
          <div class="text-center mb-4">
            <img src="images/synapse.png" alt="Logo" style="width: 60px;">
            <h4 class="mt-3 fw-bold" style="color: #2E3192;">Login</h4>
          </div>

          <!-- Form -->
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label" style="color: #081F5C;">Email</label>
              <input type="email" name="email" id="email" class="form-control px-3 py-2 @error('email') is-invalid" required autofocus value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div> 
              @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label" style="color: #081F5C;">Password</label>
              <input type="password" name="password" id="password" class="form-control px-3 py-2" required>
            </div>

            <!-- Tombol Login -->
            <div class="d-grid mt-4">
              <button type="submit" class="btn py-2 fw-semibold" style="background-color: #081F5C; color: #F2F0DE;">
                Login
              </button>
            </div>
          </form>

          <!-- Link ke Register -->
          <div class="text-center mt-4">
            <p style="color: #3a3a3a;">Belum punya akun? <a href="{{ url('/signup') }}" style="color: #2E3192; font-weight: 600;">Daftar di sini</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
