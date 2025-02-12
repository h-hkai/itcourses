<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persistence extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'count',
        'note'
    ];
}
