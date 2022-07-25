<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'publishID',
        'publishStatus'
    ];

    protected $table = 'publish_statuses';
}
