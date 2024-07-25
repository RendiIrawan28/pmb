<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RefBerkas;
use App\Models\UploadBerkas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UploadBerkasController extends Controller
{
    public function index()
    {
        return view('pendaftaran.file_upload');
    }

    public function show()
    {
        $refBerkas = RefBerkas::all();
        $berkas = UploadBerkas::where('user_id', Auth::id())->get();
        return response()->json(['data' => $refBerkas,'berkas' =>$berkas]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_ref_berkas.*' => 'required|integer',
            'berkas.*' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        foreach ($request->file('berkas') as $id_ref_berkas => $file) {
            if ($file) {
                $path = $file->store('uploads', 'public');
                UploadBerkas::create([
                    'user_id' => Auth::id(),
                    'id_ref_berkas' => $id_ref_berkas,
                    'path' => $path
                ]);
            }
        }

        return response()->json(['success' => 'Files uploaded successfully!']);
    }
}
