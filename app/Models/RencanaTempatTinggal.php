<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaTempatTinggal extends Model
{
    use HasFactory;

    protected $table = 'rencana_tempat_tinggals';
    protected $primaryKey = 'id_rencana_tempat_tinggal';

    protected $fillable = [
        'rencana_tempat_tinggal'
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_rencana_tempat_tinggal', 'id_rencana_tempat_tinggal');
    }
}
