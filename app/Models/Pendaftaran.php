<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'domisili',
        'no_wa',
        'nama_orang_tua',
        'no_wa_ortu',
        'penghasilan_orang_tua',
        'asal_sekolah',
        'id_program_studi',
        'id_sumber_informasi',
        'id_jalur_pendaftaran',
        'id_rencana_tempat_tinggal'
    ];

    protected $dates = [
        'tanggal_lahir'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
