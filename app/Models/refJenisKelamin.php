<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refJenisKelamin extends Model
{
    use HasFactory;

    protected $table = 'ref_jenis_kelamins';
    protected $primaryKey = 'id_jenis_kelamin';

    protected $fillable = [
        'jenis_kelamin'
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_jenis_kelamin', 'id_jenis_kelamin');
    }

}
