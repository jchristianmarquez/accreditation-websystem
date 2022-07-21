<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'areaNumber',
        'areaName',
        'publishStatus'

    ];

    protected $table = 'areas';
}
