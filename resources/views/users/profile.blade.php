@extends('base.base')

@section('content')
    <div class="container mt-5 pt-5">
        <h2 class="mb-4">Profil Pengguna</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Info Profil --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Total Poin:</strong> {{ $user->points }} pts</p>
            </div>
        </div>

        {{-- Tombol untuk membuka Modal --}}
        <button type="button" class="btn btn-primary rounded-pill px-4" style="margin-bottom: 20px;" data-bs-toggle="modal" data-bs-target="#inputPointModal">
            Input Point
        </button>

        {{-- Modal untuk Ajukan Synapoint --}}
        <div class="modal fade" id="inputPointModal" tabindex="-1" aria-labelledby="inputPointModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('profile.apply') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="inputPointModalLabel">Ajukan Synapoint</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                            </div>
                        <div class="mb-3">
                            <label for="synapoint_id" class="form-label">Jenis Synapoint</label>
                            <select class="form-control" id="synapoint_id" name="synapoint_id" required>
                                <option value="">Pilih Jenis Synapoint</option>
                                @foreach($synapoints as $synapoint)
                                    <option value="{{ $synapoint->id }}">
                                        {{ $synapoint->nama_kegiatan }} (Poin: {{ $synapoint->min_poin }}-{{ $synapoint->max_poin }} pts)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                            <div class="mb-3">
                                <label for="bukti_kegiatan" class="form-label">Upload Bukti (PDF/JPG)</label>
                                <input type="file" class="form-control" id="bukti_kegiatan" name="bukti_kegiatan" accept=".pdf, .jpg, .jpeg, .png" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Ajukan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Riwayat Apply Point (Menunggu Persetujuan) --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Riwayat Pengajuan Poin</h5>
                @if($requests->isEmpty())
                    <p>Anda belum memiliki riwayat permintaan poin.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Kegiatan</th>
                                <th>Status</th>
                                <th>Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td>{{ $request->created_at->format('d F Y') }}</td>
                                    <td>{{ $request->nama_kegiatan }}</td>
                                    <td>
                                        @if($request->status_point == '0')
                                            <span class="badge bg-warning text-dark">Menunggu</span>
                                        @elseif($request->status_point == '1')
                                            <span class="badge bg-success">Disetujui</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ asset('storage/' . $request->bukti_kegiatan) }}" target="_blank">Lihat Bukti</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <hr> {{-- Garis pemisah --}}

        {{-- Riwayat Poin yang Diterima (Disetujui) --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Riwayat Poin yang Diterima</h5>
                @if($histories->isEmpty())
                    <p>Anda belum memiliki riwayat poin yang disetujui.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Kegiatan</th>
                                <th>Poin Diterima</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($histories as $history)
                                <tr>
                                    <td>{{ $history->created_at->format('d F Y') }}</td>
                                    <td>{{ $history->nama_kegiatan }}</td>
                                    <td>{{ $history->point }} pts</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        {{-- Tombol Logout --}}
        <div class="text-end">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger rounded-pill px-4">Logout</button>
            </form>
        </div>
    </div>
@endsection
