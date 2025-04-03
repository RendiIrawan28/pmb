<?php

namespace App\Http\Controllers;

use App\Models\JalurPendaftaran;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\ProgramStudi;
use App\Models\refAgama;
use App\Models\RefBerkas;
use App\Models\refJenisKelamin;
use App\Models\refPenghasilanOrangTua;
use App\Models\RencanaTempatTinggal;
use App\Models\SumberInformasi;
use App\Models\UploadBerkas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function show()
    {
        $pendaftaran = Pendaftaran::all();
        return response()->json(['pendaftaran' => $pendaftaran]);
    }


    public function index($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        $data = [
            'jenis_kelamin' => refJenisKelamin::all(),
            'agama' => refAgama::all(),
            'penghasilan_orang_tua' => refPenghasilanOrangTua::all(),
            'program_studi' => ProgramStudi::all(),
            'sumber_informasi' => SumberInformasi::all(),
            'jalur_pendaftaran' => JalurPendaftaran::all(),
            'rencana_tempat_tinggal' => RencanaTempatTinggal::all(),
        ];

        return response()->json(['pendaftaran' => $pendaftaran, 'data' => $data]);
    }

    public function GetImages($id)
    {
        $images = UploadBerkas::where('user_id', $id)->get();

        $data = ['jenis_berkas' => RefBerkas::all()];
        
        return response()->json(['berkas' => $images , 'data' => $data]);
    }
}
