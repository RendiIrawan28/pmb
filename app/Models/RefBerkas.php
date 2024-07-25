<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefBerkas extends Model
{
    use HasFactory;

    protected $fillable = ['ref_berkas'];

    protected $primaryKey = 'id_ref_berkas';
}
