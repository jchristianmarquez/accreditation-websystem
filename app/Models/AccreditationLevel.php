<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccreditationLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'accreditationLevel',
        'accreditationLabel'
    ];

    protected $table = 'accreditation_levels';
}
