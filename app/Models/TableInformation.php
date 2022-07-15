<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'accred_level',
        'course',
        'area',
        'reportType',
        'tblRow',
        'tblCol',
        'cellText',
    ];

    protected $table = 'table_info';
}
