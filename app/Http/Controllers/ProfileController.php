<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Synapoint;
use Illuminate\Http\Request;
use App\Models\SynapointHistory;
use App\Models\SynapointRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // **Perbaikan:** Gunakan penamaan kolom yang konsisten (huruf kecil)
        $requests = SynapointRequest::where('user_id', $user->id)->get();
        $histories = SynapointHistory::where('user_id', $user->id)->get();
        $synapoints = Synapoint::where('status_delete', '0')->get();

        return view('users.profile', compact('user', 'requests', 'histories','synapoints'));
    }

    public function applyPoint(Request $request)
    {
        // **Perbaikan:** Penamaan tabel dan primary key harus konsisten
        // 'synapoints' (plural, lowercase) adalah nama tabel
        // 'id' (lowercase) adalah primary key
        $validator = Validator::make($request->all(), [
            'synapoint_id'    => 'required|exists:synapoints,id',
            'nama_kegiatan'   => 'required|string|max:255',
            'bukti_kegiatan'  => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $filePath = $request->file('bukti_kegiatan')->store('proofs', 'public');

        // **Perbaikan:** Nama kolom harus konsisten dengan migrasi Anda
        // Gunakan 'synapoint_id' dan 'user_id' (huruf kecil)
        SynapointRequest::create([
            'synapoint_id'    => $request->synapoint_id,
            'user_id'         => Auth::id(),
            'nama_kegiatan'   => $request->nama_kegiatan,
            'type_kegiatan'   => $request->nama_kegiatan,
            'bukti_kegiatan'  => $filePath,
        ]);

        return redirect()->route('users.profile')->with('success', 'Permintaan poin berhasil diajukan!');
    }
}
