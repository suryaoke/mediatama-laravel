<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtikelTag extends Model
{
    use SoftDeletes;
    protected $fillable =
    [
        'artikel_id',
        'tag_id',
    ];


}
