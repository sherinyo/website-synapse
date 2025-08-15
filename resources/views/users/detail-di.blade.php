@extends('base.base')

@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tentang - DI</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
      background-color: #ffffff;
    }

    .cont-banner {
      width: 100%;
      height: 400px;
      background-color: #d9d9d9;
    }

    .sec-anggota, .sec-tugas, .sec-proker {
      margin-top: 60px;
    }

    .cont-anggota h1,
    .cont-tugas h1,
    .cont-proker h1 {
      font-weight: 800;
      color: #081F5C;
      font-size: 40px;
      margin-bottom: 10px;
    }

    .line {
      height: 3px;
      background-color: #344EAD;
      margin-bottom: 25px;
    }

    .card-anggota {
      position: relative;
      height: 393px;
      background-color: #ffffff;
      border: 3px solid #344EAD;
      border-radius: 20px;
      overflow: hidden;
    }

    .card-anggota img {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 1;
    }

    .member-overlay {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 50%;
      padding: 20px;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
      color: white;
      z-index: 2;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
    }

    .card-anggota h3 {
      font-weight: 600;
      font-size: 20px;
    }

    .card-anggota p {
      font-weight: 300;
      font-size: 16px;
    }

    .card-tugas {
      background-color: #F7F2EC;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
      display: flex;
      align-items: center;
      gap: 25px;
      border-radius: 20px;
      padding: 20px;
    }

    .card-tugas i {
      color: #344ead;
      font-size: 45px;
    }

    .card-tugas p {
      font-size: 24px;
      color: #565353;
      font-weight: 600;
      margin: 0;
    }

    .card-proker {
      background-color: #D0E3FF;
      border-left: 4px solid #344EAD;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
      border-radius: 20px;
      padding: 30px;
      margin-bottom: 100px;
    }

    .card-proker h2 {
      font-size: 40px;
      font-weight: 700;
      color: #344EAD;
    }

    .card-proker p {
      font-size: 25px;
      font-weight: 600;
      letter-spacing: 1px;
      color: #565353;

    }
  </style>
</head>
<body>

  <section class="sec-banner">
    <div class="cont-banner"></div>
  </section>

  <section class="sec-anggota container">
    <h1>Anggota Divisi</h1>
    <div class="line w-100"></div>
    <div class="row g-4">
      @for ($i = 1; $i <= 4; $i++)
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="card-anggota">
            <img src="ekkin-narkoboy.jpg" alt="Ekkin">
            <div class="member-overlay">
              <h3>Nama Anggota {{ $i }}</h3>
              <p>{{ $i == 1 ? 'Ketua Divisi' : 'Anggota' }}</p>
            </div>
          </div>
        </div>
      @endfor
    </div>
  </section>

  <section class="sec-tugas container">
    <h1>Tugas & Tanggung Jawab</h1>
    <div class="line w-100"></div>
    <div class="row gy-3">
      <div class="col-12">
        <div class="card-tugas">
          <i class="fas fa-check-circle"></i>
          <p>Mengembangkan dan memelihara website SU ISB.</p>
        </div>
      </div>
      <div class="col-12">
        <div class="card-tugas">
          <i class="fas fa-check-circle"></i>
          <p>Memberikan dukungan teknis untuk kegiatan organisasi.</p>
        </div>
      </div>
      <div class="col-12">
        <div class="card-tugas">
          <i class="fas fa-check-circle"></i>
          <p>Mendorong inovasi digital di kalangan anggota.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="sec-proker container">
    <h1>Program Kerja Unggulan</h1>
    <div class="line w-100"></div>
    <div class="row">
      <div class="col-12">
        <div class="card-proker">
          <h2>ISB Website Project</h2>
          <p>Membuat dan mengelola website SU ISB yang menyajikan informasi lengkap mengenai lomba, prestasi, program kerja, open recruitment, dan hal-hal lainnya yang berkaitan seputar ISB.</p>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
@endsection
