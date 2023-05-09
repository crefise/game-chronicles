<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'key',
        'label',
        'release_date',
        'image_url',
        'ext_id',
        'import_id'
    ];
}
