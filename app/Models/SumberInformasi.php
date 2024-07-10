<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberInformasi extends Model
{
    use HasFactory;

    protected $table = 'sumber_informasis';
    protected $primaryKey = 'id_sumber_informasi';

    protected $fillable = [
        'nama_sumber_informasi'
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_sumber_informasi', 'id_sumber_informasi');
    }
}
