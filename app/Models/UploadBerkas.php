<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadBerkas extends Model
{
    use HasFactory;

    protected $table = 'upload_berkas';
    protected $primaryKey = 'id_upload_berkas';

    protected $fillable = [
        'id_ref_berkas',
        'path',
        'user_id'
    ];

    public function refBerkas()
    {
        return $this->belongsTo(RefBerkas::class, 'id_ref_berkas', 'id_ref_berkas');
    }

    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
