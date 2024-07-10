<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index()
    {
        return view('pendaftaran.file_upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ijazah' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'nilai_raport' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'bukti_santri' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'sertifikat_hapalan' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'surat_keterangan' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);

        $files = [
            'ijazah' => $request->file('ijazah'),
            'nilai_raport' => $request->file('nilai_raport'),
            'bukti_santri' => $request->file('bukti_santri'),
            'sertifikat_hapalan' => $request->file('sertifikat_hapalan'),
            'surat_keterangan' => $request->file('surat_keterangan'),
        ];

        foreach ($files as $type => $file) {
            if ($file) {
                $path = $file->store('uploads', 'public');
                Upload::create([
                    'user_id' => Auth::id(),
                    'file_path' => $path,
                    'type' => $type
                ]);
            }
        }

        return response()->json(['success' => 'Files uploaded successfully.']);
    }
}


