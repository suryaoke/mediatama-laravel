<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;
    protected $fillable =
    [
        'name',

    ];

    // Relasi artikel  pivot (many-to-many)
    // public function artikels()
    // {
    //     return $this->belongsToMany(Artikel::class, 'artikel_tag', 'tag_id', 'artikel_id');
    // }

    public function artikels()
    {
        return $this->belongsToMany(Artikel::class, 'artikel_tags');
    }
}
