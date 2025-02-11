<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    use HasFactory;
    protected $fillable = [
      'num',
      'mp3_path',
      'lrc_path',
      'album'
    ];
}
