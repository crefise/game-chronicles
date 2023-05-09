<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 */
class Import extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'description',
        'status',
        'importer_id',
    ];
}
