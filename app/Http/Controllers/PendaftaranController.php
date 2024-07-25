<?php

namespace App\Http\Controllers;

use App\Models\JalurPendaftaran;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\ProgramStudi;
use App\Models\refAgama;
use App\Models\refJenisKelamin;
use App\Models\refPenghasilanOrangTua;
use App\Models\RencanaTempatTinggal;
use App\Models\SumberInformasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    public function show($id = null)
    {
        $data = [
            'jenis_kelamin' => refJenisKelamin::all(),
            'agama' => refAgama::all(),
            'penghasilan_orang_tua' =>refPenghasilanOrangTua::all(),
            'program_studi' => ProgramStudi::all(),
            'sumber_informasi' => SumberInformasi::all(),
            'jalur_pendaftaran' => JalurPendaftaran::all(),
            'rencana_tempat_tinggal' => RencanaTempatTinggal::all(),
        ];

        $pendaftaran = Pendaftaran::where('user_id', Auth::id())->get();
        return response()->json(['pendaftaran' => $pendaftaran, 'data' => $data]);
    }

    public function index()
    {
        return view('pendaftaran.file_upload');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'id_jenis_kelamin' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date_format:d/m/Y',
            'id_agama' => 'required|string|max:50',
            'domisili' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
            'nama_orang_tua' => 'required|string|max:255',
            'no_wa_ortu' => 'required|string|max:20',
            'id_penghasilan_orang_tua' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'id_program_studi' => 'required|integer',
            'id_sumber_informasi' => 'required|integer',
            'id_jalur_pendaftaran' => 'required|integer',
            'id_rencana_tempat_tinggal' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $pendaftaran = new Pendaftaran($request->all());
        $pendaftaran->tanggal_lahir = \Carbon\Carbon::createFromFormat('d/m/Y', $request->tanggal_lahir)->format('Y-m-d');
        $pendaftaran->user_id = Auth::id();
        $pendaftaran->status = Pendaftaran::STATUS_TAHAP_DOKUMEN; // Set status awal
        $pendaftaran->save();

        return response()->json(['success' => 'Data berhasil disimpan!', 'id' => $pendaftaran->id, 'status' => $pendaftaran->status]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'id_jenis_kelamin' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date_format:d/m/Y',
            'id_agama' => 'required|string|max:50',
            'domisili' => 'required|string|max:255',
            'no_wa' => 'required|string|max:20',
            'nama_orang_tua' => 'required|string|max:255',
            'no_wa_ortu' => 'required|string|max:20',
            'id_penghasilan_orang_tua' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'id_program_studi' => 'required|integer',
            'id_sumber_informasi' => 'required|integer',
            'id_jalur_pendaftaran' => 'required|integer',
            'id_rencana_tempat_tinggal' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->fill($request->all());
        $pendaftaran->tanggal_lahir = \Carbon\Carbon::createFromFormat('d/m/Y', $request->tanggal_lahir)->format('Y-m-d');
        $pendaftaran->save();

        return response()->json(['success' => 'Data berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
