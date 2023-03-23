<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'cash',
        'from_bill_id',
        'to_bill_id',
        'status_id',
        'description',
    ];
}
