@extends('base.baseAdmin')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Permintaan Synapoint</h2>

    {{-- Tabel daftar request --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Tanggal</th>
                <th>Type Point</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
                <tr>
                    <td>{{ $request->user->first_name }} {{ $request->user->last_name }}</td>
                    <td>{{ $request->created_at->format('d M Y') }}</td>
                    <td>{{ $request->point->type }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" onclick="showDetail({{ $request->id }})">
                            Lihat Detail
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Detail tampilan, disembunyikan dulu --}}
    <div id="detailContainer" class="mt-4" style="display: none;">
        <h4>Detail Permintaan</h4>
        <div class="card p-3">
            <p><strong>Nama Kegiatan:</strong> <span id="activityName"></span></p>
            <p><strong>Type Kegiatan:</strong> <span id="activityType"></span></p>
            <p><strong>Default Point:</strong> <span id="defaultPoint"></span></p>
            <p><strong>Bukti Kegiatan:</strong><br>
                <img id="proofImage" src="" alt="Bukti" class="img-fluid rounded border" style="max-width: 300px;">
            </p>

            <form method="POST" id="approvalForm" class="d-flex gap-2">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" id="statusInput">
                <button type="button" class="btn btn-success" onclick="submitApproval('approved')">Approve</button>
                <button type="button" class="btn btn-danger" onclick="submitApproval('rejected')">Reject</button>
            </form>
        </div>
    </div>
</div>

<script>
    let requests = @json($requests);

    function showDetail(id) {
        const req = requests.find(r => r.id === id);
        if (!req) return;

        document.getElementById('activityName').innerText = req.point.name;
        document.getElementById('activityType').innerText = req.point.type;
        document.getElementById('defaultPoint').innerText = req.point.default_point;
        document.getElementById('proofImage').src = `/storage/${req.bukti}`;

        // Set action untuk form
        const form = document.getElementById('approvalForm');
        form.action = `/synapoint/requests/${req.id}/status`;

        document.getElementById('detailContainer').style.display = 'block';
    }

    function submitApproval(status) {
        document.getElementById('statusInput').value = status;
        document.getElementById('approvalForm').submit();
    }
</script>
@endsection
