<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    use SoftDeletes;
    protected $fillable  =
    [
        'title',
        'content',
        'foto',
        'author_id',
    ];

    //     public function author()
    //     {
    //         return $this->belongsTo(Author::class);
    //     }

    //     // Relasi  kategori pivot ` (many-to-many)
    //     public function kategoris()
    //     {
    //         return $this->belongsToMany(Kategori::class, 'artikel_kategoris', 'artikel_id', 'kategori_id');
    //     }

    //    // Relasi tag pivot ` (many-to-many)
    //     public function tags()
    //     {
    //         return $this->belongsToMany(Tag::class, 'artikel_tags', 'artikel_id', 'tag_id');
    //     }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Relasi ke Category (Many-to-Many)
    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'artikel_kategoris');
    }

    // Relasi ke Tag (Many-to-Many)
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'artikel_tags');
    }
}
