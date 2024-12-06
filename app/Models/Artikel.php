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
