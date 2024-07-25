<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refAgama extends Model
{
    use HasFactory;

    protected $table = 'ref_agamas';
    protected $primaryKey = 'id_agama';

    protected $fillable = [
        'nama_agama'
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_agama', 'id_agama');
    }

}
