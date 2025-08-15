<?php

namespace App\Http\Controllers\User;

use App\Models\Synapoint; // Menggunakan nama model tunggal
use App\Models\SynapointRequest; // Menggunakan nama model tunggal
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use App\Models\HistoryPoint;

class UserSynapointController extends Controller
{
    public function showRequestForm()
    {
        // Mengambil semua jenis Synapoint yang tersedia untuk dipilih
        $synapoints = Synapoint::where('status_delete', '0')->get();

        return view('users.synapoint.request', compact('synapoints'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'synapoint_id'    => 'required|exists:SYNAPOINT,ID',
            'nama_kegiatan'   => 'required|string|max:255',
            'type_kegiatan'   => 'required|string|max:100',
            'bukti_kegiatan'  => 'required|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        SynapointRequest::create([
            'Synapoint_ID'    => $request->synapoint_id,
            'user_ID'         => Auth::id(),
            'nama_kegiatan'   => $request->nama_kegiatan,
            'type_kegiatan'   => $request->type_kegiatan,
            'bukti_kegiatan'  => $request->bukti_kegiatan,
        ]);

        return redirect()->route('user.synapoint.history')->with('success', 'Permintaan poin berhasil dikirim!');
    }

    public function showHistory()
    {
        $user = Auth::user();

        // Memuat permintaan poin user dengan relasi synapoint
        $requests = SynapointRequest::with('synapoint')
                                     ->where('user_ID', $user->id)
                                     ->get();

        return view('users.synapoint.history', compact('requests', 'user'));
    }
}
