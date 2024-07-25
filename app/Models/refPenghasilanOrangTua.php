<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refPenghasilanOrangTua extends Model
{
    use HasFactory;

    protected $table = 'ref_penghasilan_orang_tuas';
    protected $primaryKey = 'id_penghasilan_orang_tua';

    protected $fillable = [
        'penghasilan_orang_tua'
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_penghasilan_orang_tua', 'id_penghasilan_orang_tua');
    }

}
