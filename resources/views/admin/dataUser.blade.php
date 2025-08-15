@extends('base.baseAdmin')

@section('content')
    <h2 class="fw-bold">Data User</h2>

    <div class="card">
        <div class="card-header fw-semibold">Daftar User</div>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Total Poin</th> <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr class="{{ $loop->odd ? 'table-light' : '' }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->total_points }}</td> <td>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#historyModal{{ $user->id }}">
                                    Lihat History
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
