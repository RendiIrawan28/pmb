<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refBuktiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'ref_bukti_pembayaran';
    protected $primaryKey = 'id_ref_berkas_pembayaran';

    protected $fillable = [
        'jenis_berkas_pembayaran'
    ];
}
