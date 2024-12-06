<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtikelKategori extends Model
{
    use SoftDeletes;
    protected $fillable =
    [
        'artikel_id',
        'kategori_id',
    ];

   
}
