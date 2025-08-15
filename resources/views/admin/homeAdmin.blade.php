@extends('base.baseAdmin')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h2 class="mb-4">Tambah Podcast Baru</h2>

            {{-- @if (session('success'))
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
            @endif --}}

            <form action="{{ route('podcast.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Podcast</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama podcast" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link Podcast</label>
                    <input type="url" name="link" id="link" class="form-control" placeholder="https://..." value="{{ old('link') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-upload"></i> Tambahkan
                </button>
            </form>
        </div>

        <div class="col-md-7">
            <h2 class="mb-4">Daftar Podcast</h2>
            @if ($podcasts->isEmpty())
                <div class="alert alert-info">Belum ada podcast yang ditambahkan.</div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Podcast</th>
                            <th>Link</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($podcasts as $podcast)
                            <tr>
                                <td>{{ $podcast->name }}</td>
                                <td><a href="{{ $podcast->link }}" target="_blank">{{ $podcast->link }}</a></td>
                                <td>
                                    <form action="{{ route('podcast.destroy', $podcast) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus podcast ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
