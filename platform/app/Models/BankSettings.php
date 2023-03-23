<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSettings extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'key',
      'value',
      'bank_id'
    ];

    public function bank()
    {
        return $this->morphTo();
    }
}
