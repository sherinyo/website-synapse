@extends('base.baseAdmin')

@section('title', 'Manajemen Berita')

@section('content')
    <h2 class="fw-bold">Berita</h2>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="fas fa-plus"></i> Input Berita
    </button>

    <form action="{{ route('admin.news.index') }}" method="GET" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama berita atau lokasi..." value="{{ request()->query('search') }}">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <div class="card">
        <div class="card-header fw-semibold">Daftar Berita</div>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Berita</th>
                        <th>Jadwal</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Menggunakan variabel $allNews yang dikirim dari NewsController --}}
                    @forelse ($allNews as $index => $newsItem)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $newsItem->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($newsItem->mulai)->format('d M Y, H:i') }}</td>
                            <td>{{ $newsItem->lokasi }}</td>
                            <td class="d-flex gap-2">                                
                                <button type="button" class="btn btn-warning btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editModal"
                                    data-id="{{ $newsItem->id }}"
                                    data-nama="{{ $newsItem->nama }}"
                                    data-deskripsi="{{ $newsItem->deskripsi }}"
                                    data-mulai="{{ $newsItem->mulai }}"
                                    data-selesai="{{ $newsItem->selesai }}"
                                    data-lokasi="{{ $newsItem->lokasi }}"
                                    data-role="{{ $newsItem->role }}"
                                    data-gambar="{{ $newsItem->gambar }}">
                                    Edit
                                </button>

                                <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header fw-semibold text-white bg-dark">
            <i class="fas fa-trash"></i> Berita yang Dihapus (Sampah)
        </div>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Berita</th>
                        <th>Tanggal Dihapus</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashedNews as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deleted_at->format('d M Y, H:i') }}</td>
                            <td>
                                {{-- Tombol Restore/Kembalikan --}}
                                <form action="{{ route('admin.news.restore', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fas fa-undo"></i> Kembalikan
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada berita di dalam sampah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- input formnya --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin.news.store') }}" method="POST" class="modal-content" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Berita Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label for="nama" class="form-label">Nama Berita/Acara</label><input type="text" class="form-control" name="nama" id="nama" required></div>
                    <div class="mb-3"><label for="deskripsi" class="form-label">Deskripsi</label><textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" required></textarea></div>
                    <div class="row">
                        <div class="col-md-6 mb-3"><label for="mulai" class="form-label">Waktu Mulai</label><input type="datetime-local" class="form-control" name="mulai" id="mulai"></div>
                        <div class="col-md-6 mb-3"><label for="selesai" class="form-label">Waktu Selesai</label><input type="datetime-local" class="form-control" name="selesai" id="selesai">
                            <div id="selesai_warning_create" class="text-danger small mt-1 d-none">Tanggal selesai tidak boleh sebelum tanggal mulai.</div>
                        </div>
                    </div>
                    <div class="mb-3"><label for="lokasi" class="form-label">Lokasi</label><input type="text" class="form-control" name="lokasi" id="lokasi"></div>
                    <div class="mb-3"><label for="role" class="form-label">Role</label>
                        <select class="form-select" name="role" id="role" required>
                            <option selected disabled value="">Pilih role...</option>
                            <option value="Event">Event</option>
                            <option value="News">News</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Gambar (Max. 3MB)</label>
                        <input class="form-control" type="file" name="gambar" id="gambar" accept="image/*">
                        <div id="gambar_warning_create" class="text-danger small mt-1 d-none">
                            Ukuran file terlalu besar. Maksimal 3 MB.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- edit formnya --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        {{-- Action form akan diisi oleh JavaScript --}}
        <form id="editForm" method="POST" class="modal-content" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="edit_nama" class="form-label">Nama Berita/Acara</label>
                    <input type="text" class="form-control" name="nama" id="edit_nama" required>
                </div>
                <div class="mb-3">
                    <label for="edit_deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="4" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="edit_mulai" class="form-label">Waktu Mulai</label>
                        <input type="datetime-local" class="form-control" name="mulai" id="edit_mulai">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="edit_selesai" class="form-label">Waktu Selesai</label>
                        <input type="datetime-local" class="form-control" name="selesai" id="edit_selesai">
                            <div id="selesai_warning_edit" class="text-danger small mt-1 d-none">
                                Tanggal selesai tidak boleh sebelum tanggal mulai.
                            </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="edit_lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" name="lokasi" id="edit_lokasi">
                </div>
                 <div class="mb-3">
                    <label for="edit_role" class="form-label">Role</label>
                    <select class="form-select" name="role" id="edit_role" required>
                        <option value="Event">Event</option>
                        <option value="News">News</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="edit_gambar" class="form-label">Ganti Gambar (Opsional  (Max. 3MB))</label>
                    <input class="form-control" type="file" name="gambar" id="edit_gambar" accept="image/*">
                    <div id="gambar_sekarang" class="mt-2"></div>
                    <div id="gambar_warning_edit" class="text-danger small mt-1 d-none">
                        Ukuran file terlalu besar. Maksimal 3 MB.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
    </div>

    @push('scripts')
    <script>
    const editModalEl = document.getElementById('editModal');    
        if (editModalEl) {
            console.log('Modal #editModal ditemukan. Menambahkan event listener...');
            
            editModalEl.addEventListener('show.bs.modal', function (event) {
                console.log('--- Event show.bs.modal terpicu! ---');
                
                try {
                    var button = event.relatedTarget;
                    console.log('Tombol yang diklik:', button);

                    var id = button.getAttribute('data-id');
                    console.log('Mendapatkan data-id:', id);
                    
                    // Ambil semua data dari atribut data-*
                    var nama = button.getAttribute('data-nama');
                    var deskripsi = button.getAttribute('data-deskripsi');
                    var mulai = button.getAttribute('data-mulai');
                    var selesai = button.getAttribute('data-selesai');
                    var lokasi = button.getAttribute('data-lokasi');
                    var role = button.getAttribute('data-role');
                    var gambar = button.getAttribute('data-gambar');
                    
                    console.log('Data yang didapat:', { nama, deskripsi, mulai, selesai, lokasi, role, gambar });

                    // Format tanggal
                    mulai = mulai.replace(' ', 'T').substring(0, 16);
                    selesai = selesai.replace(' ', 'T').substring(0, 16);
                    console.log('Tanggal setelah diformat:', { mulai, selesai });

                    // Atur action form
                    var form = document.getElementById('editForm');
                    form.action = '/admin/berita/' + id;
                    console.log('Action form diatur ke:', form.action);
                    
                    // Isi semua field di dalam modal
                    console.log('Mulai mengisi field...');
                    document.getElementById('edit_nama').value = nama;
                    document.getElementById('edit_deskripsi').value = deskripsi;
                    document.getElementById('edit_mulai').value = mulai;
                    document.getElementById('edit_selesai').value = selesai;
                    document.getElementById('edit_lokasi').value = lokasi;
                    document.getElementById('edit_role').value = role;
                    console.log('Semua field berhasil diisi.');

                    // Tampilkan gambar
                    var gambarPreview = document.getElementById('gambar_sekarang');
                    if (gambar) {
                        gambarPreview.innerHTML = '<p>Gambar saat ini:</p><img src="/images/news/' + gambar + '" style="max-width: 200px;" />';
                    } else {
                        gambarPreview.innerHTML = '<p>Tidak ada gambar.</p>';
                    }
                    console.log('Preview gambar diatur.');

                } catch (error) {
                    console.error('TERJADI ERROR DI DALAM EVENT LISTENER:', error);
                }
            });
        } else {
            console.error('ERROR: Modal dengan ID #editModal tidak ditemukan di halaman!');
        }

         // Ambil semua elemen yang kita butuhkan dari kedua form
        const mulaiCreate = document.getElementById('mulai');
        const selesaiCreate = document.getElementById('selesai');
        const warningCreate = document.getElementById('selesai_warning_create');
        const mulaiEdit = document.getElementById('edit_mulai');
        const selesaiEdit = document.getElementById('edit_selesai');
        const warningEdit = document.getElementById('selesai_warning_edit');

        // Memeriksa validitas tanggal
        function checkDateValidity(mulaiInput, selesaiInput, warningElement) {
            const mulaiValue = mulaiInput.value;
            const selesaiValue = selesaiInput.value;

            // periksa jika kedua field sudah diisi
            if (mulaiValue && selesaiValue) {
                const tanggalMulai = new Date(mulaiValue);
                const tanggalSelesai = new Date(selesaiValue);
                if (tanggalSelesai < tanggalMulai) {
                    // Jika tanggal selesai lebih awal, tampilkan peringatan
                    warningElement.classList.remove('d-none');
                } else {
                    // Jika valid, sembunyikan peringatan
                    warningElement.classList.add('d-none');
                }
            }
        }
        // Tambahkan event listener ke setiap input tanggal
        mulaiCreate.addEventListener('change', () => checkDateValidity(mulaiCreate, selesaiCreate, warningCreate));
        selesaiCreate.addEventListener('change', () => checkDateValidity(mulaiCreate, selesaiCreate, warningCreate));
        mulaiEdit.addEventListener('change', () => checkDateValidity(mulaiEdit, selesaiEdit, warningEdit));
        selesaiEdit.addEventListener('change', () => checkDateValidity(mulaiEdit, selesaiEdit, warningEdit));
    
        // --- LOGIKA VALIDASI UKURAN FILE ---
        // Ambil elemen yang kita butuhkan
        const gambarCreateInput = document.getElementById('gambar');
        const warningCreateFile = document.getElementById('gambar_warning_create');
        const gambarEditInput = document.getElementById('edit_gambar');
        const warningEditFile = document.getElementById('gambar_warning_edit');
        // Tentukan ukuran maksimal dalam bytes (3 MB)
        const maxSizeInBytes = 3 * 1024 * 1024; 
        // Fungsi untuk memeriksa ukuran file
        function checkFileSize(fileInput, warningElement) {
            // Pastikan ada file yang dipilih
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                if (file.size > maxSizeInBytes) {
                    // Jika file terlalu besar, tampilkan peringatan
                    warningElement.classList.remove('d-none');
                    // Kosongkan input file agar tidak bisa disubmit
                    fileInput.value = ''; 
                } else {
                    // Jika ukuran file valid, sembunyikan peringatan
                    warningElement.classList.add('d-none');
                }
            }
        }

        // Tambahkan event listener ke setiap input file
        gambarCreateInput.addEventListener('change', () => checkFileSize(gambarCreateInput, warningCreateFile));
        gambarEditInput.addEventListener('change', () => checkFileSize(gambarEditInput, warningEditFile));

    </script>
    @endpush
@endsection
