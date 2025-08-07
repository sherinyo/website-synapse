<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5 pt-5">
    <h2 class="mb-4">Profil Pengguna</h2>

    <!-- Info Profil -->
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Sherin Yonatan</h5>
        <p class="card-text mb-1"><strong>Email:</strong> sherin@example.com</p>
        <p class="card-text"><strong>Total Poin:</strong> 120 pts</p>
      </div>
    </div>

    <!-- Form Apply Point -->
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Ajukan Penambahan Poin</h5>
        <form>
          <div class="mb-3">
            <label for="kegiatan" class="form-label">Nama Kegiatan</label>
            <input type="text" class="form-control" id="kegiatan" placeholder="Contoh: Seminar Nasional">
          </div>
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Poin yang Diajukan</label>
            <input type="number" class="form-control" id="jumlah" placeholder="Contoh: 25">
          </div>
          <div class="mb-3">
            <label for="bukti" class="form-label">Upload Bukti (PDF/JPG)</label>
            <input type="file" class="form-control" id="bukti">
          </div>
          <button type="submit" class="btn btn-primary rounded-pill px-4">Ajukan</button>
        </form>
      </div>
    </div>

    <!-- Riwayat Apply Point -->
    <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Riwayat Apply Point</h5>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nama Kegiatan</th>
              <th>Poin</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>01 Agustus 2025</td>
              <td>Webinar AI</td>
              <td>50</td>
              <td><span class="badge bg-success">Disetujui</span></td>
            </tr>
            <tr>
              <td>25 Juli 2025</td>
              <td>Workshop Leadership</td>
              <td>30</td>
              <td><span class="badge bg-warning text-dark">Menunggu</span></td>
            </tr>
            <tr>
              <td>15 Juli 2025</td>
              <td>Volunteer Event</td>
              <td>20</td>
              <td><span class="badge bg-danger">Ditolak</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Tombol Logout -->
    <div class="text-end">
      <button class="btn btn-danger rounded-pill px-4">Logout</button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
