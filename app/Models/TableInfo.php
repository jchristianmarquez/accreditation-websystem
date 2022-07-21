<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'accred_level',
        'program',
        'area',
        'reportType',
        'tblRow',
        'tblCol',
        'cellText',
        'approvalType',
        'approvalDirector',
        'approvalQA'

    ];

    protected $table = 'table_infos';
}
