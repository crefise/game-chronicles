<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    /**
     * Fillable
     *
     * @var string[]
     */
    protected $fillable = [
        'label',
        'description',
        'short_description',
        'owner_id'
    ];
}
