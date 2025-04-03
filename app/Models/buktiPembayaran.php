<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buktiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'bukti_pembayaran';
    protected $primaryKey = 'id_upload_berkas_pembayaran';

    protected $fillable = [
        'id_ref_berkas_pembayaran',
        'path',
        'user_id'
    ];

    public function refBerkas()
    {
        return $this->belongsTo(RefBerkas::class, 'id_ref_berkas_pembayaran', 'id_ref_berkas_pembayaran');
    }

    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
