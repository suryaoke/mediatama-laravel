<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;
    protected $fillable =
    [
        'name',
        'email'
    ];

    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }
}
