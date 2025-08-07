@extends('base.base')

@section('title', 'Synapoint')

<!-- Banner -->
  <section style="background-color: #d9d9d9; height:400px; margin-bottom:60px;">
  </section>

  <!-- Section Penjelasan -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">

        <!-- Gambar -->
        <div class="col-lg-4 text-center mb-4 mb-lg-0">
          <img src="images/synapse.png" alt="Logo Synapse" style="max-width: 400px;" />
        </div>

        <!-- Konten Teks -->
        <div class="col-lg-8">
          <h5 class="fw-bold mb-3" style="color: #2E3192;">Apa itu Synapse Point?</h5>
          <p style="color: #3a3a3a; line-height: 1.7;">
            Synapse Point adalah sistem penghargaan yang kami buat khusus untuk seluruh mahasiswa ISB yang aktif dan berpartisipasi dalam berbagai kegiatan kampus.
            Anggap saja ini sebagai “mata uang” prestasi dan keaktifanmu. Setiap kali kamu mengikuti acara, menjadi panitia, atau berkontribusi dalam kegiatan yang kami selenggarakan, kamu akan mendapatkan sejumlah poin.
          </p>
          <p style="color: #3a3a3a; line-height: 1.7;">
            Poin yang sudah terkumpul nantinya bisa kamu tukarkan dengan berbagai macam hadiah menarik! Mulai dari merchandise eksklusif, voucher, hingga keuntungan spesial lainnya yang pastinya bermanfaat untukmu.
            Semakin aktif kamu, semakin banyak poin yang bisa kamu kumpulkan!
          </p>

          <!-- Tombol Cek Point -->
          <div class="mt-4">
            <a href="/cek-point" class="btn px-4 py-2 rounded-pill fw-semibold"
               style="background-color: #081F5C; color: #F2F0DE;">
              Cek Point
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Section Daftar Perolehan Poin -->
  <section class="py-5">
    <div class="container text-center">
      <h4 class="fw-bold" style="color: #3A4BA4;">Daftar Perolehan Synapse Point</h4>

      <div class="mx-auto mt-4 p-4" style="background-color: #EDF1F6; width: 90%; border-radius: 8px;">
        <div class="table-responsive">
          <table class="table table-borderless mb-0">
            <thead>
              <tr style="font-weight: bold;">
                <th style="color:#081F5C">Nama Barang</th>
                <th style="color:#081F5C">Jumlah Poin</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Merchandise Synapse</td>
                <td>50</td>
              </tr>
              <tr>
                <td>Tiket Workshop</td>
                <td>100</td>
              </tr>
              <tr>
                <td>Voucher Makanan</td>
                <td>75</td>
              </tr>
              <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

 <style>
  .circle-number {
    width: 48px;
    height: 48px;
    background-color: #3A4BA4;
    color: #F2F0DE;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 20px;
  }
</style>

<section class="py-5" style="margin-bottom:100px;">
  <div class="container">
    <h4 class="text-center fw-bold mb-5" style="color: #3A4BA4;">Cara menggunakan Synapse Point</h4>
    <div class="row g-4 justify-content-center">

      <!-- Step 1 -->
      <div class="col-md-6 col-lg-5">
        <div class="p-4 rounded shadow-sm d-flex" style="border-left: 8px solid #3A4BA4; background-color:#EDF1F6;">
          <div class="me-3">
            <div class="circle-number">1</div>
          </div>
          <div>
            <h5 class="fw-bold" style="color: #3A4BA4;">Kumpulkan Synapse Point</h5>
            <p class="mb-3">Untuk setiap penukaran kegiatan ke dalam bentuk Synapse Point wajib melalui Google Form yang disediakan. Pastikan semua data yang kamu masukkan sudah benar dan lengkap ya.</p>
            <a href="#" class="btn btn-primary btn-sm">Google Form Pengumpulan Poin</a>
          </div>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="col-md-6 col-lg-5">
        <div class="p-4 rounded shadow-sm d-flex" style="border-left: 8px solid #3A4BA4; background-color:#EDF1F6;">
          <div class="me-3">
            <div class="circle-number">2</div>
          </div>
          <div>
            <h5 class="fw-bold" style="color: #3A4BA4;">Validasi Synapse Point</h5>
            <p class="mb-3">Setelah formulir kamu kirim, tim kami akan melakukan verifikasi dan persetujuan secara manual. Kami akan mengecek keikutsertaanmu dalam kegiatan terkait. Mohon bersabar selama proses ini berlangsung.</p>
          </div>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="col-md-6 col-lg-5">
        <div class="p-4 rounded shadow-sm d-flex" style="border-left: 8px solid #3A4BA4; background-color:#EDF1F6;">
          <div class="me-3">
            <div class="circle-number">3</div>
          </div>
          <div>
            <h5 class="fw-bold" style="color: #3A4BA4;">Cek Jumlah Synapse Point</h5>
            <p class="mb-3">Kamu bisa melihat jumlah Synapse Point yang kamu kumpulkan kapan saja melalui Google Sheet publik yang kami sediakan. Sheet ini akan selalu diperbarui secara berkala.</p>
            <a href="#" class="btn btn-primary btn-sm">Public Sheets</a>
          </div>
        </div>
      </div>

      <!-- Step 4 -->
      <div class="col-md-6 col-lg-5">
        <div class="p-4 rounded shadow-sm d-flex" style="border-left: 8px solid #3A4BA4; background-color:#EDF1F6;">
          <div class="me-3">
            <div class="circle-number">4</div>
          </div>
          <div>
            <h5 class="fw-bold" style="color: #3A4BA4;">Tukarkan Synapse Point</h5>
            <p class="mb-3">Untuk setiap klaim atau penggunaan poin, kamu wajib mengisi formulir yang sudah kami sediakan. Pastikan semua data yang kamu masukkan sudah benar ya.</p>
            <a href="#" class="btn btn-primary btn-sm">Google Form Penukaran Poin</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@section('content')
