<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'accred_level',
        'course',
        'area',
        'reportType',
        'columnNumber',
        'columnName',
    ];

    protected $table = 'templates';
}
