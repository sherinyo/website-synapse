@extends('base.base')

@section('content')
{{-- tolong tambah ke base <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"> --}}

<main class="container my-5">
  <div class="bg-light p-5 rounded-3 mb-5">
    <div class="mb-3">
      <span class="badge bg-white text-dark shadow-sm">Upcoming Event</span>
    </div>
    <p class="text-muted">
      <i class="bi bi-calendar-event-fill" style="color: #081F5C"></i>
      20 Agustus 2025 - 21 Agustus 2025
    </p>
    <h1 class="display-4 fw-bold">Event #1</h1>
  </div>


  <ul class="nav nav-tabs mb-4">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Event</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-muted" href="#">News</a>
    </li>
  </ul>

  <div class="row rounded-3">
    <div class="col-12 mb-4">
      <div class="card border-0 shadow-sm">
        <div class="row g-0">
          <div class="col-md-2 bg-light d-none d-md-block">
            </div>
          <div class="col-md-10">
            <div class="card-body p-4">
              <div class="d-flex align-items-center text-muted small mb-2">
                <i class="bi bi-calendar-event-fill px-2" style="color: #081F5C"></i>
                <span>20 Agustus 2025 - 21 Agustus 2025</span>
              </div>
              <h3 class="card-title h4 fw-bold">Event #1</h3>
              <div class="d-flex align-items-center text-muted small">
                <i class="bi bi-geo-alt-fill px-2"  style="color: #081F5C"></i>
                <span>Qwerty</span>
              </div>
              <a href="{{ url('/detailberita') }}" class="stretched-link"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 mb-4">
      <div class="card border-0 shadow-sm">
        </div>
    </div>
  </div>

  <nav class="d-flex justify-content-center">
    <ul class="pagination">
      <li class="page-item disabled"><a class="page-link" href="#">&larr;</a></li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&rarr;</a></li>
    </ul>
  </nav>

</main>
@endsection
