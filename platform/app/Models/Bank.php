<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'slug',
    ];


    /**
     * Settings
     *
     * @return HasMany
     */
    public function settings(): HasMany
    {
        return $this->hasMany(BankSettings::class);
    }
}
