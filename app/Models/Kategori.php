<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;
    protected $fillable =
    [
        'name',

    ];

    // Relasi Artikel tabel pivot  (many-to-many)
    // public function artikels()
    // {
    //     return $this->belongsToMany(Artikel::class, 'artikel_kategoris', 'kategori_id', 'artikel_id');
    // }

    public function artikels()
    {
        return $this->belongsToMany(Artikel::class, 'artikel_kategoris');
    }

}
