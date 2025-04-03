<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refRole extends Model
{
    use HasFactory;
    protected $table = 'ref_role';
    protected $primaryKey = 'id_role';

    protected $fillable = [
        'nama_role'
    ];

}
