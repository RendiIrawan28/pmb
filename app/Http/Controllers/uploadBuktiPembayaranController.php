<?php

namespace App\Http\Controllers;

use App\Models\buktiPembayaran;
use App\Models\refBuktiPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class uploadBuktiPembayaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran.upload_pembayaran');
    }

    public function show()
    {
        $refBerkas = refBuktiPembayaran::all();
        $berkas = buktiPembayaran::where('user_id', Auth::id())->get();
        return response()->json(['data' => $refBerkas, 'berkas' => $berkas]);
    }
}
