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



    public function artikels()
    {
        return $this->belongsToMany(Artikel::class, 'artikel_kategoris');
    }

}
