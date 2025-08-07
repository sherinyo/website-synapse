@extends('base.base')

@section('content')

<main class="container my-5">

  <div class="mb-4">
    <a href="{{ url()->previous() }}" class="text-decoration-none text-dark fw-bold">
      &larr; back
    </a>
  </div>

  <div class="bg-light p-5 rounded-3 mb-5"> {{-- tambah img dll --}}
    <h1 class="display-4 fw-bold">Event #1</h1>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <h2 class="fw-bold mb-4">Deskripsi</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
      </p>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-6 mb-3">
      <div class= "p-3 rounded-3 d-flex align-items-center" style= "background-color: #D0E3FF">
        <i class="bi bi-calendar-event-fill me-3 fs-4" style="color: #081F5C"></i>
        <span class="fw-bold">20 Agustus 2025 - 21 Agustus 2025</span>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="p-3 rounded-3 d-flex align-items-center" style= "background-color: #D0E3FF">
        <i class="bi bi-geo-alt-fill me-3 fs-4"  style="color: #081F5C"></i>
        <span class="fw-bold">QWWERTyy</span>
      </div>
    </div>
  </div>

</main>

@endsection