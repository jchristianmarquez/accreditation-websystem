<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    use HasFactory;

    protected $fillable = [
        'accred_level',
        'program',
        'area',
        'reportType',
        'tblRow',
        'comment',
        'edited_by',
        'approval'
    ];

    protected $table = 'publishes';
}
