<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    const STATUS_TAHAP_DOKUMEN = 1;
    const STATUS_TAHAP_UJIAN_HAFALAN = 2;
    const STATUS_TAHAP_UJIAN_TULIS = 3;
    const STATUS_TAHAP_WAWANCARA = 4;
    const STATUS_DAFTAR_ULANG = 5;
    const STATUS_SELAMAT_MAHASISWA_BARU = 6;
    const STATUS_DITOLAK = 7;
    use HasFactory;

    protected $table = 'pendaftaran';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'nik',
        'id_jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'id_agama',
        'domisili',
        'no_wa',
        'nama_orang_tua',
        'no_wa_ortu',
        'id_penghasilan_orang_tua',
        'asal_sekolah',
        'id_program_studi',
        'id_sumber_informasi',
        'id_jalur_pendaftaran',
        'id_rencana_tempat_tinggal',
        'status'
    ];

    protected $dates = [
        'tanggal_lahir'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function agama()
    {
        return $this->belongsTo(refAgama::class, 'id_agama', 'id_agama');
    }
    public function jenis_kelamin()
    {
        return $this->belongsTo(refJenisKelamin::class, 'id_jenis_kelamin', 'id_jenis_kelamin');
    }
    public function penghasilan_orang_tua()
    {
        return $this->belongsTo(refPenghasilanOrangTua::class, 'id_penghasilan_orang_tua', 'id_penghasilan_orang_tua');
    }
    public function program_studi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_program_studi', 'id_program_studi');
    }

    public function sumber_informasi()
    {
        return $this->belongsTo(SumberInformasi::class, 'id_sumber_informasi', 'id_sumber_informasi');
    }

    public function jalur_pendaftaran()
    {
        return $this->belongsTo(JalurPendaftaran::class, 'id_jalur_pendaftaran', 'id_jalur_pendaftaran');
    }

    public function rencana_tempat_tinggal()
    {
        return $this->belongsTo(RencanaTempatTinggal::class, 'id_rencana_tempat_tinggal', 'id_rencana_tempat_tinggal');
    }
}
